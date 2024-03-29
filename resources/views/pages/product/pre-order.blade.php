<section class="section modal pre-order-modal">
    <div class="modal-wrapper dflex col gap-4">
        <h2>{{__('product.text2')}}</h2>
        <form action="{{ route('preOrder-create') }}" class="dflex col gap-2" method="post">
            @csrf
            <label class="input__label dflex col gap-2">
                {{__('product.col')}}
                <select class="input" name="size">
                    @foreach($product->sizes as $size)
                        @if($size->count <= 0) @continue @endif
                        <option value="{{ $size->size }}">{{ $size->size }}</option>
                    @endforeach
                </select>
                <p>@error('size'){{$message}} @enderror</p>
            </label>

            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button class="button">{{__('product.btn6')}}</button>
        </form>
    </div>

</section>
