@php use Illuminate\Support\Facades\Auth; @endphp
@extends('templates.page')

@section('title', $product->name)

@section('content')
    <section class="section product" id="product">
        <div class="container">
            <div class="section-content product-content">
                <div class="grid product-grid col-2 gap-8">
                    <div class="product-images">
                        <div class="swiper swiper-top">
                            <div class="swiper-wrapper">
                                <img src="{{ $product->preview_url }}" alt="product1"
                                     class="product__preview swiper-slide"/>
                                @foreach($product->images as $image)
                                    <img src="{{ $image->url }}" class="product__preview swiper-slide" alt=""/>
                                @endforeach
                            </div>
                        </div>
                        <div thumbsSlider="" class="product-images__list swiper swiper-bottom">
                            <div class="swiper-wrapper grid col-4">
                                <img src="{{ $product->preview_url }}" alt="product1"
                                     class="product-images__item swiper-slide"/>

                                @foreach($product->images as $image)
                                    <img src="{{ $image->url }}" class="product-images__item swiper-slide" alt=""/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product__name">
                            @if (__('main.current_lang') == "en")
                                {{$product->name_en}}
                            @elseif(__('main.current_lang') == "ru")
                                {{$product->name}}  
                            @endif
                        </h2>
                        <p class="product__price">₽ {{ number_format(num: $product->price, thousands_separator: ' ') }}</p>
                        <form action="{{ route('cart-create') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @error('size_id')
                            <p class="alert-warning">{{__('product.error')}}</p>
                            @enderror
                            <div class="product-sizes dflex justify-between align-center">
                                <p>
                                    {{__('product.size')}}:
                                    @foreach($product->sizes as $size)
                                        @if($size->count <= 0)
                                            @continue
                                        @else
                                            <input type="radio" name="size_id" value="{{ $size->id }}"
                                                   id="radioSize{{ $size->id }}">
                                            <label for="radioSize{{ $size->id }}" class="size">{{ $size->size }}</label>
                                        @endif
                                    @endforeach
                                </p>
                                <a href="#sizeGuide" class="size__guide">Size guide</a>
                            </div>

                            <p class="product__color">{{__('product.color')}}:
                            <span class="color__text">
                                @if (__('main.current_lang') == "en")
                                    {{$product->color_en}}
                                @elseif(__('main.current_lang') == "ru")
                                    {{$product->color}}  
                                @endif
                            </span></p>
                            @if($product->count > 0 && $product->status->name == 'visible')
                                <button class="button addToCart-btn">{{__('product.btn')}}</button>
                            @elseif($product->status->name == 'PreOrder')
                                <button class="button preOrderButton">{{__('product.btn2')}}</button>
                            @else
                                <a class="button">{{__('product.btn3')}}</a>
                            @endif

                        </form>

                        @if(Auth::user() && Auth::user()->is_admin)
                            <a class="button addSizeButton">{{__('product.btn4')}}</a>
                            <a href="{{ route('product-edit', $product) }}" class="button">{{__('product.btn5')}}</a>
                        @endif
                        <div class="product-description">
                            <p class="product__subtitle">{{__('product.text')}}</p>
                            <p class="product__article">ART. {{ $product->article }}</p>
                            <p class="product__text">
                                @if (__('main.current_lang') == "en")
                                    {{$product->description_en}}
                                @elseif(__('main.current_lang') == "ru")
                                    {{ $product->description }}  
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="product-accordions">
                    <div class="accordion">
                        <div class="accordion-top dflex justify-between align-center">
                            <p>{{__('product.h1')}}</p>
                            <span class="material-symbols-outlined accordion-arrow">expand_more</span>
                        </div>
                        <p class="accordion-bottom">
                            @if (__('main.current_lang') == "en")
                                {{$product->care_en}}
                            @elseif(__('main.current_lang') == "ru")
                                {{ $product->care }}  
                            @endif
                        </p>
                    </div>

                    <div class="accordion" id="sizeGuide">
                        <div class="accordion-top dflex justify-between align-center">
                            <p>{{__('product.h2')}}</p>
                            <span class="material-symbols-outlined accordion-arrow">expand_more</span>
                        </div>
                        <div class="accordion-bottom">
                            @include('pages.product.sizes')
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    @include('pages.product.pre-order')

    @if(Auth::user() && Auth::user()->is_admin)
        @include('pages.product.size-add')
    @endif
@endsection
