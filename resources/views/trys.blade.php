@extends('layouts.app')

@section('turinys')
    <nav class="navbar navbar-inverse" style="background-color: #C8E7B5; border: 0px">
        <div class="container-fluid" style=" padding-left: 16%; text-align: left">
            <div class="row">
                <form method="POST" action="{{Route('sort', 3)}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <span class="input-field">
        <label class="col" style=" text-align: right">Rikiuoti pagal: </label>
        <select class="col" name="orderBy" id="orderBy"  class="form-control" style="width: 200px; border: 1px solid black; border-radius: 5px; display:inherit">
            <option value="">Naujausi</option>
            <option value="asc">Žema kaina</option>
            <option value="desc">Aukšta kaina</option>
        </select>

        <button class="col" type="submit" class="btn" id="green_btn" style="display: inherit; margin-top: 0px; border: 1px solid black; border-radius: 5px;">Rikiuoti</button>
                </span></form></div></div>
    </nav>
    <div id="result"></div>
    <script>
        var selectedItem = sessionStorage.getItem("SelectedItem");
        $('#orderBy').val(selectedItem);
        sessionStorage.removeItem("SelectedItem");
        $('#orderBy').change(function () {
            var idetVal = $(this).val();
            sessionStorage.setItem("SelectedItem", idetVal);

        });

    </script>
    <?php $count = 0 ?>
    @foreach($allitems as $item)
        @if($item->fk_prekes_kategorija == 3)
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
                                @if (Auth::guest())
                                    <div class="mygtukui"><a href="{{asset('login')}}">Peržiūrėti apartamentą</a></div>
                                @else
                                    <div class="mygtukui">Peržiūrėti apartamentą</div>
                                @endif
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
        <p style="text-align: center">Kolkas trijų kambarių apartamentų neturime</p>
    @endif
@endsection
