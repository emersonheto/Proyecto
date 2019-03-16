<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    public function authenticated($request , $user){

        $id_user = $user->id;

        $role=User::join("user_has_roles","users.id","=","user_has_roles.user_id")
            ->where("role_id","=","2")->where("users.id","=",$id_user)->get();// 2 - cliente

        if(count($role) == 0){
            return redirect()->route('file.documents') ;
        }else{
            return redirect()->route('client.documents');      
        }
    }

    // public function username()
    // {
    //     return 'username';
    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/archivos/documentos';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
