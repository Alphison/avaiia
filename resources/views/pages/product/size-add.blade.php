<section class="section modal size-modal">
    <div class="modal-wrapper dflex col gap-4">
        <h2>Д{{__('product.text3')}}</h2>
        <form action="{{ route('size-create') }}" class="dflex col gap-2" method="post">
            @csrf
            <label class="input__label dflex col gap-2">
                {{__('product.col')}}
                <input type="text" class="input" name="size">
                <p>@error('size'){{$message}} @enderror</p>
            </label>
            <label class="input__label dflex col gap-2">
                {{__('cart.count')}}
                <input type="text" class="input" name="count">
                <p>@error('count'){{$message}} @enderror</p>
            </label>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button class="button">{{__('product.btn7')}}</button>
        </form>
    </div>

</section>
