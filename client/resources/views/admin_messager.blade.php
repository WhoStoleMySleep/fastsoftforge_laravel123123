<main class="main">
  <div class="messager">
    @if($messages)
      @foreach ($messages as $element)
        <div>{{ $element['author'] }}</div>
        <div>{{ $element['message'] }}</div>
      @endforeach
    @endif
    <form action="/admin/{{$telephone}}/admin_send_message" class="messager__message-form">
      <input type="text" name="message" class="messager__form-input" autocomplete="off" placeholder="Сообщение...">
      <button class="message__form-submit">Отправить</button>
    </form>
  </div>
</main>