<x-app-layout>
  @vite(['resources/scss/projects.scss', 'resources/ts/projects.ts'])
  <main class="main">
    <h1 class="main__title">Свежескованное</h1>
    <div class="main__container">
      <div class="main__left">
        <h2 class="main__left-title">
          Сделаем ваш проект<br>
          <span class="special-select">быстро</span> и <span class="special-select">качественно</span>
        </h2>
        <p class="main__left-additionaly">
          Специализируемся на frontend,<br>
          backend, верстке, дизайне<br>
          интерфейсов, SPA.
        </p>
        <div class="main__left-additionaly">
          В штате: разработчики под ReactJS,<br>
          Vue.js, PHP, Symfony 4, GoLang, Node.js,<br>
          HTML/CSS, JavaScript. Работаем по<br>
          часовой модели оплаты с<br>
          предварительной оценкой.
        </div>
        <a class="main__left-button" href="/#configurator">Оценить проект</a>
      </div>
      <div class="main__right">
        {{-- @vite(['resources/scss/card.scss', 'resources/ts/card.ts'])
        <script>
          const project = JSON.parse('{{json_encode($project)}}'.replace(/&quot;/g, '"'))
        </script> --}}
        {{-- {{json_encode($project)}} --}}
        @foreach ($project as $element)
          <x-projects.card 
            revert='false'
            :link="$element['link']" 
            :img="$element['img']"  
            :name="$element['name']" 
            :about="$element['about']"  
            :technologies="$element['technologies']" 
          />
        @endforeach
      </div>
      {{-- <x-projects.pop-up /> --}}
    </div>
  </main>
</x-app-layout>