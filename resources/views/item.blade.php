@extends('layouts.nosearch')
<link href="{{ asset('css/rating.css') }}" rel="stylesheet">

@section('turinys')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/xzoom/dist/xzoom.css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>

<div class="col-lg-2 image_list">
    @foreach($allphotos as $photo)
    <div class=" list-unstyled components ">
        <img class="img-responsive" id="zoom" style="" src="../images/{{$photo->pavadinimas}}.jpg"
            alt="paveiksliukas {{$photo->pavadinimas}}">
    </div>
    @endforeach
</div>
<div class="col-lg-5 images">
    <div><img class="img-responsive" src="../images/{{$mainphoto->pavadinimas}}.jpg" }
            alt="paveiksliukas {{$mainphoto->pavadinimas}}"></div>

</div>
<!-- Description -->
<div class="col-lg-4">
    <div class="log-card" style="border-radius: 10%; padding-left: 10px">
        <div class="product_text">Kambarių skaičius: {{$categoryname->id_kateg}}</div>
        <div class="product_text">
            <p>Aprašymas: {{$item->aprasymas}}</p>
        </div>
        <div class="product_measure ">
            <h3><span id="product_text">Vieta</span> {{$item->adresas}}</h3>
        </div>
        <div class="order_info d-flex flex-row">
            <form method="POST" action="{{ Route('insertPreke') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="clearfix">
                    <div>
                        <input style="visibility: hidden" type="number" id="kiekis" name="kiekis" min="1" max="10"
                            value="1">
                    </div>

                    <select name="preke" style="visibility: hidden">
                        <option value="{{$item->id_preke}}">
                        </option>
                    </select>
                </div>
                <div class="product_price" style="min-height: 90px">{{$item->kaina}} Eur &nbsp
                    <a href="{{action('ShopController@index', $item->id_preke)}}" class="text-body">
                        <div style="border: 1px solid black;" class="btn btn-primary pull-right" id="green_btn">
                            Rezervuoti</div>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<div align="center" style="margin-bottom: 0px; padding-top: 20px">
    <form style="margin-right: 30%; margin-left: 30%" class="rating" method="POST"
        action="{{ Route('insertPrekeVertinimas', $item->id_preke) }}">
        <div class="product_name">Įvertinimas:
            @if($item->Ivertinimu_sk!=0){{round($item->ivertinimas/$item->Ivertinimu_sk, 2)}}
            @else 0
            @endif
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div style="margin-left: 7px" class="input-group">
            <label>
                <input type="radio" name="stars" value="1" />
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="stars" value="2" />
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="stars" value="3" />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="stars" value="4" />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="stars" value="5" />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
        </div>

        <div>
            <button type="submit" style="border: 1px solid black;" class="btn btn-primary"
                id="green_btn">Įvertinkite</button>
        </div>
    </form>
    <br>
</div>
<br>
<br>
<br>
<br>


<div style="text-align: center;"><iframe
        src="https://www.google.com/maps/d/u/5/embed?mid=1txK--GwSh2kt20Zh9MYp7KJmk8jeyQWl" width="640" height="480"
        style="text-align: center;"></iframe></div>

<div style="margin-top: 20px;" align="center">
    <form method="POST" action="{{ Route('insertKomentaras', $item->id_preke) }}" class="comment_form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input style="border: 1px solid black;" type="text" class="form-control comment" name="vart_vardas" value=""
            placeholder="Vardas">
        <textarea style="border: 1px solid black;" name="tekstas" type="text" class="form-control comment"
            required="required" placeholder="Rašyti komentarą"></textarea>
        <br>
        <button type="submit" style="border: 1px solid black;" class="btn btn-primary"
            id="green_btn">Komentaras</button>
    </form>
</div>
<hr>
</div>
@foreach($comments as$cm)
@if($cm->vart_vardas!=null)
<div align="center">
    <table class="table comments">
        <thead>
            <tr>
                <th scope="col">{{$cm->vart_vardas}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$cm->tekstas}}</td>
            </tr>
        </tbody>
    </table>

</div>
@endif
@endforeach

@endsection
