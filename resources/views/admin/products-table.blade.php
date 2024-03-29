<div class="admin-table-header dflex justify-between align-center">
    <h2>Таблица товаров</h2>
    <a href="" class="addProductButton underline">Добавить товар</a>
</div>
<table class="table">
    <thead>
    <tr>
        <th>Артикул</th>
        <th>Название</th>
        <th>Цвет</th>
        <th>Размеры</th>
        <th>Остаток</th>
        <th>Цена</th>
        <th>Статус</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>

            <td>{{ $product->article }}</td>
            <td>
                <a href="{{ route('product-page', $product) }}">
                    {{ $product->name }}
                </a>

            </td>
            <td>{{ $product->color }}</td>
            <td>

                @foreach($product->sizes as $size)
                    {{ $size->size }}
                @endforeach
            </td>
            <td>{{ $product->count }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->status->text }}</td>
            <td><a href="{{ route('product-edit', $product) }}" class="">ред.</a></td>
            <td>
                <a href="{{ route('product-delete', $product->id) }}" class="deleteProduct" data-id="{{ $product->id }}">
                    <img src="{{ asset('assets/icons/delete.svg') }}" alt="delete" >
                </a>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
