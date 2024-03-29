@extends('templates.index')

@section('section-styles')
    <style>
        .banner{
            background-image: url('{{ asset('assets/images/collections/bared/banner-bg-ld.jpg') }}');
        }

        @media screen and (max-width: 450px){
            .banner{
                background-image: url('{{ asset('assets/images/collections/bared/banner-bg-sd.jpg') }}');
            }
        }

    </style>
@endsection

@section('title', 'Главная')

@section('meta:description', 'Симбиоз моды искусства и эмоций')

@section('content')

    <section class="section gallery grid col-2">
        <a href="https://www.avaiia.com/products/begushie-65b911febce95" class="gallery-item">
            <img
                src="{{ asset('assets/images/gallery-img3.png') }}"
                alt="gallery_section_photo"
                class="gallery-item__image"
            />
{{--            <p class="gallery-item__text font-defy">Gallery</p>--}}
        </a>
        <a href="https://www.avaiia.com/products/spine-65b8f04675039" class="gallery-item acent-color">
            <img
                src="{{ asset('assets/images/gallery-img4.jpg') }}"
                alt="grid_section_photo"
                class="gallery-item__image gallery-item__image-large"
            />

            <img
                src="{{ asset('assets/images/gallery-img4.jpg') }}"
                alt="grid_section_photo"
                class="gallery-item__image gallery-item__image-small"
            />
{{--            <p class="gallery-item__text font-defy">Look book</p>--}}
        </a>
    </section>

    <section class="section subscribe">
        <div class="container">
            <div class="section-content subscribe-content">
                <form action="{{ route('sub-create') }}" class="form subscribe-form dflex col align-center gap-7" method="post">
                    @csrf
                    <h1 class="subscribe__title font-defy acent-color">Be the first to know</h1>

                    <input
                        type="text"
                        class="subscribe-input"
                        placeholder="{{ __('home.email') }}"
                        name="email"
                        value="{{ old('email') }}"
                    />

                    <p class="input-error">@error('email'){{$message}}@enderror</p>
                    <button class="button subscribe__btn">{{ __('home.subscribe') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
