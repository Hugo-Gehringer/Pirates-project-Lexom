<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class=" navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link -danger" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link -danger" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                        </li>
                    @endif
                @else
                @endguest
            </ul>
        </div>
    </div>
</nav>
