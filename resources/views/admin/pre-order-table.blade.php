<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Размер</th>
        <th>Название продукта</th>
        <th>Контакты</th>
        <th>Дата создания</th>

    </tr>
    </thead>
    <tbody>
    @foreach($preOrders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->size }}</td>
            <td>
                <a href="{{ route('product-page', $order->product) }}">{{ $order->product->name }}</a>
            </td>
            <td>{{ $order->user->phone }} | {{ $order->user->email }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
    @endforeach


    </tbody>
</table>
