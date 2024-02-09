(function () {
  const aside = document.querySelector('.js-aside')
  const button = document.querySelector('.js-aside__button')

  if (aside && button) {
    button.addEventListener('click', () => {
      aside.classList.toggle('active')
    })
  }
}());