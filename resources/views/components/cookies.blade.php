<div class="cookies">
    <img src="{{ asset('assets/icons/cookie.svg') }}" alt="cookie" class="cookies__img">
    <div class="cookies__inner">
        <h3>{{__('cookie.h1')}}</h3>
        <p>
            {!!__('cookie.p')!!}
        </p>
        <p>
            {{__('cookie.p2')}}
        </p>
        <div class="dflex row justify-center gap-4">
            <a href="" class="acent-color underline cookiesAccept">{{__('cookie.btn')}}</a>
            <a href="" class="acent-color underline cookiesReject">{{__('cookie.btn2')}}</a>
        </div>
    </div>
</div>
