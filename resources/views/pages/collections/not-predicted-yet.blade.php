@extends('templates.index')

@section('section-styles')
    <style>
        .banner {
            background-image: url('{{ asset('assets/images/banner-bg10.jpg') }}');
        }

        @media screen and (max-width: 450px){
            .banner{
                background-image: url('{{ asset('assets/images/banner-bg-sd.jpg') }}');
            }
        }

    </style>
@endsection

@section('title', 'Коллекция')

@section('content')
{{--    <section class="section plates">--}}
{{--        <img src="{{ asset('assets/images/collection-page1.jpg') }}" class="plate" alt="collection.jpg">--}}
{{--        <img src="{{ asset('assets/images/collection-page2.jpg') }}" class="plate" alt="collection.jpg">--}}
{{--        <div class="plate">--}}
{{--            <p>--}}
{{--                Коллекция <span class="font-defy acent-color">“not predicted yet”</span> расскрывает тему стабильного--}}
{{--                состояния в период непредсказуемости. Это--}}
{{--                такое ощущение, где ты не ожидаешь ничего от других, где твоё настроение зависит только от самого тебя,--}}
{{--                где нет бессмысленных переживаний за то, на что не в силах повлиять. В мыслях только приятное ожидание,--}}
{{--                чувство молодости , самодостаточности, внутренний покой и ощущение неосязаемости мира. Память вытеснила--}}
{{--                все плохие воспоминания и оставила только те моменты, где ты находишься в полном слиянии с природой, а--}}
{{--                вокруг тебя лишьтвой же звонкий смех. Впереди амбиции, эмоции, чувственные вечера и огонь в душе.--}}
{{--            </p>--}}

{{--            <p>--}}
{{--                Чтобы передать то ощущение неосязаемости нашего окружения и умиротворения внутри, в коллекции--}}
{{--                присутствует атлас, прозрачность и размытость цветов и сложные оттенки (голубого). Приятные воспоминания--}}
{{--                воплощаются через темно-зелёный цвет северного леса, дымчатой формы изделий и запаха костра от одежды.--}}
{{--                Чтобы передать состояние молодости, страсти и жизненной энергии в некоторых изделиях используется--}}
{{--                красные оттенки, платья в коллекции слегка прилегают к коже и имеют эффект невесомости. Понятие--}}
{{--                непредсказуемости очень многогранно, как и коллекция SS2023--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <img src="{{ asset('assets/images/collection-page3.jpg') }}" class="plate" alt="collection.jpg">--}}
{{--    </section>--}}

    <section class="collection-images grid col-3 gap-10" id="preview-collection">
        <img src="{{ asset('assets/images/collection-page1.jpg') }}" alt="">
        <img src="{{ asset('assets/images/collection-page2.jpg') }}" alt="">
        <img src="{{ asset('assets/images/collection-page3.jpg') }}" alt="">
        <img src="{{ asset('assets/images/collection-page4.jpg') }}" alt="">
        <img src="{{ asset('assets/images/collection-page5.jpg') }}" alt="">
        <img src="{{ asset('assets/images/collection-page6.jpg') }}" alt="">
    </section>
@endsection
