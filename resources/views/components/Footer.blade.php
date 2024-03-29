<footer class="footer">
    <div class="container">
        <div class="footer-content dflex justify-between align-center">
            <img src="{{ asset('assets/icons/logo.svg') }}" alt="logo" class="logo footer-logo"/>

            <nav class="menu footer-menu">
                <ul class="menu-list dflex align-center gap-13">
                    <li class="menu__item">
                        <a href="{{ asset('documents/dostavka.pdf') }}" target="_blank" class="menu__link">{{__('footer.link')}}</a>
                    </li>
                    <li class="menu__item">
                        <a href="{{ asset('documents/vozvrat-tovara.pdf') }}" target="_blank" class="menu__link">{{__('footer.link2')}}</a>
                    </li>
                    <li class="menu__item">
                        <a href="{{ route('page-about') }}#about" class="menu__link">{{__('footer.link3')}}</a>
                    </li>
                    <li class="menu__item">
                        <a href="{{ route('page-contact') }}" class="menu__link">{{__('footer.link4')}}</a>
                    </li>
                    <li class="menu__item">
                        <a href="" class="menu__link scrollTop">{{__('footer.link5')}}</a>
                    </li>
                    @auth()
                        <li class="menu__item">
                            <a href="{{ route('user-logout') }}">{{__('footer.exit')}}</a>
                        </li>
                    @endauth
                </ul>
            </nav>

            <a href="https://t.me/avaiia" target="_blank" class="footer__link">
                <img src="{{ asset('assets/icons/logos_telegram.svg') }}" alt="telegram" class="icon__link"/>
            </a>
        </div>
    </div>
    <hr class="footer__line"/>
    <div class="container">
        <ul class="footer-bottom dflex justify-between align-center">
            <li class="footer-bottom__item">©2023, All right reserved.</li>
            <li class="footer-bottom__item">
                <a href="{{ asset('documents/Prvcy.pdf') }}" target="_blank" class="footer-bottom__link">{{ __('footer.link6')}}</a>
            </li>
            <li class="footer-bottom__item">
                <a href="{{ asset('documents/Avaiia-oferta.pdf') }}" target="_blank" class="footer-bottom__link">{{__('footer.link7')}}</a>
            </li>
            <li class="footer-bottom__item">
                <a href="#" class="footer-bottom__link">Cookies Settings</a>
            </li>
        </ul>
    </div>
</footer>
