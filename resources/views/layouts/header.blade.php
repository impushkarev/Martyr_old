@section('header')
<header>
    <div class="container">
        <div class="logo">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>
        <nav class="nav-menu">
            <ul class="categories">
                <a href="{{ route('cat', ['man']) }}">
                    <li>
                        {{ __('interface.header_men') }}
                    </li>
                </a>
                <a href="{{ route('cat', ['woman']) }}">
                    <li>
                        {{ __('interface.header_women') }}
                    </li>
                </a>
                <a href="{{ route('news', []) }}">
                    <li>
                        {{ __('interface.header_projects') }}
                    </li>
                </a>
            </ul>
        </nav>
        <div class="shop-buttons">
            <ul>
                <li id="sb">
                    <i class="fas fa-search"></i>
                </li>
                <form action="{{ route('cat', []) }}" class="search-items hide" id="sf">
                    <input name="s" type="text" placeholder="{{ __('interface.search') }}">
                    <button>{{ __('interface.button_search') }}</button>
                </form>

                <a href="">
                    <li>
                        <i class="fas fa-heart"></i>
                    </li>
                </a>
                <a href="">    
                    <li>
                        <i class="fas fa-shopping-cart"></i>    
                    </li>
                </a>
                @auth
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        <li>
                            <i class="fas fa-sign-out-alt"></i>
                        </li>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                @endauth
            </ul>
        </div>
    </div>
</header>

<div class="alerts">
    @if (session("alert"))
        <div class="alert alert_success">
            {{ session("alert") }}
            <span class="close">x</span>
        </div>
    @endif
</div>

@endsection