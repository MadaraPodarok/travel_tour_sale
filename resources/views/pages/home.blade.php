@extends('layouts.app')

@section('title')
Тут что?
@endsection


@section('content')
<!-- header -->
<header class="text-center">
    <h1>
        Исследуйте прекрасный мир
        <br>
        Как легко в один клик
    </h1>
    <p class="mt-3">
        Вы увидите красивое
        <br>
        момент, которого ты никогда раньше не видел
    </p>
    <a href="#popular" class="btn btn-get-started px-4 mt-4">
        Начать
    </a>
</header>

<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>20K</h2>
                <p>людей</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <p>стран</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3K</h2>
                <p>гостиниц</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>72</h2>
                <p>партнеров</p>
            </div>

        </section>
    </div>

    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Популярные путешествия</h2>
                    <p>
                        То, что ты никогда не попробуешь
                        <br>
                        раньше в этом мире
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-content" id="popular-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                @foreach($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column"
                            style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                            <div class="travel-country">{{ $item->location }}</div>
                            <div class="travel-location">{{ $item->title }}</div>
                            <div class="travel-button mt-auto">
                                <a href="{{ route('detail', $item->slug) }}"
                                    class="btn btn-travel-details px-4">Посмотреть детали</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-network" id="network">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Наши сети</h2>
                    <p>
                        Нам доверяют компании
                        <br>
                        больше, чем просто поездка
                    </p>
                </div>
                <div class="col-md-8 text-center">
                    <img src="frontend/images/partner/Group 7.png" alt="Логотип партнера" class="img-partner">
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-heading" id="testimonialHeading">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Они любят нас</h2>
                    <p>
                        Моменты давали им
                        <br>
                        лучший опыт
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-testimonial-content" id="testimonialContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testimonial/user_pic1.png" alt="user" class="mb-4 rounded-circle">
                            <h3 class="mb-4"> Ангга Ризки </h3>
                            <p class="testimonial">
                                “ Это было великолепно, и я мог
                                не переставай говорить «ууууу»
                                каждый момент
                                Данкеееее “
                            </p>
                        </div>
                        <hr />
                        <p class="trip-to mt-2">
                            Поездка в Убуд
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testimonial/user_pic2.png" alt="user" class="mb-4 rounded-circle">
                            <h3 class="mb-4"> Риана </h3>
                            <p class="testimonial">
                                “ Поездка была потрясающей и
                                Я увидел что-то прекрасное в
                                тот остров, который делает меня
                                хочу узнать больше “
                            </p>
                        </div>
                        <hr />
                        <p class="trip-to mt-2">
                            Поездка на Нуса Пениду
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testimonial/user_pic3.png" alt="user" class="mb-4 rounded-circle">
                            <h3 class="mb-4"> Сабина </h3>
                            <p class="testimonial">
                                “ Мне нравилось, когда волны
                                меня трясло сильнее — я был
                                тоже напуган “
                            </p>
                        </div>
                        <hr />
                        <p class="trip-to mt-2">
                            Поездка на Каримун Яву
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-help px-4 mt-4 mx-1">
                        Мне нужна помощь
                    </a>
                    <a href=" {{ route('register') }} " class="btn btn-get-started px-4 mt-4 mx-1">
                        Начать
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
