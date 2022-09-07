<header>
    <div class="container">
        <nav>
            <ul class="menu">
                <div class="menu__div">
                    <li class="menu__li"><a href="/">Mister_Quiz</a></li>
                    <li class="menu__li"><a href="/leaderboard">Leaderboard</a></li>
                    <li class="menu__li"><a href="/quiz">Quiz</a></li>
                </div>
                <div class="menu__div">
                    @guest
                        <li class="menu__li">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                        </li>
                        @if (Route::has('login'))
                            <li class="menu__li">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="menu__li"><a href="{{ route('profile') }}">Profile({{ Auth::user()->username }})</a></li>
                        <li class="menu__li"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Log out') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </ul>
        </nav>
    </div>
</header>