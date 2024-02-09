{{-- @extends('layout')

@section('title')
Fast Soft Forge
@endsection

@section('styles&scripts')
@vite(['resources/scss/home.scss', 'resources/ts/home.ts', 'resources/ts/configurator.ts'])
@endsection --}}
{{-- @section('content') --}}
<main class="main">
  @foreach ($all as $element)
    <a href="/admin/{{$element['telephone']}}">
      <div>{{ $element['name'] }}</div>
      <div>{{ $element['telephone'] }}</div>
      <div>{{ $element['email'] }}</div>
      <div>{{ $element['password'] }}</div>
    </a>
  @endforeach
</main>
{{-- @endsection --}}