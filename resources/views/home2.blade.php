<section class="text-center">


    @foreach($allitems as $item)
        <div class="container" style="max-height: 230px;">
            <div class="card item row" style="border: 1px solid black">
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
    @endforeach

</section>
