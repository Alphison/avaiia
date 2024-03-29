@extends('templates.page')

@section('title', $product->name)

@section('content')
    <section class="section admin">
        <div class="container">
            <div class="section-content admin-content">
                <div class="admin-modal">
                    <h2 class="admin__title">Редактирование товара</h2>
                    <form action="{{ route('product-update', $product) }}" class="form admin-form grid col-2 gap-5" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <label class="input__label dflex col gap-2">
                            Название
                            <input type="text" class="input" name="name"
                                   value="{{ $product->name }}"/>
                            <p class="input-error">@error('name'){{$message}}@enderror</p>

                        </label>
                        <label class="input__label dflex col gap-2">
                            Название(перевод)
                            <input type="text" class="input" name="name_en"
                                   value="{{ $product->name_en }}"/>
                            <p class="input-error">@error('name_en'){{$message}}@enderror</p>

                        </label>
                        <label class="input__label dflex col gap-2">
                            Цена
                            <input type="text" class="input" name="price"
                                   value="{{ $product->price }}"/>
                            <p class="input-error">@error('price'){{$message}}@enderror</p>
                        </label>


                        <label class="input__label dflex col gap-2">
                            Уход
                            <textarea name="care" class="input">{{ $product->care }}</textarea>
                            <p class="input-error">@error('care'){{$message}}@enderror</p>
                        </label>
                        <label class="input__label dflex col gap-2">
                            Уход(перевод)
                            <textarea name="care_en" class="input">{{ $product->care_en }}</textarea>
                            <p class="input-error">@error('care_en'){{$message}}@enderror</p>
                        </label>

                        <label class="input__label dflex col gap-2">
                            Описание
                            <textarea name="description" class="input">{{ $product->description }}</textarea>
                            <p class="input-error">@error('description'){{$message}}@enderror</p>
                        </label>

                        <label class="input__label dflex col gap-2">
                            Описание(перевод)
                            <textarea name="description_en" class="input">{{ $product->description_en }}</textarea>
                            <p class="input-error">@error('description_en'){{$message}}@enderror</p>
                        </label>



                        <label class="input__label dflex col gap-2">
                            Артикул @error('article'){{$message}}@enderror
                            <input type="text" class="input" name="article"
                                   value="{{ $product->article }}"/>
                        </label>

                        <label class="input__label dflex col gap-2">
                            Цвет
                            <input type="text" class="input" name="color" value="{{ $product->color }}"/>
                            <p class="input-error">@error('color'){{$message}}@enderror</p>
                        </label>

                        <label class="input__label dflex col gap-2">
                            Цвет(перевод)
                            <input type="text" class="input" name="color_en" value="{{ $product->color_en }}"/>
                            <p class="input-error">@error('color_en'){{$message}}@enderror</p>
                        </label>

                        <label class="input__label dflex col gap-2">
                            Коллекция @error('collection_id'){{$message}}@enderror
                            <select name="collection_id" class="input">
                                @foreach($collections as $collection)
                                    <option value="{{ $collection->id }}"
                                        @if($product->collection_id == $collection->id) selected @endif
                                    >
                                        {{ $collection->name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        <label class="input__label dflex col gap-2">
                            Общее количество(всех размеров)
                            <input type="text" class="input" name="count" value="{{ $product->count }}"/>
                            <p class="input-error">@error('count'){{$message}}@enderror</p>

                        </label>

                        <label class="input__label dflex col gap-2">
                            Статус @error('status_id'){{$message}}@enderror
                            <select name="status_id" class="input">
                                @foreach($productStatuses as $status)

                                    <option value="{{ $status->id }}"
                                        @if($product->status_id == $status->id) selected @endif
                                    >
                                        {{ $status->text }}
                                    </option>
                                @endforeach
                            </select>
                        </label>

                        <label class="input__label dflex col gap-2">
                            Превью товара
                            <input type="file" name="preview_image" value="{{ old('preview_image') }}">
                            <p class="input-error">@error('preview_image'){{$message}}@enderror</p>
                        </label>

                        <label class="input__label dflex col gap-2">
                            Доп фото для товара @error('images'){{$message}}@enderror
                            <input type="file" name="images[]" multiple value="{{ old('images[]') }}">
                            <p class="input-error">@error('images'){{$message}}@enderror</p>
                        </label>


                        <div class="form-footer">
                            <button class="button registration__btn">Редактировать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
