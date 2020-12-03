@extends('layouts.nosearch')

@section('turinys')
    <h1 id="antraste2" style="text-align: center">Prisijungimas</h1>
        <div class="col-lg-10" style="alignment: center; max-width: 850px; margin-left: 80px">
            <div class="log-card" style="padding-bottom: 20px; margin-left: 40%; border-radius: 10%">
            <div class="container-fluid" style="text-align: center">
                <br>
                    <form class="form" style="width: 450px" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <label for="email" class="col-lg-3" style="text-align: right; padding-right: 25px" >El. paštas</label>
                            <div class="col-lg-3 col-md-3">
                                <input id="email" type="email" style="min-width: 250px" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="padding-top: 20px">
                            <label for="password" class="col-lg-3" style="text-align: right">{{ __('Slaptažodis') }}</label>
                            <div class="col-lg-3">
                                <input id="password" type="password" style="min-width: 250px" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="col-lg-8" style="text-align: left;">
                                    <div style="margin-left: 100px">
                                        <a class="btn btn-link"  href="{{asset('register')}}">Neturite anketos? <span id="register">Registruokitės čia!  </span></a>
                                    </div>
                                     <div   style="margin-left: 100px">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Pamiršote slaptažodį?') }}
                                        </a>
                                    @endif
                                     </div>
                            </div>

                        <div class="col-lg-6"  style="margin-left: 115px">
                            <div style="text-align: left;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Prisiminti mane') }}
                                    </label>
                                </div>
{{--                                <button class="btn" id="mygtukas" type="submit">--}}

                                <button type="submit" id="mygtukas" class="btn btn-primary" style="margin-left: 50px">
                                    {{ __('Prisijungti') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
