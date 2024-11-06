@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Туристические путевки</h1>
        <a href="{{ route('travel-package.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50">Добавить тур путевку</i>
        </a>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Заголовок</th>
                            <th>Местоположение</th>
                            <th>Тип</th>
                            <th>Дата отправления</th>
                            <th>Тип</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <th>{{ $item->title }}</th>
                                <th>{{ $item->location }}</th>
                                <th>{{ $item->type }}</th>
                                <th>{{ $item->departure_date }}</th>
                                <th>{{ $item->type }}</th>
                                <td>
                                    <a href="{{ route('travel-package.edit', $item->id) }}"
                                        class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form
                                        action="{{ route('travel-package.destroy', $item->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Таблица пустая
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->
@endsection
