@extends('templates.page')

@section('title', 'Редактирование коллекции')

@section('content')
    <section class="section single">
        <div class="container">
            <div class="section-content update-collection">
                <form action="{{ route('collection-update', $collection) }}" class="form collection-form dflex col gap-4" method="post">
                    @csrf
                    <h2>Редактирование коллеции</h2>
                    <label class="input__label dflex col gap-2">
                        Название @error('name'){{$message}}@enderror
                        <input type="text" class="input" name="name"
                               value="{{ $collection->name }}"/>
                    </label>
                    <label class="input__label dflex col gap-2">
                        Название перевод @error('name_en'){{$message}}@enderror
                        <input type="text" class="input" name="name_en"
                               value="{{ $collection->name_en }}"/>
                    </label>

                    <label class="input__label dflex col gap-2">
                        Текст @error('text'){{$message}}@enderror
                        <input type="text" class="input" name="text"
                               value="{{ $collection->text }}"/>
                    </label>
                    <label class="input__label dflex col gap-2">
                        Текст перевод @error('text_en'){{$message}}@enderror
                        <input type="text" class="input" name="text_en"
                               value="{{ $collection->text_en }}"/>
                    </label>
                    <button class="button">Редактировать</button>
                </form>
            </div>
        </div>
    </section>
@endsection
