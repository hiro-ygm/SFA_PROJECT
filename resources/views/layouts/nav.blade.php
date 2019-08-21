<nav class='navbar nabvar-expand-md navbar-dark bg-primary text-white'>
  <a class="navbar-brand" href='{{ route('index') }}'>らく楽営業</a>

  <div class="navbar_menu">
      <!-- <a class="navbar-link text-white" href='{{ route('calendar.index') }}'>スケジュール</a> -->
      <a class="navbar-link text-white" href='{{ route('process.index') }}'>営業プロセス管理</a>
      <a class="navbar-link text-white" href='{{ route('project.index') }}'>案件管理</a>
      <a class="navbar-link text-white" href='{{ route('customer.index') }}'>顧客管理</a>
      <a class="navbar-link text-white" href='{{ route('chat.index') }}'>チャット</a>
      <a class="navbar-link text-white" href='{{ route('analysis.index') }}'>データ分析</a>
  </div>
  </ul>




        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
