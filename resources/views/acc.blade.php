@extends('layouts.nosearch')

@section('turinys')
    <h1 id="antraste" >Profilis</h1>

    <br>

                <div class="col-lg-10" style="align-content: center">
                    <form class="form log-card" style="alignment: center; max-width: 600px; padding-left: 20px; padding-bottom: 20px; padding-top: 20px; border-radius: 10%" method="POST" action="{{ Route('confirmEditAcc',  Auth::user()->id)}}" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <div  class="container-fluid">
                             <div class="form-group row">
                                 <label for="email" class="col-lg-2 control-label">Jūsų el. paštas:</label>
                                 <div class="col-lg-8">
                                     <input  id="email" class="form-control" type="email"  name="email" value="{{$user->email}}" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="name" class="col-lg-2 control-label">Vardas:</label>
                                 <div class="col-lg-8">
                                     <input id="name" class="form-control" type="text" name="name" value="{{$user->name}}" required>
                                 </div>
                             </div>
                             <br>
                             <h4>Pakeisti slaptažodį</h4>
                             <hr>
                             <div class="form-group row">
                                 <label for="password" class="col-lg-2 control-label">Naujas slaptažodis</label>
                                 <div class="col-lg-8">
                                     <input id="password" type="password" class="form-control" name="password"  min="8">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="password-confirm" class="col-lg-2 control-label">Patvirtinkite slaptažodį</label>
                                 <div class="col-lg-8">
                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" min="8" >
                                 </div>

                             </div>

                             <div class="col-lg-8 ">
                        <button class="btn" id="mygtukas" style="border:1px solid black" type="submit"><a style="color: black; " >Išsaugoti</a></button>
                             </div>

                    </div>
                    </form>
                </div>

@endsection
