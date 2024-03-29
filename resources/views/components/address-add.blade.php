<div class="modal address-modal">
    <div class="modal-wrapper address-wrapper">
        <h2 class="section__title registration__title">{{__('adressadd.h1')}}</h2>

        <form action="{{ route('delivery-create') }}" class="form registration-form grid col-2 gap-10"
              method="post">
            @csrf
            <label class="input__label dflex col gap-2">
                {{__('adressadd.h2')}}
                <input type="text" class="input" name="country" value="{{ old('country') }}"/>
                <p class="input-error">@error('country'){{$message}}@enderror</p>
            </label>

            <label class="input__label dflex col gap-2">
                {{__('adressadd.h3')}}
                <input type="text" class="input" name="city" value="{{ old('city') }}"/>
                <p class="input-error">@error('city'){{$message}}@enderror</p>
            </label>

            <label class="input__label dflex col gap-2">
                {{__('adressadd.h4')}}
                <input type="text" class="input" name="street" value="{{ old('street') }}"/>
                <p class="input-error">@error('street'){{$message}}@enderror</p>
            </label>

            <label class="input__label dflex col gap-2">
                {{__('adressadd.h5')}}
                <input type="text" class="input" name="house" value="{{ old('house') }}"/>
                <p class="input-error">@error('house'){{$message}}@enderror</p>
            </label>

            <label class="input__label dflex col gap-2">
                {{__('adressadd.h6')}}
                <input type="text" class="input" value="{{ old('apartment') }}" name="apartment"/>
                <p class="input-error">@error('apartment'){{$message}}@enderror</p>
            </label>

            <label class="input__label dflex col gap-2">
                {{__('adressadd.h7')}}
                <input type="number" class="input" name="post_index" value="{{ old('post_index') }}"/>
                <p class="input-error">@error('post_index'){{$message}}@enderror</p>
            </label>

            <div class="form-footer">
                <button class="button registration__btn">{{__('adressadd.btn')}}</button>
            </div>
        </form>

    </div>
</div>

