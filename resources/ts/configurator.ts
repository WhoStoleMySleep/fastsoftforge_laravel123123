(function () {

  class Configurator {
    private formElement = document.querySelector('.configurator__form');
    private thisStepElement = document.querySelector('.js-configurator__this-step');
    private maxStepElement = document.querySelector('.js-configurator__max-step');
    private progressbarElement = document.querySelector('.js-configurator__progressbar');
    private issueElement = document.querySelector('.js-configurator__issue');
    private answerListElement = document.querySelector('.js-configurator__answer-list');
    private prevIssueElement = document.querySelector('.js-configurator__prev-issue');
    private nextIssueElement = document.querySelector('.js-configurator__next-issue');
    private step = 1;
    private maxStep = 0
    private choiced: string[] | string[][] = []
    private elementList = []
    private issues: (string | string[])[][] = []

    constructor (issues: (string | string[])[][]) {
      this.issues = issues

      this.maxStep = issues.length

      this.init()
    }

    private init() {
      if (this.maxStepElement && this.issueElement) {
        this.maxStepElement.innerHTML = `${this.maxStep}`;
      }

      this.createIssues()
      this.changeStep()
      this.onSubmit()
      this.update()
    }

    private update() {
      if (this.thisStepElement && this.progressbarElement) {
        this.thisStepElement.innerHTML = `${this.step}`;
        this.progressbarElement.value = this.step;

        if (this.step > 1 && this.prevIssueElement) {
          this.prevIssueElement.classList.add('active')
        } else if (this.prevIssueElement) {
          this.prevIssueElement.classList.remove('active')
        }
        
        if (this.step < this.maxStep + 1 && this.nextIssueElement && this.choiced.length >= this.step) {
          this.nextIssueElement.classList.add('active')

          if (this.step === this.maxStep) {
            this.nextIssueElement.innerText = 'Отправить'
          }

          if (this.step == this.maxStep) {
            setTimeout(() => {
              this.nextIssueElement.setAttribute('type', 'submit')
            }, 1000)
          }
        } else if (this.nextIssueElement) {
          this.nextIssueElement.classList.remove('active')
        }

        this.elementList.forEach(element => {
          const answerElement = element.querySelector('.configurator__answer')

          if (answerElement.tagName != 'INPUT') {
            if (this.choiced[this.step - 1].indexOf(answerElement.innerHTML) != -1) {
              element.classList.add('active')
            }
          } else {
            if (this.choiced[this.step - 1]) {
              answerElement.value = this.choiced[this.step - 1][answerElement.placeholder]
            }
          }
        });
      }

      // console.log(this.choiced);
    }

    private createIssues() {
      if (this.issueElement && this.answerListElement) {
        this.issueElement.innerHTML = this.issues[this.step - 1][0] as string
        this.answerListElement.innerHTML = ''
        const result: any = []

        for (let index = 0; index < this.issues[this.step - 1][1].length; index += 1) {
          const answerElementElement = document.createElement('li')
          const answerElement = document.createElement(/input\[\w|\W\]/.test(this.issues[this.step - 1][1][index]) ? 'input' : 'button')

          if (answerElement.tagName === 'INPUT') {
            answerElement.placeholder = this.issues[this.step - 1][1][index].split('input[')[1].split(']')[0]
          } else {
            answerElement.setAttribute('type', 'button')
          }

          answerElementElement.classList.add('configurator__answer-element')
          answerElement.classList.add('configurator__answer')

          answerElementElement.append(answerElement)
          answerElement.innerHTML = `${this.issues[this.step - 1][1][index]}`

          result.push(answerElementElement)
          
          this.answerListElement.append(answerElementElement)
        }
        
        this.elementList = result
        this.choiseAnswer(result)
      }
    }

    private changeStep() {
      if (this.prevIssueElement && this.nextIssueElement) {
        this.prevIssueElement.addEventListener('click', () => {
          if(this.step > 1) {
            this.step -= 1;
            this.createIssues();
            this.update();
          }
        })

        this.nextIssueElement.addEventListener('click', () => {
          if (this.step < this.maxStep && this.choiced.length >= this.step) {
            this.step += 1;
            this.createIssues();
            this.update();
          }
        })
      }
    }

    private choiseAnswer(elementList) {
      for (let index = 0; index < elementList.length; index += 1) {
        const answerElementElement = elementList[index]
        const answerElement = answerElementElement.querySelector('.configurator__answer')

        if (answerElement.tagName != 'INPUT') {
          answerElement.addEventListener('click', () => {
            if (this.issues[this.step - 1][2]) {
              if (!this.choiced[this.step - 1]) {
                this.choiced[this.step - 1] = [answerElement.innerText]
                answerElementElement.classList.add('active')
                this.update()
              } else {
                if (this.choiced[this.step - 1].indexOf(answerElement.innerText) == -1) {
                  this.choiced[this.step - 1] = [...new Set([...this.choiced[this.step - 1], answerElement.innerText])]
                } else {
                  this.choiced[this.step - 1] = this.choiced[this.step - 1].filter((element) => element !== answerElement.innerText)
                  answerElementElement.classList.remove('active')
                }
                this.update()
              }
            } else {
              this.choiced[this.step - 1] = answerElement.innerText
              this.update()
            }
            
            if (this.choiced[this.step - 1] == answerElement.innerHTML) {
              this.elementList.forEach(element => {
                element.classList.remove('active')
              });
  
              answerElementElement.classList.add('active')
            }
          })
        }

        if (answerElement.tagName == 'INPUT') {
          if (!this.choiced[this.step - 1]) {
            const result = {}
            result[answerElement.placeholder] = answerElement.value
            this.choiced[this.step - 1] = result
          }

          if (!this.choiced[this.step - 1][answerElement.placeholder]) {
            this.choiced[this.step - 1][answerElement.placeholder] = ''
          }
          
          answerElement.addEventListener('input', () => {
            if (!this.choiced[this.step - 1]) {
              const result = {}
              result[answerElement.placeholder] = answerElement.value
              this.choiced[this.step - 1] = result
            }

            this.choiced[this.step - 1][answerElement.placeholder] = answerElement.value

            this.update()
          })
        }
      }
    }

    private onSubmit() {
      if (this.formElement) {
        this.formElement.addEventListener('submit', (event) => {
          event.preventDefault();
          const element = event.target
          const orders = document.querySelectorAll('#order')
          
          if (this.step === this.maxStep && this.answerListElement) {
            const contact = Object.values(this.choiced[4])
            
            orders[0].value = this.choiced[0]
            orders[1].value = JSON.stringify(this.choiced[1])
            orders[2].value = Object.values(this.choiced[2])[0]
            orders[3].value = this.choiced[3]
            orders[4].value = contact[0]
            orders[5].value = contact[1]
            orders[6].value = contact[2]
            orders[7].value = contact[3]
            element.submit()
          }
        })
      }
    }
  }

  const issue = [
    [
      'Тип продукта',
      [
        'Система или сервис',
        'Интернет-магазин',
        'Корпоративный сайт',
        'Лендинг',
        'Сайт визитка',
      ],
    ],
    [
      'Что имеем',
      [
        'Реклама',
        'Хостинг',
        'Сервер',
        'Дизайн',
      ],
      true
    ],
    [
      'Суть проекта',
      [
        'input[В чем же заключается суть вашего проекта?]'
      ]
    ],
    [
      'Бюджет',
      [
        'Менее 300 тыс.',
        '300 - 600 тыс.',
        '600 - 1 млн.',
        '1 - 1.5 млн.',
        'Не знаю',
      ]
    ],
    [
      'Контакты',
      [
        'input[Ваше имя]',
        'input[Телефон]',
        'input[Контактный емеил]',
        'input[Придумайте пароль]',
      ]
    ]
  ]
  
  new Configurator(issue)
}())