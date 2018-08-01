<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 09.03.2018.
 * Time: 18:00
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class LoginController extends Controller
{
    private $data=[];



    public function login(Request $request){
        $user_model=new UserModel();
        $username=$request->get('username');
        $user_model->username=$username;
        $user_model->password=$request->get('password');
        //dd($user_model->login());
        $user_login=$user_model->login();

        if(!empty($user_login)){
            $request->session()->push('user',$user_login);
            return redirect('/')->with('successLogin','Welcome '.$username);
        }
        else{
            return redirect()->back()->with('error','Wrong username or password');
        }
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/');
    }
}