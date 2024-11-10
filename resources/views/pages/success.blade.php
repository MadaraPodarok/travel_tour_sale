@extends('layouts.success')

@section('title','Success')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{url('/images/icon/ic_mail.png')}}" alt="">
            <h1>Ура! Успех!</h1>
            <p>Мы отправили вам электронное письмо с инструкциями по поездке
                <br>
                пожалуйста, прочтите это также</p>
            <a href="{{url('/')}}" class="btn btn-home-page mt-3 px-5">Главная страница</a>
        </div>
    </div>
</main>
@endsection
