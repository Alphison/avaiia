@php use Illuminate\Support\Facades\Auth; @endphp
@extends('templates.page')

@section('title', 'Профиль пользователя')

@section('content')

    <section class="section user">
        <div class="container">
            <div class="section-content user-content">
                <div class="user-info">
                    <h2>{{__('profile.h1')}}</h2>
                    <p>{{ $user->name }} {{ $user->surname }}</p>
                    <hr>
                    <div class="user__item dflex col gap-2">
                        <p>{{__('profile.h5')}}</p>
                        <p><span class="material-symbols-outlined">mail</span>{{ $user->email }}</p>
                        <p><span class="material-symbols-outlined">celebration</span>{{ $user->birth_day }}</p>
                        <p><span class="material-symbols-outlined">call</span>{{ $user->phone }}</p>
                    </div>
                </div>
                <div class="user-orders">
                    <div class="table-header dflex justify-between align-center">
                        <h2>{{__('profile.h2')}}</h2>
                        {{--                        <a href="" class="underline"></a>--}}
                    </div>
                    @if($orders->count() > 0)

                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('profile.col')}}</th>
                                <th>{{__('profile.col2')}}</th>
{{--                                <th>Адрес доставки</th>--}}
                                <th>{{__('profile.col3')}}</th>
                                <th>{{__('profile.col4')}}</th>
                                <th>{{__('profile.col5')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>

                                    <td>{{ $order->id }}</td>
                                    <td>
                                        @if (__('main.current_lang') == 'RU')
                                            {{ $order->status->name }}
                                        @elseif(__('main.current_lang') == 'EN')
                                            {{ $order->status->text_en }}
                                        @endif
                                        
                                    </td>
{{--                                    <td>@if($order->address->count() != null) {{ $order->address->post_index }} @endif</td>--}}
{{--                                    <td>--}}

                                    </td>
                                    <td>{{ $order->products->count() }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->price }}</td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    @else
                        <p>{{__('profile.h3')}} <a href="{{ route('collections-page') }}"
                                                                              class="acent-color underline">{{__('profile.h4')}}</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
