const card = document.querySelector('.card')

if (card) {
  card.addEventListener('click', () => {
    card.classList.toggle('active')
  })
}