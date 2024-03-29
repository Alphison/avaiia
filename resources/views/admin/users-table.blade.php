<div class="admin-table-header dflex justify-between align-center">
    <h2>Таблица пользователей</h2>
    <form method="get">
        <input type="text" class="input" name="email" placeholder="Найти">
    </form>
</div>
<table class="table">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Почта</th>
        <th>Дата рожения</th>
        <th>Количество заказов</th>
        <th>Номер телефона</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>

            <td>{{ $user->name }} {{ $user->surname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->birth_day }}</td>
            <td>{{ $user->order_count }}</td>
            <td>{{ $user->phone }}</td>
            <td>
                @if(!$user->is_admin)
                    <a href="" class="updateUserButton" data-id="{{ $user->id }}">Повысить</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
