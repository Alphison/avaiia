
<div class="modal collection-modal">
    <div class="modal-wrapper">
        <form action="{{ route('collection-create') }}" class="form collection-form dflex col gap-4" method="post">
            @csrf
            <h2>Добавление коллеции</h2>
            <label class="input__label dflex col gap-2">
                Название @error('name'){{$message}}@enderror
                <input type="text" class="input" name="name"
                       value="{{ old('name') }}"/>
            </label>
            <label class="input__label dflex col gap-2">
                Название перевод @error('name_en'){{$message}}@enderror
                <input type="text" class="input" name="name_en"
                       value="{{ old('name') }}"/>
            </label>

            <label class="input__label dflex col gap-2">
                Текст @error('text'){{$message}}@enderror
                <input type="text" class="input" name="text"
                       value="{{ old('name') }}"/>
            </label>
            <label class="input__label dflex col gap-2">
                Текст перевод @error('text_en'){{$message}}@enderror
                <input type="text" class="input" name="text_en"
                       value="{{ old('name') }}"/>
            </label>
            <button class="button">Добавить</button>
        </form>
    </div>
</div>


