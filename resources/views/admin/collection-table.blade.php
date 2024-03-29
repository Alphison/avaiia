<div class="admin-table-header dflex justify-between align-center">
    <h2>Таблица коллекций</h2>
    <a href="" class="addCollectionButton underline">Добавить коллекцию</a>
</div>
<table class="table">
    <thead>
    <tr>
        <th>Имя</th>
        <th>Текст описания</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
    @foreach($collections as $collection)
        <tr>

            <td>{{ $collection->name }}</td>
            <td>{{ $collection->text }}</td>
            <td>
                <a href="{{ route('collection-edit', $collection) }}">ред.</a>
            </td>
            <td>
                <a href="" class="deleteCollectionButton" data-id="{{ $collection->id }}">
                    <img src="{{ asset('assets/icons/delete.svg') }}" alt="delete" >
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
