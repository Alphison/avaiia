@extends('templates.page')

@section('title', 'Авторизация')

@section('content')
    <section class="section registration">
        <div class="container">
            <div class="section-content registration-content">
                <h2 class="section__title registration__title">{{__('login.h1')}}</h2>
                <p class="section__subtitle registration__subtitle">
                    {{__('login.h2')}}
                </p>
                <form action="{{ route('user-auth') }}" class="form auth-form dflex col gap-10" method="post">
                    @csrf
                    <label class="input__label dflex col gap-2">
                        Email
                        <input type="email" class="input" name="email" placeholder="example@test.com"/>
                        <p class="input-error">@error('email'){{$message}}@enderror</p>
                    </label>

                    <label class="input__label dflex col gap-2">
                        {{__('login.pass')}}
                        <input type="password" class="input" name="password" placeholder="●●●●●●"/>
                        <p class="input-error">@error('password'){{$message}}@enderror</p>
                        @error(''){{$message}}@enderror
                    </label>

                    <div class="form-footer">
                        <button class="button registration__btn">{{__('login.btn')}}</button>
                        {{-- <p><a href="{{ route('page-reg') }}" class="acent-color underline">{{__('login.link')}}</a> {{__('login.link_text')}}</p> --}}
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
