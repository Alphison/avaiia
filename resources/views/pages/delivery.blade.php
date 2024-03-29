@extends('templates.page')

@section('title', 'Доставка')

@section('content')
    <section class="section registration ">
        @include('components.steps')
        <div class="container">
            <div class="section-content registration-content pos-relative">


                <form action="{{ route('order-update', $order->id) }}" method="post" class="address-container dflex col gap-4">
                    @csrf
                    <a href="{{ route('cart-page') }}" class="acent-color back-to-cart">
                        <span class="material-symbols-outlined">keyboard_backspace</span>
                    </a>
                    <div class="dflex row gap-2 align-center justify-between">
                        <h2 class="address-cart__title">{{__('delivery.h1')}}</h2>
                        <a href="" class="addAddressButton">{{__('delivery.btn')}}</a>
                    </div>

                    @foreach($addresses as $address)
                        <div class="address-item dflex justify-center gap-5">
                            <input type="radio" name="address_id" value="{{ $address->id }}"
                                   id="address{{ $address->id }}" checked>
                            <label for="address{{ $address->id }}"
                                   class="address">{{ $address->post_index }} {{ $address->county }}
                                , {{ $address->city }}, {{ $address->street }} {{ $address->house }}
                                , {{ $address->apartment }}</label>

                        </div>
                    @endforeach

                    @if($addresses->count() > 0)
                        <button class="button">{{__('delivery.btn2')}}</button>
                    @endif
                </form>


                @include('components.address-add')


            </div>
        </div>
    </section>
@endsection
