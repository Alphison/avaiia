@extends('templates.page')

@section('title', 'Контакты')

@section('content')
    <section class="section contact">
        <div class="container">
            <div class="contact-content">
                <div class="contact-header dflex col gap-4">
                    <h2>{{__('contacts.h1')}}</h2>
                    <p style="max-width: 480px; margin: 0 auto; font-weight: 300;">
                        {{__('contacts.p')}}
                    </p>
                </div>

                <ul class="contact-list dflex col gap-8">
                    <li class="contact__item">
                        <p>{{__('contacts.p2')}}</p>
                        <h3>avaiia.3a2i@mail.ru</h3>
                    </li>

                    <li class="contact__item">
                        <p>{{__('contacts.p3')}}</p>
                        <h3>+7 987 221 91 81</h3>
                    </li>

                    <li class="contact__item">
                        <p>{{__('contacts.p4')}}</p>
                        <h3 style="max-width: 450px; margin: 0 auto;">{{__('contacts.p5')}} <br>
                            {{__('contacts.p6')}}</h3>
                    </li>
                </ul>

            </div>
        </div>
    </section>
@endsection
