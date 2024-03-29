@extends('templates.page')

@section('title', 'Избранное')

@section('section-styles')
    <style>
        .footer{
            display: none;
        }

        body{
            background-image: url("{{asset('assets/images/soon-pattern.png')}}");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection

@section('content')
    <section class="section coming-soon">
        <h1>{{__('favorite.text')}}</h1>
        <p>{{__('favorite.text2')}}</p>
    </section>
@endsection
