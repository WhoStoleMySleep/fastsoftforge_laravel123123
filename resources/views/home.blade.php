<x-app-layout>
  @vite(['resources/scss/home.scss', 'resources/ts/home.ts', 'resources/ts/configurator.ts'])
  <main class="main">
    <div class="main__marquee js-main__marquee">
      <h1 class="main__title">JET DEVELOPMENT TEAM<span class="main__title-clone">JET DEVELOPMENT TEAM</span></h1>
    </div>
  
    <x-home.home-first />
    <x-home.configurator />
    <x-home.general-information />
  </main>
</x-app-layout>