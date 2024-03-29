@extends('templates.page')

@section('title', 'Корзина')

@section('content')

    <section class="section steps" id="steps">
        @include('components.steps')
        <div class="cart" id="cart">
            <div class="container">
                <div class="cart-content">
                    @foreach($cart as $item)
                        <div class="product grid gap-13">
                            <div class="product-images">
                                <img src="{{ $item->product->preview_url }}" alt="product1" class="product__preview"/>
                            </div>
                            <div class="product-info dflex col gap-5">
                                <h2 class="product__name">
                                    @if (__('main.current_lang') == "EN")
                                        {{$item->product->name_en}}
                                    @elseif(__('main.current_lang') == "RU")
                                        {{$item->product->name}}  
                                    @endif
                                </h2>
                                <p class="product__article">ART. {{ $item->product->article }}</p>

                                <div class="product-sizes dflex justify-between align-center">
                                    <p>{{__('cart.size')}}: <span class="size">{{ $item->size->size }}</span></p>
                                </div>
                                <p class="product__color">{{__('cart.color')}}:
                                    <span class="color__text">
                                        @if (__('main.current_lang') == "EN")
                                            {{$item->product->color_en}}
                                        @elseif(__('main.current_lang') == "RU")
                                            {{$item->product->color}}  
                                        @endif
                                    </span>
                                </p>
                                <a href="{{ route('cart-delete', $item->id) }}" class="product__delete">
                                    <img src="{{ asset('assets/icons/delete.svg') }}" alt="delete"
                                         class="icon icon__delete"/>
                                </a>

                                <div class="product-footer">
                                    <div class="product-counter counter dflex row gap-2 align-center"
                                         data-price="{{ $item->product->price }}">
                                        <p class="counter__title">{{__('cart.count')}}:</p>
                                        <span class="counter__item counterMinus">-</span>
                                        <input type="text" class="input counter__input" value="{{ $item->count }}"
                                               data-size="{{ $item->size->id }}" data-product="{{ $item->product->id }}"
                                               disabled>
                                        <span class="counter__item counterPlus">+</span>
                                        <p class="counter__price">₽ <span class="price__value"
                                                                          data-price="{{ $item->product->price }}">{{ $item->product->price }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="promo-form">
                        <label class="input__label dflex col gap-2">
                            {{__('cart.code')}}
                            <input type="email" class="input" name="promocode" id="promoInput"/>
                            <p class="input-error">@error('promocode'){{$message}}@enderror</p>
                        </label>
                        <button class="button" id="promoButton" disabled>{{__('cart.btn')}}</button>
                    </div>

                    <form action="{{ route('order-create') }}" method="post" class="cart-footer dflex col gap-4">
                        @csrf
                        <div class="cart-counter dflex justify-between" id="cart-counter">
                            <p><span class="item__counter" id="itemCounter">0</span> items</p>
                            <p class="total__price">₽<span id="totalPrice">0</span></p>
                        </div>
                        <input type="hidden" name="price" value="0" id="hiddenPrice">

                        @if($cart->count() > 0)
                            <button class="button">{{__('cart.btn2')}}</button>
                            <h5 class="cart-underbutton">{{__('cart.p')}}</h5>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
