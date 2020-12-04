@extends('layouts.adminapp')

@section('turinys')

    <a href="{{action('AdminController@addCategory')}}" id="green_btn" class="btn btn-primary" style="width: 120px; margin-left: 20px; border: 1px solid black">
        Pridėti baldą</a>
    </br>
    @foreach($allbaldai as $baldas)
        <div class="col-md-3">
            <div class="card item" style="border: 1px solid black; text-align: center; height: 260px">
                <a href="{{ action('ShopController@getCategory', $baldas->id)}}" class="text-body">

                    <div style="text-align: center"><h6>Pavadinimas: {{ $baldas->pavadinimas }}</h6></div>

                    <div style="text-align: center"><h6> Apartamento ID: {{ $baldas->apartamento_id}}</h6></div>

{{--                    @foreach($photo as $ph)--}}
{{--                        @if ($baldas->nuotraukos_pav == $ph->pavadinimas)--}}
                            <img style="border-radius: 10px; border: 2px solid grey; height: 150px; width: 150px;" src="{{ asset('/images') . '/' . $baldas->nuotraukos_pav . '.jpg'}}"  alt="paveiksliukas {{$baldas->pavadinimas}}" >
{{--                            @break--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
                </a>
                <br>
                <div style="text-align: center; border: 1px solid black; margin-top: 10px; border-radius: 10px; background-color: #FBDCD9"><a href="{{route('adminRoutes.baldaiedit', $baldas->id)}}" >
                        Redaguoti</a></div>
                <div style="text-align: center; border: 1px solid black; border-radius: 10px; background-color: #FBDCD9"><a onclick="return confirm('Ar tikrai norite ištrinti {{ $baldas->apartamento_id}} apartameto baldą?')" href="{{ action('AdminController@deleteCategory', $baldas->id)}}" >
                        Ištrinti</a></div>
            </div>

        </div>
    @endforeach

@endsection
