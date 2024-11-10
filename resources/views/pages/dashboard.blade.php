@extends('layouts.dashboard')

@section('title','Dashboard')

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
                                Заказы
                            </li>
                            <li class="breadcrumb-item active">
                                Список заказов
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Список ваших заказов</h1>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Наименование путевки</td>
                                        <td>Длительность</td>
                                        <td>Общая стоимость</td>
                                        <td>Статус</td>
                                        <td>Действия</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($dashboard_list as $item)
                                        <tr>
                                            <td class="align-middle">{{ $item->id }}</td>
                                            <td class="align-middle">{{ $item->travel_package->title }}</td>
                                            <td class="align-middle">{{ $item->travel_package->duration }}</td>
                                            <td class="align-middle">{{ $item->transaction_total }}</td>
                                            <td class="align-middle">{{ $item->transaction_status_text }}</td>
                                            <td>
                                                <a href="{{ route('checkout-process', $item->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                У вас еще нет заказов
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Ваш аккаунт</h2>
                        <hr>
                        <table class="user-information">
                            <tr>
                                @if(empty(Auth::user()->avatar))
                                    <th rowspan="2"><img src="https://ui-avatars.com/api/?name={{ $details->name }}"
                                            height="60" class="rounded-circle"></th>
                                @else
                                    <th rowspan="2"><img
                                            src="{{ Storage::url('avatars/'.$id .'/' .$avatars) }}"
                                            class="rounded-circle mr-1" style="width: 80px" /></th>
                                @endif
                                <td width="50%" class="text-right">{{ $details->name }}</td>
                            </tr>
                            <tr>
                                <td width="50%" class="text-right">{{ $details->email }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="join-container">
                        <a href="{{ Route('user-edit',$id) }}"
                            class="btn btn-block btn-join-now mt-3 py-2">
                            Редактировать
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('/libraries/combined/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ asset('/libraries/combined/js/gijgo.min.js') }}"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            locale: 'ru-ru',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{ url('images/icon/ic_doe.png') }}" />'
            }
        })

    </script>
@endpush
