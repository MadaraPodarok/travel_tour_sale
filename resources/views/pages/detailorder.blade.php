@extends('layouts.app')

@section('title', 'Детали заказа')

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('user-dashboard')}}">Список заказов</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Детали заказа
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Детали заказа {{ $item->user->name }}</h1>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors ->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-responsive-sm ">
                            <tr>
                                <th>Наименование тура</th>
                                <td>{{ $item->travel_package->title }}</td>
                            </tr>
                            <tr>
                                <th>ФИО</th>
                                <td>{{ $item->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Местоположение</th>
                                <td>{{ $item->travel_package->location }}</td>
                            </tr>
                            <tr>
                                <th>Цена визы</th>
                                <td>{{ $item->additional_visa }}</td>
                            </tr>
                            <tr>
                                <th>Общая сумма путевки</th>
                                <td>{{ $item->transaction_total }}</td>
                            </tr>
                            <tr>
                                <th>Статус транзакции</th>
                                <td>{{ $item->status_text }}</td>
                            </tr>
                            <tr>
                                <th>Данные транзакции</th>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>ID</td>
                                            <th>Логин</th>
                                            <th>Виза</th>
                                            <th>Паспорт</th>
                                        </tr>
                                        @foreach ($item->details as $key => $detail)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $detail->username }}</td>
                                                <td>{{ $detail->is_visa ? '30 дней' : 'отсутствует' }}</td>
                                                <td>{{ $detail->passport }}</td>

                                            </tr>

                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


            </div>
        </section>
    </main>
    <!-- /.container-fluid -->
@endsection
