@extends('layouts.app')

@section('title', 'Детали Тур Путевок')

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
                                    Туристические путевки
                                </li>
                                <li class="breadcrumb-item active">
                                    Список тур путевок
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <!-- Теперь перебираем все туры -->
                    @foreach($items as $item)
                        <div class="col-lg-4">
                            <div class="card card-details">
                                <h1>{{ $item->title }}</h1>
                                <p>{{ $item->location }}</p>

                                @if($item->galleries->count())
                                    <div class="gallery">
                                        <div class="xzoom-thumbs">
                                            @foreach($item->galleries as $gallery)
                                                <a>
                                                    <img src="{{ Storage::url($item->galleries->first()->image) }}"
                                                         class="xzoom-img" id="xzoom-default"
                                                         xoriginal="{{ Storage::url($item->galleries->first()->image) }}"
                                                         alt="">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <h2>О туризме</h2>
                                <div class="detail-about">
                                    <p class="about-truncate">{!! $item->about !!}</p>
                                </div>

                                <!-- Информация о поездке -->
                                <h2>Информация о поездке</h2>
                                <table class="trip-information">
                                    <tr>
                                        <th width="50%">Дата отъезда</th>
                                        <td width="50%"
                                            class="text-right">{{ \Carbon\Carbon::create($item->date_of_departure)->format('F n, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Длительность тура</th>
                                        <td width="50%" class="text-right">{{ $item->duration }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Цена</th>
                                        <td width="50%" class="text-right">{{ $item->price }},00 / Человек</td>
                                    </tr>
                                </table>


                                <div class="detail-description">
                                    <a href="{{ route('detail_show', $item->slug) }}" class="btn btn-block btn-join-now mt-3 py-2">Подробное описание</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
