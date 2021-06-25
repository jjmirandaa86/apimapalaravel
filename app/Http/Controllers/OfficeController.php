<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    // ALL
    //======================
    public function all()
    {
        return Office::orderBy('name', 'asc')->paginate(20);
    }

    // GET DATA X IDOFFICE
    //======================
    public function getDataXIdOffice($idOffice)
    {
        return Office::select("*")
            ->where("idOffice", $idOffice)
            ->paginate(20);
    }

    // GET DATA X NAME
    //======================
    public function getDataXName($name)
    {
        return Office::select("*")
            ->where("name", $name)
            ->paginate(20);
    }

    // GET DATA X PADRE REGION
    //======================
    public function getDataXRegion($idRegion)
    {
        return Office::select("*")
            ->where("idRegion", $idRegion)
            ->paginate(20);
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        $office = new Office();
        $office->idOffice = $request->input('idOffice');
        $office->idRegion = $request->input('idRegion');
        $office->name = $request->input('name');
        $office->state = $request->input('state');
        $office->save();
        return json_encode(['msg' => 'exito creación']);
    }

    // DELETE
    //======================
    public function destroyXIdOffice($idOffice)
    {
        $office = Office::select("*")
            ->where("idOffice", $idOffice);
        $office->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }
}
