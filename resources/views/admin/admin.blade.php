@extends('templates.page')

@section('title', 'Панель администратора')

@section('content')

    <section class="section admin">
        <div class="container">
            <div class="section-content admin-content">
                <div class="admin-header dflex align-center justify-between">
                    <div class="header-tab">Пользователи</div>
                    <div class="dots row">
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="header-tab">Товары</div>
                    <div class="dots row">
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="header-tab">Заказы</div>
                    <div class="dots row">
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="header-tab">Коллекции</div>
                    <div class="dots row">
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="header-tab">Предзаказы</div>
                    <div class="dots row">
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="header-tab">Промокоды</div>
                </div>

                <div class="tab">
                    @include('admin.users-table')
                </div>

                <div class="tab">
                    @include('admin.products-table')
                </div>

                <div class="tab">
                    @include('admin.order-table')
                </div>

                <div class="tab">
                    @include('admin.collection-table')
                </div>

                <div class="tab">
                    @include('admin.pre-order-table')
                </div>

                <div class="tab">
                    @include('admin.promocode-table')
                </div>

                @include('admin.add-product')
                @include('admin.add-collection')
            </div>
        </div>
    </section>
@endsection
