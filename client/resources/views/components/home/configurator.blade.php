<section class="configurator js-configurator" id="configurator">
  <form action="/submit_order" method="post" name="order" class="configurator__form">
    @csrf
    <h1 class="configurator__title"><span class="special-select">Сгенерировать</span> сайт</h1>
    <p class="configurator__additionaly">
      Ответе на пару вопросов чтобы подобрать подходящий вам сайт
    </p>
    <div class="configurator__container">
      <div class="configurator__progressbar-container">
        <div class="configurator__progressbar-text-container">
          <p class="configurator__progressbar-text">ВОПРОС</p>&nbsp;
          <p class="configurator__progressbar-number js-configurator__this-step"></p>&nbsp;
          <p class="configurator__progressbar-text">ИЗ</p>&nbsp;
          <p class="configurator__progressbar-number js-configurator__max-step"></p>
        </div>
        <progress max="5" value="1" class="configurator__progressbar js-configurator__progressbar"></progress>
      </div>

      <div class="configurator__issue js-configurator__issue"></div>

      <ul class="configurator__answer-list js-configurator__answer-list"></ul>

      <div hidden class="configurator__send-container js-configurator__send-container">
        <input type="text" name="type" id="order">
        <input type="text" name="have" id="order">
        <input type="text" name="description" id="order">
        <input type="text" name="budget" id="order">
        <input type="text" name="name" id="order">
        <input type="text" name="telephone" id="order">
        <input type="text" name="email" id="order">
        <input type="text" name="password" id="order">
      </div>

      <div class="configurator__control-container">
        <button class="configurator__prev-issue js-configurator__prev-issue" type="button">Назад</button>
        <button class="configurator__next-issue js-configurator__next-issue" type="button">Далее</button>
      </div>
    </div>
  </form>
</section>