@php use Illuminate\Support\Facades\Auth; @endphp
@extends('templates.page')

@section('title', 'Оплата')

@section('content')

    <section class="section registration payment-section">
        @include('components.steps')
        <div class="container">
            <div class="section-content registration-content pos-relative">
                <script src="https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js" defer></script>
                <form action="{{ route('user-create') }}" method="POST" name="TinkoffPayForm" class="dflex col gap-4" id="payform-tinkoff">
                    @csrf
                    <input class="tinkoffPayRow input" type="hidden" name="frame" value="false">
                    <input class="tinkoffPayRow input" type="hidden" name="terminalkey" value="1681475503881">
                    <input class="tinkoffPayRow input" type="hidden" name="language" value="{{__('main.current_lang') == 'RU' ? 'ru' : 'en'}}">
                    <input class="payform-tinkoff-row" type="hidden" name="receipt" value="">
                    <input class="tinkoffPayRow input" type="hidden" placeholder="{{__('payment.amount')}}" name="amount"
                           value="{{ $order->price }}" required>
                    <input class="tinkoffPayRow input" type="hidden" placeholder="{{__('payment.number')}}" value="{{ $order->id }}"
                           name="order">
                    <input class="tinkoffPayRow input" type="hidden" placeholder="{{__('payment.text')}}" value="{{__('payment.text_value')}}"
                           name="description">
                    <input class="tinkoffPayRow input" type="text" id="fio" placeholder="{{__('payment.fio')}}" value=""
                           name="name">
                    <input class="tinkoffPayRow input" type="text" placeholder="E-mail" name="email" value="">
                    <input class="tinkoffPayRow input" type="text" placeholder="{{__('payment.phone')}}" value="" name="phone">
                    <input class="tinkoffPayRow input" type="text" id="date_dr" placeholder="{{__('payment.birth_day')}}" value="" name="birth_day">

                    <button class="button" type="submit">{{__('payment.btn')}}</button>

                </form>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        const fioMask = new Inputmask({
            mask: "*{1,} *{1,} *{1,}",
            placeholder: "",
            clearIncomplete: true
        });

        const birthdateMask = new Inputmask("99.99.9999");
        birthdateMask.mask(document.getElementById("date_dr"));

        const fioInput = document.getElementById('fio');
        fioMask.mask(fioInput);

        const TPF = document.getElementById("payform-tinkoff");
    
        TPF.addEventListener("submit", function (e) {
            e.preventDefault();
            const {description, amount, email, phone, receipt, name, birth_day, order} = TPF;

            function validatePhone(phoneNumber) {
                const phonePattern = /^\d{10,}$/;
                
                if(!phonePattern.test(phoneNumber)){
                    return alert("Телефон должен быть минимум 10 символов");
                }else{
                    return true
                }
            }
    
            if (receipt) {
                if (!email.value && !phone.value && !name.value && !fio.birth_day)
                    return alert("Поле ФИО, E-mail, Phone и Дата рождения не должно быть пустым");
                
                
                validatePhone(phone.value)
            }

            const data = {
                name: name.value,
                amount: amount.value,
                email: email.value,
                phone: phone.value,
                birth_day: birth_day.value,
                order_id: order.value
            }

            document.cookie = `myObject=${JSON.stringify(data)};path=/`;

            pay(TPF);
        })
    </script>

@endsection
