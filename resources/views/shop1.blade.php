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
<br>
        <br>
        <div><button type="button"class="mygtukui" >Apmokėti</button></div>
    </div>
        <script>
            var child;
            var bu = document.getElementById("mygtukas2");
            function myPay() {
                child = window.open("pay", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=250,left=500,width=450, height=150");

                var id = setInterval(function () {
                    if (child.closed) {

                        clearInterval(id);
                        document.getElementById("mygtukas2").disabled = false;
                        document.getElementById("mygtukas1").disabled = true;
                    }
                }, 100);

            }

        </script>
    </div>
<div class="col" style="text-align: center">
{{--    <embed src="https://www.archifacile.net/editor" style="width:900px; height: 900px; border: 2px solid black;border-radius: 10%">--}}
{{--    <p>Puslapis: www.archifacile.net</p>--}}
        <embed src="https://gojs.net/latest/projects/floorplanner/FloorPlanner.html?fbclid=IwAR2TenQIPHT2i7acKicv3hrPhHm2gwYH1d0z0z0x2S0a6iqR-jWU9lz3bAc" style="width:900px; height: 900px; border: 2px solid black;border-radius: 10%; background-color: #C8E7B5">
        <p>Puslapis: https://gojs.net/latest/projects/floorplanner/FloorPlanner.html</p>
</div>
@endsection
