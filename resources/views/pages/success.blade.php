@php use Illuminate\Support\Facades\Auth; @endphp
@extends('templates.page')

@section('title', 'Успешная оплата')

@section('content')

    <section class="section success_section">

        <div class="container">
            <h2 style="text-align: center">{{__('success_pay.h1')}}</h2>
            <p class="about-text" style="text-align: center; width: 50%; margin: 0 auto;">
                {{__('success_pay.p1')}}<br><br>
                {{__('success_pay.p2')}}
            </p>
        </div>

    </section>

@endsection