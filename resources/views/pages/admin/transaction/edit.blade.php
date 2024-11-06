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
                        <option value="{{ $item->transaction_status }}">
                            Не меняй? ({{ $item->transaction_status }})
                        </option>
                        <option value="IN_CART">В корзине</option>
                        <option value="PENDING">В ожидании</option>
                        <option value="SUCCESS">Успех?</option>
                        <option value="CANCEL">Отменен</option>
                        <option value="FAILED">Неуспешный</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Сохранить</button>

            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
@endsection
