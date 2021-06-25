<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    // ALL
    //======================
    public function all()
    {
        return Region::orderBy('name', 'asc')->paginate(20);
    }

    // GET DATA X IDRegion
    //======================
    public function getDataXIdRegion($idRegion)
    {
        return Region::select("*")
            ->where("idRegion", $idRegion)
            ->paginate(20);
    }

    // GET DATA X NAME
    //======================
    public function getDataXName($name)
    {
        return Region::select("*")
            ->where("name", $name)
            ->paginate(20);
    }

    // GET DATA X CURRENCY
    //======================
    public function getDataXCountry($idCountry)
    {
        return Region::select("*")
            ->where("idCountry", $idCountry)
            ->paginate(20);
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        $region = new Region();
        $region->idCountry = $request->input('idCountry');
        $region->name = $request->input('name');
        $region->state = $request->input('state');
        $region->save();
        return json_encode(['msg' => 'exito creación']);
    }

    // DELETE
    //======================
    public function destroyXIdRegion($idRegion)
    {
        $Region = Region::select("*")
            ->where("idRegion", $idRegion);
        $Region->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }

    // EDIT
    //======================
    public function editXIdRegion(Request $request, $idRegion)
    {
        return json_encode(['msg' => 'Metodo edit pendiente']);
    }
}
