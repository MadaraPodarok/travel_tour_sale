@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Редактирование пользователя') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user-update',$item->id) }}" enctype="multipart/form-data">
                        @method('post')
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ФИО') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$item->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passport" class="col-md-4 col-form-label text-md-right">{{ __('Паспорт') }}</label>

                            <div class="col-md-6">
                                <input id="passport" type="text" class="form-control @error('passport') is-invalid @enderror" name="passport" value="{{ old('passport',$item->passport) }}" required autocomplete="passport" autofocus>

                                @error('passport')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_visa" class="col-md-4 col-form-label text-md-right">{{ __('Есть виза?') }}</label>

                            <div class="col-md-6">
                                <select id="is_visa" name="is_visa" class="form-control @error('is_visa') is-invalid @enderror" required>
                                    <option value="">Выберите</option>
                                    <option value="1" {{ old('is_visa', $item->is_visa) == 1 ? 'selected' : '' }}>Да</option>
                                    <option value="0" {{ old('is_visa', $item->is_visa) == 0 ? 'selected' : '' }}>Нет</option>
                                </select>

                                @error('is_visa')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email' ,$item->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Аватар (optional)') }}</label>

                            <div class="col-md-6">
                                {{-- Отображение текущего аватара, если он существует --}}
                                @if($item->avatar)
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/avatars/' . $item->id . '/' . $item->avatar) }}" alt="Current Avatar" class="img-thumbnail" width="100">
                                    </div>
                                @endif
                                 <input type="file" class="form-control" name="avatar" id="avatar">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Сохранить') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
