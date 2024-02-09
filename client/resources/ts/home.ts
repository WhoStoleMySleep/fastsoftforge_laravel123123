import marquee from 'vanilla-marquee'

(function () {
  const mainMarquee = document.querySelector('.js-main__marquee')

  if (mainMarquee) {
    new marquee(mainMarquee, {
      duplicated: true,
      gap: 50,
      speed: 100,
      delayBeforeStart: 0,
      startVisible: true
    })
  }
}())
