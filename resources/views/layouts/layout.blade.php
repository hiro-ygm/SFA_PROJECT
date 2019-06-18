<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>らく楽営業</title>
    @include('layouts.style-sheet')
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <script src='{{ asset("js/app.js") }}'defer></script>
    <script src='{{ asset("js/main.js") }}'defer></script>
  </head>
  <body>
    @include('layouts.nav')
    <div class="container">
      @yield('content')
    </div>

  </body>
</html>
