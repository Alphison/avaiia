<form action="{{ route('promo-create') }}" class="form promocode-form dflex row gap-4 align-center" method="post">
    @csrf
    <input type="text" class="input" name="promocode" placeholder="Текст">
    <input type="text" class="input" name="value" placeholder="Стоимость">
    <button class="button">Добавить</button>
</form>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Промокод</th>
        <th>Скидка</th>
        <th>Дата создания</th>
        <th>Удалить</th>

    </tr>
    </thead>
    <tbody>
    @foreach($promocodes as $promo)
        <tr>
            <td>{{ $promo->id }}</td>
            <td>{{ $promo->promocode }}</td>
            <td>{{ $promo->value }} %</td>
            <td>{{ $promo->created_at }}</td>
            <td>
                <a class="deletePromocode" data-id="{{ $promo->id }}">
                    <img src="{{ asset('assets/icons/delete.svg') }}" alt="delete">
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
