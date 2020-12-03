@extends('layouts.nosearch')
@section('turinys')


    <div class="col-lg-3">
        <div class="soniniam">
            <b>Kambariai:</b>
        </div>
        <div class="soniniam">
            <a href="">Kambarys 1</a>
        </div>
        <div class="soniniam">
            <a href="">Kambarys 2</a>
        </div>
        <div class="soniniam">
            <a href="">Kambarys 3</a>
        </div>
        <div class="mygtukui" style="margin-top: 20px">Apmokėti</div>
    </div>
<h3 style="font-weight: bold;">Kambarys 1:</h3>
<div class="col" style="text-align: center">
{{--    <embed src="https://www.archifacile.net/editor" style="width:900px; height: 900px; border: 2px solid black;border-radius: 10%">--}}
{{--    <p>Puslapis: www.archifacile.net</p>--}}
        <embed src="https://gojs.net/latest/projects/floorplanner/FloorPlanner.html?fbclid=IwAR2TenQIPHT2i7acKicv3hrPhHm2gwYH1d0z0z0x2S0a6iqR-jWU9lz3bAc" style="width:1200px; height: 1200px; border: 2px solid black;border-radius: 10%">
        <p>Puslapis: https://gojs.net/latest/projects/floorplanner/FloorPlanner.html</p>
</div>
@endsection
