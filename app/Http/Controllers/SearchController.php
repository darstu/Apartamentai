<?php

namespace App\Http\Controllers;

use App\Kategorija;
use App\Uzsakymas;
use App\Nuotrauka;
use Illuminate\Http\Request;
use App\Preke;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate(['search' => 'required|min:2|max:100']);
        $allcategories = Kategorija::all();
        $search = $request->input('search');
        $search = preg_replace("#[^0-9a-z_\s]#i","",$search);
        $preke = Preke::where('pavadinimas', 'LIKE', '%'.$search.'%')
            ->orWhere('aprasymas', 'LIKE', '%'.$search.'%')
            ->paginate(5);
        return view('searchrez',compact('allcategories'))->with('preke', $preke);
    }

    public function searchproduct(Request $request)
    {
        $allcategory = Kategorija::all();
        $request->validate(['search' => 'required|min:2|max:100']);
        $search = $request->input('search');
        $search = preg_replace("#[^0-9a-z_\s]#i","",$search);
            $preke = Preke::where('pavadinimas', 'LIKE', '%'.$search.'%')
                ->orWhere('aprasymas', 'LIKE', '%'.$search.'%')
                ->paginate(5);
            return view('searchproduct', compact('allcategory'))->with('preke', $preke);
    }

    public function searchorders(Request $request)
    {
        $request->validate(['search' => 'required|max:11']);
        $search = $request->input('search');
        $search = preg_replace("#[^0-9]#","",$search);
        $asUZ = Uzsakymas::where('id_uzsakymas', $search)->first();
        return view('searchorder')->with('asUZ', $asUZ);
    }

    public function kaina(Request $request)
    {
        $request->validate(['kaina1' => 'required|min:1|max:10']);
        $request->validate(['kaina2' => 'required|min:1|max:10']);
        $request->validate(['miestas' => 'required|min:1|max:100']);
        $allitems = Preke::all();
        $photo=Nuotrauka::all();
        $kaina1 = $request->input('kaina1');
        $kaina2 = $request->input('kaina2');
        $miestas = $request->input('miestas');
        $miestas = preg_replace("#[^0-9a-z_\s]#i","",$miestas);
        $preke = Preke::where('kaina', 'BETWEEN', '%'.$kaina1.'%', 'AND', '%'.$kaina2.'%')
            ->orWhere('adresas', 'LIKE', '%'.$miestas.'%')
            ->paginate(5);
        return view('kainarez',compact('allitems', 'photo'))->with('preke', $preke);
    }
}
