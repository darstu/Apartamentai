@extends('layouts.nosearch')

@section('turinys')

<div class="container">
    <div class="row justify-content-center">
        <h1 id="antraste" >Atstatyti slaptažodį</h1>
        <div class="col-lg-8 col-md-8 col-sm-8">
            <hr>
            <div class="card">
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" style="background-color: #ECE9C4; border: 1px solid black; border-radius: 10px; padding-top: 20px; padding-left: 20px; margin-right: 300px">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('El. Paštas') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="mygtukas">
                                    {{ __('Siųsti slaptažodžio atkūrimą') }}
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
