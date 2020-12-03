@extends('layouts.adminapp')
@section('turinys')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">Redaguoti apartamentą</div>
                    <hr>
                    <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('confirmEditedProduct', $selectedProduct->id_preke) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Kambarių sk.</label>
                            <div class="col-md-6">
                                <select class="form-control" name="fk_prekes_kategorija">
                                    @foreach($allCat as $ct)
                                    @if($selectedProduct->fk_prekes_kategorija === $ct->id_kateg)
                                    <option value="{{$selectedProduct->fk_prekes_kategorija}}">{{$ct->pavadinimas}}</option>
                                    @endif
                                    @endforeach
                                    @foreach($allCat as $ct)
                                    @if($selectedProduct->fk_prekes_kategorija != $ct->id_kateg)
                                        <option value="{{$ct->id_kateg}}">{{$ct->pavadinimas}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Aprašymas</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="aprasymas" value="{{$selectedProduct->aprasymas}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Kaina</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kaina" value="{{ $selectedProduct->kaina }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Data</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="ikelimo_data" value="{{ $selectedProduct->ikelimo_data }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Adresas</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="adresas" value="{{ $selectedProduct->adresas }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4" style="margin-left: -35px">
                                <button type="submit" id="mygtukas"class="btn btn-primary">
                                   Išsaugoti
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
