<aside class="aside js-aside">
  <button class="aside__button js-aside__button" type="button">
    <span class="aside__dot-container">
    <span class="aside__button-dot"></span>
    <span class="aside__button-dot"></span>
    <span class="aside__button-dot"></span>
    <span class="aside__button-dot"></span>
    <span class="aside__button-dot"></span>
    <span class="aside__button-dot"></span>
    <span class="aside__button-dot"></span>
    <span class="aside__button-dot"></span>
    <span class="aside__button-dot"></span>
    </span>
  </button>

  <div class="aside__menu">
    <nav class="aside__links">
      <a href="/" class="aside__link {{ request()->is('/') ? 'active' : null }}">Главная</a>
      <a href="/projects" class="aside__link {{ request()->is('projects') ? 'active' : null }}">Проекты</a>
      <a href="/services" class="aside__link {{ request()->is('services') ? 'active' : null }}">Услуги</a>
      <a href="/company" class="aside__link {{ request()->is('company') ? 'active' : null }}">Компания</a>
      <a href="/vacancies" class="aside__link {{ request()->is('vacancies') ? 'active' : null }}">Работа у нас</a>
      <a href="/contact" class="aside__link {{ request()->is('contact') ? 'active' : null }}">Контакты</a>
    </nav>
    <div class="aside__additionaly">
      <h2 class="aside__additionaly-title">
        Нужно <span class="special-select">обсудить</span><br>
        будующий <span class="special-select">проект</span>?
      </h2>
      <h3 class="aside__additionaly-small-title">
        Звоните:
      </h3>
      <a href="tel:+79133070592" class="aside__additionaly-telephone">
        <span class="special-select">{</span>
        +7 (913) 307-05-92
        <span class="special-select">}</span>
      </a>
      <h3 class="aside__additionaly-small-title">
        Пишите:
      </h3>
      <a href="mailto:thekostia5@gmail.com" class="aside__additionaly-email">
        <span class="special-select">[</span>
        thekostia5@gmail.com
        <span class="special-select">]</span>
      </a>
    </div>
  </div>

  <p class="aside__about">
    Занимаемся быстрой и <br>
    качественной разработкой
  </p>

  <div class="aside__social">
    <div class="aside__social-vk"></div>
    <div class="aside__social-telegram"></div>
    <div class="aside__social-twitter"></div>
  </div>
</aside>