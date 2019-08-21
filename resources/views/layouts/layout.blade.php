<!--=============================================================================
Contents   : 営業支援システム
Author     : (廣瀬大助)
LastUpdate : (更新日2019/07/28)
Since      : (作成日2019/05/20)
=============================================================================-->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8mb4">
    <title>@yield('title','HOME')</title>
    @include('layouts.style-sheet')
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <script src='{{ asset("js/app.js") }}'defer></script>
    <script src='{{ asset("js/main.js") }}'defer></script>
  </head>
  <body>
    @include('layouts.nav')
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
  </body>
</html>
