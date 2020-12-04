@extends('layouts.adminapp')
@section('turinys')
    <div class="container-fluid">
        <div class="justify-content-center">
            <div class="col-md-6">
                    <div class="card-header" id="antraste">Pridėti Apartamentą</div>

                    <div class="card-body" style="width: 550px">
                    <form class="form-horizontal log-card" style="alignment: center; max-width: 500px; padding-left: 20px; padding-bottom: 20px; padding-top: 20px; border-radius: 10%" role="form" method="POST" action="{{ url('manageProduct')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group row" >
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Kambarių sk.</label>
                            <div class="col-md-6">
                                <select class="form-control" name="fk_prekes_kategorija" >
                                    <option value="{{ old('fk_prekes_kategorija') }}"></option>
                                    @foreach($allCat as $ct)
                                        <option value="{{$ct->id_kateg}}">{{$ct->pavadinimas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Aprašymas</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="aprasymas" value="{{ old('aprasymas') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Kaina</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kaina" value="{{ old('kaina') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Data</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="ikelimo_data" value="{{ old('ikelimo_data') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Vieta</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="adresas" value="{{ old('adresas') }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4" style="margin-left: -35px">
                                <button type="submit" id="mygtukas"class="btn btn-primary">
                                    Pridėti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
        <div style="text-align: right;">
            <embed src="https://www.archifacile.net/editor" style="width:500px; height: 500px; border: 2px solid black;border-radius: 10%">
            <p>Puslapis: www.archifacile.net</p>
        </div>
    </div>
@endsection

