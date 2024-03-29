@extends('templates.page')

@section('title', 'Регистрация')

@section('content')
    <section class="section registration">
        <div class="container">
            <div class="section-content registration-content">
                <h2 class="section__title registration__title">Регистрация</h2>
                <p class="section__subtitle registration__subtitle">
                    Для совершения оплаты и других действий
                    необходимо создать аккаунт
                </p>
                <form action="{{ route('user-create') }}" class="form registration-form grid col-2 gap-10" method="post">
                    @csrf
                    <label class="input__label dflex col gap-2">
                        Имя
                        <input type="text" class="input" name="name" value="{{ old('name') }}"/>
                        <p class="input-error">@error('name'){{$message}}@enderror</p>
                    </label>
                    <label class="input__label dflex col gap-2">
                        Фамилия
                        <input type="text" class="input" name="surname" value="{{ old('surname') }}"/>
                        <p class="input-error">@error('surname'){{$message}}@enderror</p>
                    </label>

                    <label class="input__label dflex col gap-2">
                        Номер телефона
                        <input type="text" class="input" name="phone" value="{{ old('phone') }}"/>
                        <p class="input-error">@error('phone'){{$message}}@enderror</p>
                    </label>

                    <label class="input__label dflex col gap-2">
                        Email
                        <input type="email" class="input" name="email" value="{{ old('email') }}"/>
                        <p class="input-error">@error('email'){{$message}}@enderror</p>
                    </label>

                    <label class="input__label dflex col gap-2">
                        Дата Рождения
                        <input type="date" class="input" name="birth_day" value="{{ old('birth_day') }}"/>
                        <p class="input-error">@error('date'){{$message}}@enderror</p>
                    </label>

                    <label class="input__label dflex col gap-2">
                        Пароль
                        <input type="password" class="input" name="password" placeholder="●●●●●●"/>
                        <p class="input-error">@error('password'){{$message}}@enderror</p>
                    </label>

                    <label class="input__label dflex col gap-2">
                        Повтор пароля
                        <input type="password" class="input" name="re_password" placeholder="●●●●●●"/>
                        <p class="input-error">@error('re_password'){{$message}}@enderror</p>
                    </label>

                    <div class="checkbox-container dflex justify-center align-center">
                        <input type="checkbox" id="reg_checkbox" name="accept" class="checkbox-hidden"/>
                        <label for="reg_checkbox" class="checkbox__label dflex gap-5 align-center">
                            <div class="checkbox__box"></div>
                            <p class="checkbox__text">
                                Согласен с <a href="{{ asset('documents/Prvcy.pdf') }}" class="acent-color underline"> обработкой личных данных</a>
                            </p>
                        </label>
                        <p class="input-error">@error('accept'){{ $message }}@enderror</p>
                    </div>
                    <div class="form-footer">
                        <button class="button registration__btn">Регистрация</button>
                        <p><a href="{{ route('page-auth') }}" class="acent-color underline">Войдите,</a> если вы уже зарегистрированы</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
