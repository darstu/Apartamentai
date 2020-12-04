@extends('layouts.nosearch')

@section('turinys')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card"style="padding-left: 15px">
                <div class="card-header" id="antraste" style="padding-left: 0">{{ __('Registracija') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" style="background-color: #ECE9C4; border: 1px solid black; border-radius: 10px; padding-top: 20px; padding-left: 20px; margin-right: 300px">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vardas') }}</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"required autocomplete="name" autofocus>


                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: darkred">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('El. paštas') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: darkred">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Slaptažodis') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="min 8" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: darkred">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Patvirtinkite slaptažodį') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="min 8" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" id="mygtukas"class="btn btn-primary">
                                    {{ __('Registruotis') }}
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
