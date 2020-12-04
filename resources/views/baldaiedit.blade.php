@extends('layouts.adminapp')
@section('turinys')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">Redaguoti baldą</div>

                    <div class="card-body">
                        <form class="form-horizontal log-card" style="alignment: center; max-width: 500px; padding-left: 20px; padding-bottom: 20px; padding-top: 20px; border-radius: 10%" role="form" method="POST" action="{{ url('confirmEditedBaldai', $selectedBaldas->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Baldo pavadinimas</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="pavadinimas" value="{{ $selectedBaldas->pavadinimas }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Nuotraukos pavadinimas</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nuotraukos_pav" value="{{ $selectedBaldas->nuotraukos_pav }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Apartamento ID</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="apartamento_id" value="{{ $selectedBaldas->apartamento_id }}">
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
