@extends('layouts.checkout')

@section('title','Checkout')

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
                                <a href="{{ route('detail_show', $item->travel_package->slug) }}" class="nav-link">
                                    {{$item->travel_package->title}}
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('detail_list')}}" class="nav-link">Туристические путевки</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a>Данные платежа</a>
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
                        <h1>Оплата путевки</h1>
                        <p>
                            Поездка в {{ $item->travel_package->title }}, {{ $item->travel_package->location }}
                        </p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Фото</td>
                                        <td>Логин</td>
                                        <td>Виза</td>
                                        <td>Паспорт</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($item->details as $detail)
                                        <tr>
                                            <td><img src="https://ui-avatars.com/api/?name={{ $detail->username }}"
                                                    height="60" class="rounded-circle"></td>
                                            <td class="align-middle">{{ $detail->username }}</td>
                                            <td class="align-middle">
                                                {{ $detail->is_visa ? '30 дней' : 'Отсутствует' }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $detail->passport }}
                                            </td>
                                            <td class="align-middle">
                                                <a
                                                    href="{{ route('checkout-remove', $detail->id) }}">
                                                    <img src="{{ url('/images/icon/ic_remove.png') }}"
                                                        alt="">
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                Нет участников
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="member mt-3">
                            <h2>Добавить участника</h2>
                            <form class="form-inline" method="post" action="{{route('checkout-create',$item->id)}}">
                                @csrf
                                <label for="username" class="sr-only">Имя</label>
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control mb-2 mr-sm-2"
                                    id="username"
                                    required
                                    placeholder="Логин"
                                />

                                <label for="is_visa" class="sr-only">Виза</label>
                                <select name="is_visa" id="is_visa" required class="custom-select mb-2 mr-sm-2">
                                    <option value="1">30 дней</option>
                                    <option value="0">Отсутствует</option>
                                </select>

                                <label for="passport" class="sr-only">Паспорт</label>
                                <input
                                    type="text"
                                    name="passport"
                                    class="form-control mb-2 mr-sm-2"
                                    id="passport"
                                    required
                                    placeholder="Паспорт"
                                />

                                <button type="submit" class="btn btn-add-now mb-2 px-4">Добавить</button>
                            </form>

                            <h3 class="mt-2 mb-0">Примечание</h3>
                            <p class="disclaimer mb-0">
                                Вы можете пригласить только зарегистрированного участника Тур путевок.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Информация о кассе</h2>
                        <table class="trip-information">
                            <tr>
                                <th width="50%">Участники</th>
                                <td width="50%" class="text-right">{{ $item->details->count() }} Человек</td>
                            </tr>
                            <tr>
                                <th width="50%">Цена визы</th>
                                <td width="50%" class="text-right">$ {{ $item->additional_visa }},00</td>
                            </tr>
                            <tr>
                                <th width="50%">Цена поездки</th>
                                <td width="50%" class="text-right">$ {{ $item->travel_package->price }},00/Человек
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Общая сумма путевки</th>
                                <td width="50%" class="text-right">$ {{ $item->transaction_total }},00</td>
                            </tr>
                            <tr>
                                <th width="50%">Общая сумма путевки???</th>
                                <td width="50%" class="text-right">
                                    <span class="text-blue">$ {{ $item->transaction_total }},</span>
                                    <span class="text-orange">{{ mt_rand(0,99) }}</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h2>Платежная инструкция</h2>
                        <p class="payment-instruction">
                            Пожалуйста, завершите оплату,
                            прежде чем продолжить чудесное путешествие
                        </p>
                        <div class="bank">
{{--                            <div class="bank-item pb-3">--}}
{{--                                <img src="{{ url('/images/icon/ic_bank.png') }}"--}}
{{--                                    alt="" class="bank-image">--}}
{{--                                <div class="description">--}}
{{--                                    <h3>ID чего??</h3>--}}
{{--                                    <p>--}}
{{--                                        0881 8829 8800 ЧТО ЗА НОМЕР?? КАРТА?--}}
{{--                                        <br>--}}
{{--                                        Bank Central Asia - ЭТО ЧТО?--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </div>--}}
{{--                            <div class="bank-item pb-3">--}}
{{--                                <img src="{{ url('/images/icon/ic_bank.png') }}"--}}
{{--                                    alt="" class="bank-image">--}}
{{--                                <div class="description">--}}
{{--                                    <h3>ID чего?? 2</h3>--}}
{{--                                    <p>--}}
{{--                                        0881 8829 8800  ЧТО ЗА НОМЕР?? КАРТА? 2--}}
{{--                                        <br>--}}
{{--                                        Bank Central Asia - ЭТО ЧТО? 2--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <div class="join-container">
                        <a href="{{ route('checkout-success',$item->id) }}"
                            class="btn btn-block btn-join-now mt-3 py-2">
                            Оплатить
                        </a>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('detail_show',$item->travel_package->slug) }}" class="text-muted">Отменить бронирование</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
    <link rel="stylesheet"
        href="{{ url('/libraries/combined/css/gijgo.min.css') }}">
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
