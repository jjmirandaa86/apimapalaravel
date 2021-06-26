<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Contracts\Auth\Authenticatable;

class UserController extends Controller
{
    // ALL
    //======================
    public function all()
    {
        $user = User::select("*")
            ->orderBy('lastName', 'asc')
            ->paginate(20);
        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['api_token', 'password', 'remember_token', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // GET DATA X IDUSER
    //======================
    public function getDataXIdUser($idUser)
    {
        $user = User::select("*")
            ->where("idUser", $idUser)
            ->paginate(20);
        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['api_token', 'password', 'remember_token', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // GET DATA X EMAIL
    //======================
    public function getDataXEmail($email)
    {
        $user = User::select("*")
            ->where("email", $email)
            ->paginate(20);
        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['api_token', 'password', 'remember_token', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        $user = new User();
        $user->idUser = $request->input('idUser');
        $user->firtsName = $request->input('firtsName');
        $user->lastName = $request->input('lastName');
        $user->position = $request->input('position');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->state = $request->input('state');
        $user->save();
        return json_encode(['msg' => 'exito creación']);
    }

    // DELETE
    //======================
    public function destroyXIdUser($idUser)
    {
        $user = User::select("*")
            ->where("idUser", $idUser);
        $user->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }

    // VALIDATE EMAIL y PASSWORD
    //======================
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where("email", $email)
            ->first();

        if (!is_null($user) && Hash::check($password, $user->password)) {
            $user->api_token = Str::random(255);
            $user->save();

            return json_encode([
                'msg' => 'Login Exitoso',
                'token' => $user->api_token,
            ]);
        } else {
            return json_encode(['msg' => 'Email o contraseña invalida']);
        }
    }

    // LOGOUT
    //======================
    public function logout(Request $request)
    {
        $user = User::where("email", $request->input('email'))
            ->first();
        //$user1 = auth()->user();
        $user->api_token = null;
        $user->save();

        return json_encode(['msg' => 'Salida con exito']);
    }
}
