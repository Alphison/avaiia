@extends('templates.index')

@section('section-styles')
    <style>
        .banner {
            background-image: url('{{ asset('assets/images/new-banner-bg-2.jpg') }}');
        }

        @media (max-width: 450px) {
            .banner {
                background-image: url('{{ asset('assets/images/banner-bg-about-sd.jpeg') }}');
                background-position: center!important;
                background-size: cover;

            }
        }


    </style>
@endsection

@section('title', 'О нас')

@section('meta:description', 'Бренд AVAIIA учит чувствовать одежду и смотреть на нее под другим углом')

@section('content')
    <section class="section about" id="about">
        <div class="container">
            <div class="section-content about-content">
                <div class="dots col">
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
                <p class="about-text">
                    {!!__('about.p')!!}
                </p>
                <p class="about-text">
                    {!!__('about.p2')!!}
                </p>
                <p class="about-text">
                    {!!__('about.p3')!!}
                </p>
                <p class="about-text">
                    {!!__('about.p4')!!}
                </p>
            </div>
        </div>
    </section>
@endsection
