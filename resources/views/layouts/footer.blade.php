@section('footer')
<footer>
    <div class="container">
        <div class="map">
            <h3>
                {{ __('interface.footer_company') }}
            </h3>
            <ul>
                <a class="company" href="{{ route('about', []) }}">
                    <li>
                        {{ __('interface.footer_about') }}
                    </li>
                </a>
                <a class="company" href="{{ route('privacy', []) }}">
                    <li>
                        {{ __('interface.footer_privacy') }}
                    </li>
                </a>
                <a class="company" href="{{ route('careers', []) }}">
                    <li>
                        {{ __('interface.footer_career') }}
                    </li>
                </a>
            </ul>
        </div>
        <div class="socials">
            <h3>
                {{ __('interface.footer_find') }}
            </h3>
            <ul>
                <a class="company" href="" target="_blank">
                    <li>
                        <i class="fab fa-vk"></i>
                    </li>
                </a>
                <a class="company" href="" target="_blank">
                    <li>
                        <i class="fab fa-instagram"></i>
                    </li>
                </a>
            </ul>
        </div>
    </div>
    <div class="logo">
        <a routerLink="">
            <img src="{{ asset('img/logo_bottom.png') }}" alt="">
        </a>
    </div>
</footer>
@endsection