<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fast Soft Forge</title>
  <link rel="shortcut icon" href="{{ Vite::asset('resources/img/logo.png') }}" type="image/x-icon">
  @vite(['resources/scss/layout.scss', 'resources/ts/layout.ts'])
</head>
<body class="bg-dark text-white">
  <x-app-header />
  <x-app-aside />
  
  {{$slot}}

  <x-app-footer />
</body>
</html>