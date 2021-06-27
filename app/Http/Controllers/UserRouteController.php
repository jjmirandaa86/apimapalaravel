<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRoute;

class UserRouteController extends Controller
{
    // ALL
    //======================
    public function all()
    {
        return UserRoute::select("*")
            ->orderBy('idUser', 'asc')
            ->paginate(20);
    }

    // GET DATA X IDUSER
    //======================
    public function getUserRouteXidUser($idUser)
    {
        return UserRoute::select("*")
            ->where("idUser", $idUser)
            ->paginate(20);
    }

    // GET DATA X IDROUTE
    //======================
    public function getUserRouteXidRoute($idRoute)
    {
        return UserRoute::select("*")
            ->where("idRoute", $idRoute)
            ->paginate(20);
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        $userRoute = new UserRoute();
        $userRoute->idUser = $request->input('idUser');
        $userRoute->idRoute = $request->input('idRoute');
        $userRoute->state = $request->input('state');
        $userRoute->save();
        return json_encode(['msg' => 'exito creación']);
    }

    // DELETE
    //======================
    public function destroyXIdUser($idUser)
    {
        $userRoute = UserRoute::select("*")
            ->where("idUser", $idUser);
        $userRoute->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }
}
