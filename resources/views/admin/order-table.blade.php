<table class="table">
    <thead>
    <tr>
        <th>Номер</th>
        <th>Статус</th>
        <th>Количество</th>
        <th>Дата</th>
        <th>Цена</th>
        <th>Детали</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>

            <td>{{ $order->id }}</td>
            <td>
                {{ $order->status->name }}
            </td>

            <td>{{ $order->products->count() }}</td>
            <td>{{ $order->date }}</td>
            <td>{{ $order->price }}</td>
            <td><a href="{{ route('order-page', $order->id) }}" class="underline acent-color">Детали</a> </td>
        </tr>
    @endforeach


    </tbody>
</table>
