<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    // ALL
    //======================
    public function all()
    {
        return Route::orderBy('name', 'asc')->paginate(20);
    }

    // GET DATA X IDROUTE
    //======================
    public function getDataXIdRoute($idRoute)
    {
        return Route::select("*")
            ->where("idRoute", $idRoute)
            ->paginate(20);
    }

    // GET DATA X NAME
    //======================
    public function getDataXName($name)
    {
        return Route::select("*")
            ->where("name", $name)
            ->paginate(20);
    }

    // GET DATA X PADRE IDOFFICE
    //======================
    public function getDataXIdOffice($idOffice)
    {
        return Route::select("*")
            ->where("idOffice", $idOffice)
            ->paginate(20);
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        $route = new Route();
        $route->idRoute = $request->input('idRoute');
        $route->idOffice = $request->input('idOffice');
        $route->name = $request->input('name');
        $route->state = $request->input('state');
        $route->save();
        return json_encode(['msg' => 'exito creación']);
    }

    // DELETE
    //======================
    public function destroyXIdRoute($idRoute)
    {
        $route = Route::select("*")
            ->where("idRoute", $idRoute);
        $route->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }
}
