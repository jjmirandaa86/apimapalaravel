<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    // ALL
    //======================
    public function all()
    {
        return Country::orderBy('name', 'asc')->paginate(20);
    }

    // GET DATA X IDCOUNTRY
    //======================
    public function getDataXIdCountry($idCountry)
    {
        return Country::select("*")
            ->where("idCountry", $idCountry)
            ->paginate(20);
    }

    // GET DATA X NAME
    //======================
    public function getDataXName($name)
    {
        return Country::select("*")
            ->where("name", $name)
            ->paginate(20);
    }

    // GET DATA X CURRENCY
    //======================
    public function getDataXCurrency($currency)
    {
        return Country::select("*")
            ->where("currency", $currency)
            ->paginate(20);
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        $country = new Country();
        $country->idCountry = $request->input('idCountry');
        $country->name = $request->input('name');
        $country->currency = $request->input('currency');
        $country->state = $request->input('state');
        $country->save();
        return json_encode(['msg' => 'exito creación']);
    }

    // DELETE
    //======================
    public function destroyXIdCountry($idCountry)
    {
        $country = Country::select("*")
            ->where("idCountry", $idCountry);
        $country->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }

    // EDIT
    //======================
    public function editXIdCountry(Request $request, $idCountry)
    {
        /*
        $country = Country::where('idCountry', "=", $idCountry)
            ->first();

        $country = Country::select("*")
            ->where("idCountry", $idCountry);

        $country->idCountry = $idCountry;
        $country->currency = $request->input('currency');
        $country->state = $request->input('state');
        //$country->created_at = null;
        //$country->updated_at = null;
        */

        //$country->save();
        return json_encode(['msg' => 'Metodo edit pendiente']);
    }
}
