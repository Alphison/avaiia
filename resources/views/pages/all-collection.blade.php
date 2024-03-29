@extends('templates.page')

@section('title', 'Все товары')

@section('content')

    <section class="section catalog">
        <div class="container">
            <div class="section-content catalog-content">
                <div class="grid col-3 gap-13">
                    {{--                    <div class="grid-item dflex col catalog-description">--}}
                    {{--                        <div class="dflex">--}}

                    {{--                            <h2 class="catalog__title">Все изделия</h2>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    @foreach($products as $product)
                        @if($product->status->name == 'hidden')
                            @continue
                        @endif
                        <div class="product dflex col">
                            <a href="{{ route('product-page', $product) }}" class="product-header">
                                @if($product->status->name != 'visible')
                                    <div class="product-plate">
                                        <h3 class="product__text">{{ $product->status->text }}</h3>
                                    </div>
                                @endif
                                <img src="{{ $product->preview_url }}" alt="catalog1" class="product-img"/>
                            </a>
                            <footer class="product-footer dflex justify-between align-center">
                                <a href="{{ route('product-page', $product) }}" class="product__item">
                                    <p class="product__name">
                                        @if (__('main.current_lang') == "EN")
                                            {{$product->name_en}}
                                        @elseif(__('main.current_lang') == "RU")
                                            {{$product->name}}  
                                        @endif    
                                    </p>
                                    <p class="product__price">₽ {{ number_format(num: $product->price, thousands_separator: ' ') }}</p>
                                </a>
                                <div class="product__item">
                                    {{--                                    <a href="">--}}
                                    {{--                                        <img src="{{ asset('assets/icons/Heart Angle.svg') }}" alt="Heart Angle"/>--}}
                                    {{--                                    </a>--}}
                                    <a href="{{ route('product-page', $product) }}">
                                        <img src="{{ asset('assets/icons/Bag.svg') }}" alt="Bag"/>
                                    </a>
                                </div>
                            </footer>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

