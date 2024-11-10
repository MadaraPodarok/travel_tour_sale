@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container">

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
            <table class="table table-responsive-sm ">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Туристические путевки</th>
                    <td>{{ $item->travel_package->title }}</td>
                </tr>
                <tr>
                    <th>Покупатель</th>
                    <td>{{ $item->user->name }}</td>
                </tr>
                <tr>
                    <th>Дополнительная виза</th>
                    <td>{{ $item->additional_visa }}</td>
                </tr>
                <tr>
                    <th>Всего транзакций</th>
                    <td>{{ $item->transaction_total }}</td>
                </tr>
                <tr>
                    <th>Статус транзакции</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>
                <tr>
                    <th>Покупка</th>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>ФИО</th>
                                <th>Виза</th>
                                <th>Паспорт</th>
                            </tr>
                            @foreach ($item->details as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->name }}</td>
                                <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
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
