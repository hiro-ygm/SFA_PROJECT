<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>@yeald('title')</title>
    @include('layouts.style-sheet')
    @include('layouts.dashboard_style-sheet')
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <script src='{{ asset("js/app.js") }}'defer></script>
    <script src='{{ asset("js/main.js") }}'defer></script>
  </head>
  <body>
    @include('layouts.nav')
    @yield('content')
  </body>
</html>
