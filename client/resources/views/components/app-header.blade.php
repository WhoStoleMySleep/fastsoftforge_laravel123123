<header class="header">
  <div class="header__logo">
    <a href="/"><img src="{{ Vite::asset('resources/img/logo.png') }}" alt="" class="header__img-logo"></a>
    <a href="tel:+79133070592" class="header__logo-telephone">+7 (913) 307-05-92</a>
  </div>

  <nav class="header__links">
    <span class="header__link-container">
      <a href="/projects" class="header__link {{ request()->is('projects') ? 'special-select' : null }}">Проекты</a>
      <p class="header__additional-text">и клиенты</p>
    </span>
    <span class="header__link-container">
      <a href="/services" class="header__link {{ request()->is('services') ? 'special-select' : null }}">Услуги</a>
      <p class="header__additional-text">1 услуга</p>
    </span>
    <span class="header__link-container">
      <a href="/company" class="header__link {{ request()->is('company') ? 'special-select' : null }}">Компания</a>
      <p class="header__additional-text">и клиенты</p>
    </span>
    <span class="header__link-container">
      <a href="/vacancies" class="header__link {{ request()->is('vacancies') ? 'special-select' : null }}">Работа у нас</a>
      <p class="header__additional-text">5 вакансий</p>
    </span>
    <span class="header__link-container">
      <a href="/contact" class="header__link {{ request()->is('contact') ? 'special-select' : null }}">Контакты</a>
    <p class="header__additional-text">Связаться</p>
    </span>
    <a href="/#configurator" class="header__configurator-link">+ Сгенерировать сайт</a>
  </nav>
</header>