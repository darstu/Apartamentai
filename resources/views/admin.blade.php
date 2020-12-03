@extends('layouts.adminapp')

@section('turinys')

    <a href="{{action('AdminController@addCategory')}}" id="green_btn" class="btn btn-primary" style="width: 120px; margin-left: 20px; border: 1px solid black">
        Pridėti baldą</a>
    </br>
    @foreach($allbaldai as $category)
        <div class="col-md-3">
            <div class="card item" style="border: 1px solid black; text-align: center; height: 300px">
                <a href="{{ action('ShopController@getCategory', $category->id)}}" class="text-body">

                    <div style="text-align: center"><h3>Pavadinimas: {{ $category->pavadinimas }}</h3></div>

                    <div style="text-align: center"><h3> Apartamento ID: {{ $category->apartamento_id}}</h3></div>

                    @foreach($photo as $ph)
                        @if ($category->nuotraukos_pav == $ph->pavadinimas)
                            <img style="border-radius: 10px; border: 2px solid grey; height: 150px; width: 150px;" src="{{ asset('/images') . '/' . $ph->pavadinimas . '.jpg'}}"  alt="paveiksliukas {{$ph->pavadinimas}}" >
                            @break
                        @endif
                    @endforeach
                </a>
            </div>
        </div>
    @endforeach

@endsection
