@php use Illuminate\Support\Facades\Auth; @endphp
@extends('templates.page')

@section('title', 'Оплата отклонена')

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
    <section class="section coming-soon payment dflex align-center col justify-center">
        <h1>{!!__('order.h2')!!}</h1>
        <p>{{__('order.p4')}} <a
                href="{{ route('delivery-page') }}" class="acent-color underline">{{__('order.p5')}}</a></p>
    </section>
@endsection
