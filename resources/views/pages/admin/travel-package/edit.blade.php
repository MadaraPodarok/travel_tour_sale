@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать тур путевку {{ $item->title }}</h1>
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
            <form action="{{ route('travel-package.update',$item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" placeholder="Title"
                        value="{{ $item->title }}">
                </div>

                <div class="form-group">
                    <label for="location">Местоположение</label>
                    <input type="text" class="form-control" name="location" placeholder="Location"
                        value="{{ $item->location }}">
                </div>

                <div class="form-group">
                    <label for="about">Описание</label>
                    <textarea name="about" rows="10"
                        class="d-block w-100 form-control">{{ $item->about }}</textarea>
                </div>

                <div class="form-group">
                    <label for="featured_event">Избранное событие</label>
                    <input type="text" class="form-control" name="featured_event" placeholder="Featured Event"
                        value="{{ $item->featured_event }}">
                </div>

                <div class="form-group">
                    <label for="language">Язык</label>
                    <input type="text" class="form-control" name="language" placeholder="language"
                        value="{{ $item->language }}">
                </div>

                <div class="form-group">
                    <label for="foods">Еда</label>
                    <input type="text" class="form-control" name="foods" placeholder="Foods"
                        value="{{ $item->foods }}">
                </div>

                <div class="form-group">
                    <label for="departure_date">Дата отправления</label>
                    <input type="date" class="form-control" name="departure_date" placeholder="Departure Date"
                        value="{{ $item->departure_date }}">
                </div>

                <div class="form-group">
                    <label for="duration">Длительность</label>
                    <input type="text" class="form-control" name="duration" placeholder="Duration"
                        value="{{ $item->duration }}">
                </div>

                <div class="form-group">
                    <label for="type">Тип</label>
                    <input type="text" class="form-control" name="type" placeholder="Type"
                        value="{{ $item->type }}">
                </div>

                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="number" class="form-control" name="price" placeholder="price"
                        value="{{ $item->price }}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Сохранить</button>

            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
@endsection
