@extends('templates.page')

@section('title', 'Заказ #' . $order->id)

@section('content')
    <section class="section user">
        <div class="container">
            <div class="section-content user-content">
                <div class="user-info dflex col gap-2">
                    <h2>Заказчик:</h2>
                    <p>{{ $user->name }} {{ $user->surname }}</p>
                    <p>Контакты</p>
                    <p class="dflex align-center"><span class="material-symbols-outlined">mail</span>{{ $user->email }}</p>
                    <p class="dflex align-center"><span class="material-symbols-outlined">call</span>{{ $user->phone }}</p>
                    <hr>
                    <div class="user__item dflex col gap-2">
                        <p>О заказе:</p>
                        <p>№ {{ $order->id }}</p>
                        <p>₽ {{ $order->price }}</p>
                        <form method="POST" class="dflex col">
                            @csrf
                            <label for="status_select">Статус заказа:</label>
                            <select name="status_id" id="status_select" data-id="{{ $order->id }}"
                                    class="order-status__select input">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}"
                                            @if($order->status_id == $status->id)selected @endif>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </form>

                        @if(!empty($order->address))
                            <p>Адрес доставки: <br> {{ $order->address->post_index }} {{ $order->address->country }} <br> {{ $order->address->city }}, {{$order->address->street}} д. {{ $order->address->house }} кв. {{ $order->address->apartment }}</p>
                        @else
                            <p>Заказчик не указал адресс доставки</p>
                        @endif
                    </div>
                </div>
                <div class="user-orders">
                    <div class="table-header dflex justify-between align-center">
                        <h2>Состав заказа № {{ $order->id }}</h2>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Артикул</th>
                            <th>Размер</th>
                            <th>Количество</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product->id }}</td>
                                <td>{{ $product->product->name }}</td>
                                <td>{{ $product->product->article }}</td>
                                <td>{{ $product->size->size }}</td>
                                <td>{{ $product->count }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
@endsection
