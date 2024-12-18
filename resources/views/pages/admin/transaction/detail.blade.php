@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Детали транзакции {{ $item->user->name }}</h1>
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
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Название путевки</th>
                    <td>{{ $item->travel_package->title }}</td>
                </tr>
                <tr>
                    <th>Покупатель</th>
                    <td>{{ $item->user->name }}</td>
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
                    <th>Покупка</th>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Логин</th>
                                <th>Виза</th>
                                <th>Паспорт</th>
                            </tr>
                            @foreach ($item->details as $key => $detail)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $detail->username }}</td>
                                <td>{{ $detail->is_visa ? '30 дней' : 'Отсутствует' }}</td>
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
<!-- /.container-fluid -->
@endsection
