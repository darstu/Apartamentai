@extends('layouts.app')

@section('turinys')
    <?php $count = 0 ?>
    @foreach($allitems as $item)
        @if($item->fk_prekes_kategorija == 1)
        <div class="container" style="max-height: 230px;">
            <div class="card item row">
                <div class="img-wrap col-sm-4" style="height: 200px; max-width: 200px">
                    @foreach($photo as $ph)
                        @if ($item->id_preke == $ph->fk_preke)
                            <img style="border-radius: 10px; border: 2px solid grey; height: 150px; width: 150px;" src="{{ asset('/images') . '/' . $ph->pavadinimas . '.jpg'}}"  alt="paveiksliukas {{$ph->pavadinimas}}" >
                            @break
                        @endif
                    @endforeach
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="img-wrap col-sm-4" style="padding-top: 2%; max-height: 100px">
                            <p>Kaina: {{$item->kaina}}/mėn</p>
                            <p>Vieta: {{$item->adresas}}</p>
                        </div>
                        <div class="img-wrap col-sm-4" style="padding-top: 2%; max-height: 100px">
                            <p>Kambarių sk.: {{$item->fk_prekes_kategorija}}</p>
                            <p>Įkelta: {{$item->ikelimo_data}}</p>
                        </div>
                        <div class="img-wrap col-sm-3" style="padding-top: 2%; max-height: 100px; width: 200px">
                            <div class="mygtukas">Peržiūrėti apartamentą</div>
                        </div>
                    </div>
                    <div class="img-wrap row" style="max-height: 100px">
                        <p>Aprašymas:</p>
                        <p>{{$item->aprasymas}}</p>
                    </div>
                </div>
            </div>
        </div>
        <?php $count = $count + 1; ?>
        @endif
    @endforeach
    @if($count == 0)
        <p style="text-align: center">Kolkas vieno kambario apartamentų neturime</p>
    @endif
@endsection
