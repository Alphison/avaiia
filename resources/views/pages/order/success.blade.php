@php use Illuminate\Support\Facades\Auth; @endphp
@extends('templates.page')

@section('title', 'Успешная оплата')

@section('section-styles')
    <style>
        .footer {
            display: none;
        }

        body {

        }
    </style>
@endsection

@section('content')
    <section class="section coming-soon payment dflex align-center justify-center col">
        <h1>{{__('order.h1')}}</h1>
        <p>{{__('order.p')}} <span class="bold">123</span>{{__('order.p2')}} <a href="{{ route('user-page', Auth::user()->id) }}" class="acent-color underline">{{__('order.p3')}}</a></p>
    </section>
@endsection
