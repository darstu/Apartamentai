<?php

namespace App\Http\Controllers;

use App\Kategorija;
use App\Komentaras;
use App\Nuotrauka;
use App\Preke;
use App\PrekeKrepselis;
use App\User;
use App\Baldai;
use App\Uzsakymas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Apmokejimas;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $allbaldai = Baldai::all();
        $photo = Nuotrauka::all();
        return view('admin', compact('allbaldai', 'photo'));
    }
    public function users()
    {
        $allNaud = User::all();
        $allNaud = User::paginate(10);
        return view('users', compact('allNaud'));
    }
    public function product()
    {
        $allcategory = Kategorija::all();
        $allPro = Preke::all();
        $allPro = Preke::paginate(5);
        return view('product', compact('allPro', 'allcategory'));
    }
    public function orders()
    {
        $allUz = Uzsakymas::orderByDesc('data')->paginate(10);
        $links = $allUz->appends(['sort' => 'data'])->links();


        return view('orders', compact('allUz', 'links'));
    }
    public function confirmEditedUser(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email')

            ],
            [
                'name' => 'required',
                'email' => 'required|max:30'
            ]
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = User::where('id', '=', $id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        }
        return Redirect::to('/users')->with('success', 'Naudotojas sėkmingai redaguotas');
    }

    public function editUser($id)
    {
        $selectedUser = User::where('id', '=', $id)->first();
        return view('useredit', compact('selectedUser'));
    }
    public function deleteUser($id)
    {
        $uzsak = Uzsakymas::where('fk_id_Klientas', '=', $id)->get();
        foreach ($uzsak as $uz) {
            $apmok = Apmokejimas::where('fk_Uzsakymas', '=', $uz->id_Uzsakymas)->get();
            foreach ($apmok as $ap) {
                Apmokejimas::where('id_apmokėjimas', '=', $ap->id_apmokėjimas)->delete();
            }
            Uzsakymas::where('id_uzsakymas', '=', $uz->id_uzsakymas)->delete();
        }
        User::where('id', '=', $id)->delete();
        return Redirect::to('/users')->with('Naudotojas ištrintas');
    }
    public function signout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    //produktai

    public function confirmEditedProduct(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'aprasymas' => $request->input('aprasymas'),
                'kaina' => $request->input('kaina'),
                'ikelimo_data' => $request->input('ikelimo_data'),
                'adresas' => $request->input('adresas'),
                'fk_prekes_kategorija' => $request->input('fk_prekes_kategorija')

            ],
            [
                'aprasymas' => 'required',
                'kaina' => 'required',
                'ikelimo_data' => 'required',
                'adresas' => 'required',
                'fk_prekes_kategorija' => 'required'
            ]
        );


        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = Preke::where('id_preke', '=', $id)->update(
                [
                    'aprasymas' => $request->input('aprasymas'),
                    'kaina' => $request->input('kaina'),
                    'ikelimo_data' => $request->input('ikelimo_data'),
                    'adresas' => $request->input('adresas'),
                    'fk_prekes_kategorija' => $request->input('fk_prekes_kategorija')
                ]
            );
        }
        return Redirect::to('/product')->with('success', 'Apartamentas sėkmingai redaguotas');
    }

    public function editProduct($id)
    {
        $selectedProduct = Preke::where('id_preke', '=', $id)
            ->select('preke.*')
            ->first();

        $allCat = Kategorija::all();
        return view('productedit', compact('selectedProduct', 'allCat'));
    }
    public function deleteProduct($id)
    {
        $koment = Komentaras::where('fk_preke', '=', $id)->get();
        foreach ($koment as $kom) {
            Komentaras::where('id_komentaras', '=', $kom->id_komentaras)->delete();
        }
        $nuot = Nuotrauka::where('fk_preke', '=', $id)->get();
        foreach ($nuot as $nuo) {
            Nuotrauka::where('id_nuotrauka', '=', $nuo->id_nuotrauka)->delete();
        }
        $prekkrep = PrekeKrepselis::where('fk_preke', '=', $id)->get();
        foreach ($prekkrep as $pk) {
            PrekeKrepselis::where('id_Tarpine', '=', $pk->id_Tarpine)->delete();
        }
        Preke::where('id_preke', '=', $id)->delete();
        return Redirect::to('/product')->with('Apartamentas ištrintas');
    }

    public function insertProduct(Request $request)
    {
        $validator = Validator::make(
            [
                'fk_prekes_kategorija' => $request->input('fk_prekes_kategorija'),
                'aprasymas' => $request->input('aprasymas'),
                'kaina' => $request->input('kaina'),
                'ikelimo_data' => $request->input('ikelimo_data'),
                'adresas' => $request->input('adresas')
            ],
            [
                'fk_prekes_kategorija' => 'required',
                'aprasymas' => 'required|min:3',
                'kaina' => 'required',
                'ikelimo_data' => 'required',
                'adresas' => 'required'
            ]
        );

        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $allPro = new Preke();
            $allPro->fk_prekes_kategorija = $request->input('fk_prekes_kategorija');
            $allPro->aprasymas = $request->input('aprasymas');
            $allPro->kaina = $request->input('kaina');
            $allPro->ikelimo_data = $request->input('ikelimo_data');
            $allPro->adresas = $request->input('adresas');

            $allPro->save();
        }
        return Redirect::to('/product')->with('success', 'Apartamentas sėkmingai pridėtas');
    }
    public function addProduct()
    {
        $allCat = Kategorija::all();
        return view('manageProduct', compact('allCat'));
    }



    //Orderiai

    public function confirmEditedOrders(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'adresas' => $request->input('adresas'),
                'vardas' => $request->input('vardas'),
                'pavarde' => $request->input('pavarde'),
                'busena' => $request->input('busena')

            ],
            [
                'adresas' => 'required|max:255',
                'vardas' => 'required|max:30',
                'pavarde' => 'required|max:30',
                'busena' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = Uzsakymas::where('id_uzsakymas', '=', $id)->update(
                [
                    'adresas' => $request->input('adresas'),
                    'vardas' => $request->input('vardas'),
                    'pavarde' => $request->input('pavarde'),
                    'busena' => $request->input('busena')
                ]
            );
        }
        return Redirect::to('/orders')->with('success', 'Rezervacija sėkmingai redaguota');
    }

    public function editOrders($id)
    {
        $selectedOrder = Uzsakymas::where('id_uzsakymas', '=', $id)->first();
        $allOrder = Uzsakymas::all();
        return view('orderedit', compact('selectedOrder', 'allOrder'));
    }

    public function deleteOrders($id)
    {
        $apmok = Apmokejimas::where('fk_Uzsakymas', '=', $id)->get();
        foreach ($apmok as $ap) {
            Apmokejimas::where('id_apmokėjimas', '=', $ap->id_apmokėjimas)->delete();
        }
        Uzsakymas::where('id_uzsakymas', '=', $id)->delete();
        return Redirect::to('/orders')->with('Rezervacija ištrinta');
    }

    public function deleteCategory($id)
    {
        Baldai::where('id', '=', $id)->delete();
        return Redirect::to('/admin')->with('success', 'Baldas ištrintas');
    }
    public function insertCategory(Request $request)
    {
        $validator = Validator::make(
            [
                'pavadinimas' => $request->input('pavadinimas'),
                'nuotraukos_pav' => $request->input('nuotraukos_pav'),
                'apartamento_id' => $request->input('apartamento_id')
            ],
            [
                'pavadinimas' => 'required|min:1|max:30',
                'nuotraukos_pav' => 'required|min:1|max:30',
                'apartamento_id' => 'required|min:1|max:9'
            ]
        );

        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $allCat = new Baldai();
            $allCat->pavadinimas = $request->input('pavadinimas');
            $allCat->nuotraukos_pav  = $request->input('nuotraukos_pav');
            $allCat->apartamento_id  = $request->input('apartamento_id');

            $allCat->save();
        }
        return Redirect::to('/admin')->with('success', 'Baldas sėkmingai pridėtas');
    }
    public function addCategory()
    {
        return view('manageFurniture');
    }
    public function editBaldas($id)
    {
        $selectedBaldas = Baldai::where('id', '=', $id)->first();
        $allBaldai = Baldai::all();
        return view('baldaiedit', compact('selectedBaldas', 'allBaldai'));
    }
    public function confirmEditedBaldai(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'pavadinimas' => $request->input('pavadinimas'),
                'nuotraukos_pav' => $request->input('nuotraukos_pav'),
                'apartamento_id' => $request->input('apartamento_id')

            ],
            [
                'pavadinimas' => 'required|min:1|max:30',
                'nuotraukos_pav' => 'required|min:1|max:30',
                'apartamento_id' => 'required|min:1|max:9'
            ]
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $data = Baldai::where('id', '=', $id)->update(
                [
                    'pavadinimas' => $request->input('pavadinimas'),
                    'nuotraukos_pav' => $request->input('nuotraukos_pav'),
                    'apartamento_id' => $request->input('apartamento_id')
                ]
            );
        }
        return Redirect::to('/admin')->with('success', 'Baldas sėkmingai redaguotas');
    }
}
