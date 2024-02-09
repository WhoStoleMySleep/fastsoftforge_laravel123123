{{-- @extends('layout')

@section('title')
Fast Soft Forge
@endsection

@section('styles&scripts')
@vite(['resources/scss/home.scss', 'resources/ts/home.ts', 'resources/ts/configurator.ts'])
@endsection --}}
{{-- @section('content') --}}
<main class="main">
  <a href="/exit_user">exit</a>
  <p>Тип продукта: {{$type}}</p>
  <p>Что имеем: 
    @if($have)
      @foreach (json_decode($have) as $element)
        {{$element}}
      @endforeach
    @else
    @endif
  </p>
  <p>Суть проекта: {{$description}}</p>
  <p>Бюджет: {{$budget}}</p>
  <p>Имя: {{$name}}</p>
  <p>Телефон: {{$telephone}}</p>
  <p>Почта: {{$email}}</p>

  <div class="messager">
    @if($messages)
      @foreach ($messages as $element)
        <div>{{ $element['author'] }}</div>
        <div>{{ $element['message'] }}</div>
      @endforeach
    @endif
    <form action="/{{$telephone}}/send_message" class="messager__message-form">
      <input type="text" name="message" class="messager__form-input" autocomplete="off" placeholder="Сообщение...">
      <button class="message__form-submit">Отправить</button>
    </form>
  </div>
</main>
{{-- @endsection --}}