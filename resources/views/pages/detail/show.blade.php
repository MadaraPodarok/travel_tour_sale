@extends('layouts.app')

@section('title','Детали Тур путевок')

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
                                <a href="{{route('detail_list')}}">Туристические путевки</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Данные путевки
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $item->title }}</h1>
                        <p>
                            {{ $item->location }}
                        </p>
                        @if($item->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-thumbs">
                                    @foreach($item->galleries as $gallery)

                                        <a href="{{ Storage::url($gallery->image) }}">
                                            <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery"
                                                width="128" xpreview="{{ Storage::url($gallery->image) }}" alt="">
                                        </a>

                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <h2>О туризме</h2>
                        <p>
                            {!! $item->about !!}
                        </p>

                        <div class="features row">
                            <div class="col-md-4">
                                <img src="{{ url('images/icon/ic_event.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Рекомендуемое событие</h3>
                                    <p>{{$item->featured_event}}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="{{ url('images/icon/ic_language.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Язык</h3>
                                    <p>{{$item->language}}</p>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <img src="{{ url('images/icon/ic_foods.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Продукты питания</h3>
                                    <p>{{$item->foods}}</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Участники собираются</h2>
                        <div class="members my-2">
                            <img src="/images/members/Mask Group 3.png" class="member-image mr-1" />
                            <img src="/images/members/Mask Group 4.png" class="member-image mr-1" />
                            <img src="/images/members/Mask Group 5.png" class="member-image mr-1" />
                            <img src="/images/members/Mask Group 6.png" class="member-image mr-1" />
                            <img src="/images/members/Group 6.png" class="member-image mr-1" />
                        </div>
                        <hr>
                        <h2>Информация о поездке</h2>
                        <table class="trip-information">
                            <tr>
                                <th width="50%">Дата отъезда</th>
                                <td width="50%" class="text-right">{{\Carbon\Carbon::create($item->date_of_departure)->format('F n, Y')}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Длительность тура</th>
                                <td width="50%" class="text-right">{{$item->duration}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Цена</th>
                                <td width="50%" class="text-right">{{$item->price}},00 / Человек</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        @auth
                            <form action="{{route('checkout-process', $item->id)}}" method="post">
                                @csrf
                                <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                    Присоединяйтесь сейчас
                                </button>
                            </form>
                        @endauth
                        @guest
                        <a href="{{ route('login') }}"
                            class="btn btn-block btn-join-now mt-3 py-2">
                            Войдите или зарегистрируйтесь, чтобы присоединиться
                         </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
    <script src="{{ asset('libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                xoffset: 15
            });
        });

    </script>
@endpush
