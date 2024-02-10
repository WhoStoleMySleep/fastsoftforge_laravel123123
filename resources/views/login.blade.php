{{-- @extends('layout')

@section('title')
Fast Soft Forge
@endsection

@section('styles&scripts')
@endsection --}}
{{-- @section('content') --}}
@vite(['resources/scss/login.scss'])
  <main class="main">
    <h1 class="main__title">
      Вход
    </h1>

    <form class="verification" action="/login/submit_login">
      <input type="text" name="telephone" class="verification__telephone" placeholder="Телефон">
      <input type="text" name="password" class="verification__password" placeholder="Пароль">
      <button type="submit" class="verification__submit">Войти</button>
    </form>
  </main>
{{-- @endsection --}}