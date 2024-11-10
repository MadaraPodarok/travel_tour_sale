@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать транзакцию {{ $item->title }}</h1>
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
            <form action="{{ route('transaction.update',$item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="transaction_status">Status</label>
                    <select name="transaction_status" required class="form-control">
                        <option disabled>Выберите статус</option>
                        <option value="IN_CART" {{ $item->transaction_status === 0 ? 'selected' : '' }}>В корзине</option>
                        <option value="PENDING" {{ $item->transaction_status === 1 ? 'selected' : '' }}>В ожидании</option>
                        <option value="SUCCESS" {{ $item->transaction_status === 2 ? 'selected' : '' }}>Успех</option>
                        <option value="CANCEL" {{ $item->transaction_status === 3 ? 'selected' : '' }}>Отменен</option>
                        <option value="FAILED" {{ $item->transaction_status === 4 ? 'selected' : '' }}>Неуспешный</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Сохранить</button>

            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
@endsection
