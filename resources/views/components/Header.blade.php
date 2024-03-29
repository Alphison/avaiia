@php
    use App\Models\Collection;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Storage;
@endphp
@php $collections = Collection::all(); @endphp
<header class="header" id="header">
    <div class="container">
        <div class="header-content dflex justify-between align-center">

            <nav class="burger-nav dflex col gap-4">
                <div class="burger-header dflex justify-between align-center">
                    <a href="{{ route('page-index') }}" class="logo">
                        <div class="logo">
                           @include('components.logo')
                        </div>
                    </a>

                    <a href="" class="close-btn">
                        <img src="{{ asset('assets/icons/close-btn.svg') }}" alt="close-btn">
                    </a>
                </div>
                <ul class="burger-menu dflex col gap-4">
                    <li class="menu__item">
                        <a href="{{ route('collections-page') }}" class="menu__link">
                            {{__('Burger.link')}}
                        </a>

                        <ul class="submenu grid col-2 gap-3">
                            @foreach($collections as $item)
                                <li class="submenu__item">
                                    <a href="{{ route('collection-page', $item) }}" class="submenu__link">
                                        @if (__('main.current_lang') == "en")
                                            {{$item->name_en}}
                                        @elseif(__('main.current_lang') == "ru")
                                            {{$item->name}}  
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                            <li class="submenu__item">
                                <a href="{{ route('collections-page') }}" class="submenu__link acent-color underline">
                                    {{__('Burger.link6')}}
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu__item">
                        <a href="{{ route('page-anons') }}" class="menu__link">
                            {{__('Burger.link2')}}
                        </a>

                        <ul class="submenu">
                            <li class="submenu__item">
                                <a href="{{ route('page-anons') }}" class="submenu__link font-defy acent-color">
                                    “not predicted yet...”
                                </a>
                            </li>
                            <li class="submenu__item">
                                <a href="{{ route('collection-bared') }}#preview-collection"
                                   class="submenu__link font-defy acent-color">
                                    Bared
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu__item">
                        <a href="{{ route('page-about') }}" class="menu__link">
                            {{__('Burger.link3')}}
                        </a>
                    </li>

                    <li class="menu__item">
                        <a href="{{ route('page-contact') }}" class="menu__link">
                            {{__('Burger.link4')}}
                        </a>
                    </li>

                    <li class="menu__item">
                        <ul class="menu-user dflex col gap-2 justify-between header-mobile-links">

                            @guest()
                                <li class="menu__item">
                                    <a href="{{ route('page-auth') }}" class="menu__link">
                                        {{__('Burger.link7')}}
                                    </a>
                                </li>

                                <li class="menu__item">
                                    <a href="{{ route('page-auth') }}" class="menu__link">
                                        {{__('Burger.link8')}}
                                    </a>
                                </li>

                                <li class="menu__item">
                                    <a href="{{ route('cart-page') }}" class="menu__link">
                                        {{__('Burger.link9')}}
                                    </a>
                                </li>
                            @endguest
                            @auth()
                                <li class="menu__item">
                                    <a href="{{ route('user-page', Auth::user()->id) }}" class="menu__link">
                                        {{__('Burger.link')}}
                                    </a>
                                </li>

                                <li class="menu__item">
                                    <a href="{{ route('favorite-page') }}" class="menu__link">
                                        {{__('Burger.link8')}}
                                    </a>
                                </li>

                                <li class="menu__item">
                                    <a href="{{ route('cart-page') }}" class="menu__link">
                                        {{__('Burger.link9')}}
                                    </a>
                                </li>

                            @endauth
                        </ul>
                    </li>
                </ul>

                <div class="burger-footer dflex col gap-2">
                    <a href="{{ route('user-logout') }}">{{__('Burger.exit')}}</a>
                    <a href="{{ asset('documents/Prvcy.pdf') }}">{{__('Burger.link5')}}</a>
                    <p>©2023, All right reserved.</p>
                </div>
            </nav>


            <a class="burger-btn">
                <img
                        src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/burger-white.svg') : asset('assets/icons/burger-dots.svg') }}"
                        alt="logo" class="logo"/>
            </a>


            <a href="{{ route('page-index') }}">
                <div class="logo">
                    @include('components.logo-with-condition')
                </div>
            </a>

            <div class="menu__item-lang menu__item-lang-mobile" style={{ request()->is('about', 'bared', '/') ? 'color:white' : 'color:black' }}>
                <p style="text-transform: uppercase;">{{__('main.current_lang') }}</p>
                <a href="{{ route('set-locale', __('main.set_lang')) }}" class="menu__link menu-cart-link">
                    <img
                            src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/language-white.svg') : asset('assets/icons/language.svg') }}"
                            alt="language" class="menu__icon"/>
                </a>
            </div>



            <a href="{{ route('cart-page') }}" class="menu__link menu-cart-link">
                <img
                        src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/Bag-white.svg') : asset('assets/icons/Bag.svg') }}"
                        alt="Bag" class="menu__icon"/>
                        
                        @auth()
                            @if ($cartItemsCount > 0)
                                <div class="menu-cart-link__isset"></div>
                            @endif
                        @endauth

                        @guest()
                            @if ($cartItemsCount > 0)
                                <div class="menu-cart-link__isset"></div>
                            @endif
                        @endguest
            </a>


            <ul class="menu-user dflex gap-8 desktop-menu">

                @guest()
                    <li class="menu__item menu__item-lang" style={{ request()->is('about', 'bared', '/') ? 'color:white' : 'color:black' }}>
                        <p style="text-transform: uppercase;">{{__('main.current_lang') }}</p>
                        <a href="{{ route('set-locale', __('main.set_lang')) }}" class="menu__link">
                            <img
                                    src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/language-white.svg') : asset('assets/icons/language.svg') }}"
                                    alt="language" class="menu__icon"/>
                        </a>
                    </li>

                    <li class="menu__item">
                        <a href="{{ route('page-auth') }}" class="menu__link">
                            <img
                                    src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/user-white.svg') : asset('assets/icons/User Circle.svg') }}"
                                    alt="User Circle" class="menu__icon"/>
                        </a>
                    </li>

                    <li class="menu__item">
                        <a href="{{ route('page-auth') }}" class="menu__link">
                            <img
                                    src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/heart-white.svg') : asset('assets/icons/Heart Angle.svg') }}"
                                    alt="Bag" class="menu__icon"/>
                        </a>
                    </li>

                    <li class="menu__item">
                        <a href="{{ route('cart-page') }}" class="menu__link">
                            <img
                                    src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/Bag-white.svg') : asset('assets/icons/Bag.svg') }}"
                                    alt="Bag" class="menu__icon"/>

                        </a>

                        @if ($cartItemsCount > 0)
                            <div class="menu-cart-link__isset"></div>
                        @endif

                    </li>
                @endguest
                @auth()
                    <li class="menu__item menu__item-lang" style={{ request()->is('about', 'bared', '/') ? 'color:white' : 'color:black' }}>
                        <p style="text-transform: uppercase;">{{__('main.current_lang') }}</p>
                        <a href="{{ route('set-locale', __('main.set_lang')) }}" class="menu__link">
                            <img
                                    src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/language-white.svg') : asset('assets/icons/language.svg') }}"
                                    alt="User Circle" class="menu__icon"/>
                        </a>
                    </li>
                    <li class="menu__item">
                        <a href="{{ route('user-page', Auth::user()->id) }}" class="menu__link">
                            <img
                                    src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/user-white.svg') : asset('assets/icons/User Circle.svg') }}"
                                    alt="User Circle" class="menu__icon"/>
                        </a>
                    </li>

                    <li class="menu__item">
                        <a href="{{ route('favorite-page') }}" class="menu__link">
                            <img
                                    src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/heart-white.svg') : asset('assets/icons/Heart Angle.svg') }}"
                                    alt="Bag" class="menu__icon"/>
                        </a>
                    </li>

                    <li class="menu__item">

                        <a href="{{ route('cart-page') }}" class="menu__link">
                            <img
                                    src="{{ request()->is('about', 'bared', '/') ? asset('assets/icons/Bag-white.svg') : asset('assets/icons/Bag.svg') }}"
                                    alt="Bag" class="menu__icon"/>

                        </a>

                        @if ($cartItemsCount > 0)
                            <div class="menu-cart-link__isset"></div>
                        @endif
                        
                    </li>

                @endauth
            </ul>
        </div>
    </div>
</header>
