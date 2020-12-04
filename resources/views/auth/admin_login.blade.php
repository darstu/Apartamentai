@extends('layouts.adminapp')

@section('turinys')


    <h1 id="antraste2" >Administratoriaus prisijungimas</h1>
<div class="col-lg-8">
    <div class="container-fluid">

        <br>
        <form class="form log-card" style="alignment: center; width: 500px; padding-left: 20px; padding-bottom: 20px; padding-top: 20px; border-radius: 10%" method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-lg-2">El.paštas:</label>
                <div class="col-lg-8" style="padding-left: 50px">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: darkred">{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-lg-2">Slaptažodis: </label>
                <div class="col-lg-8" style="padding-left: 50px">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:darkred;">{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4"style="text-align: end">
                    {{--                                <button class="btn" id="mygtukas" type="submit">--}}

                    <button type="submit" id="mygtukas" class="btn btn-primary">
                       Prisijungti
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
