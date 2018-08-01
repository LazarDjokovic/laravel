<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\OrdersModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'firstName'=>'required|regex:/^[A-Za-z. -]+$/',
            'lastName'=>'required|regex:/^[A-Za-z. -]+$/',
            'usernameReg'=>'required|regex:/^[a-zA-z0-9]{3,20}$/',
            'emailReg'=>'required|regex:/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/',
            'passwordReg'=>['required','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\w~@#$%^&*+=`|{}:;!.?\"()\[\]-]{8,25}$/'],
            'confirmPassword'=>'required|same:passwordReg'
        ];
        $custom_messages=[
            'required'=>'You must fill :attribute field',
            'firstName.regex'=>'First name in not in good format',
            'lastName.regex'=>'Last name in not in good format',
            'usernameReg.regex'=>'Username name in not in good format',
            'emailReg.regex'=>'Email name in not in good format',
            'passwordReg.regex'=>'Password must contain at least one number and on uppercase letter, min 8 characters',
            'same'=>'Passwords dont match'
        ];

        $request->validate($rules,$custom_messages);
        //dd('Uspesna validacija');
        try{
            $username=$request->get('usernameReg');
            $email=$request->get('emailReg');
            $userModel=new UserModel();
            $userModel->first_name=$request->get('firstName');
            $userModel->last_name=$request->get('lastName');
            $userModel->username=$username;
            $userModel->email=$email;
            $userModel->password=$request->get('passwordReg');
            $result=$userModel->register();
            //dd($result);
            $ex=new \Exception();
            if($result=="username"){
                \Log::error("Username $username is not available". $ex->getMessage().", ip address: ".$request->ip());
                return redirect()->back()->withErrors(['Username already exists']);
            }
            else if($result=="email"){
                \Log::error("Email $email not available". $ex->getMessage().", ip address: ".$request->ip());
                return redirect()->back()->withErrors(['Email already exists']);
            }
            else if($result=="error"){
                \Log::error("Error with database". $ex->getMessage().", ip address: ".$request->ip());
                return redirect()->back()->withErrors(['Insert error, please try later']);
            }
            else if($result=="success"){
                return redirect()->back()->with('message', 'Success, now you can login');
            }
        }
        catch(\Exception $ex){
            \Log::error("Greska" . $ex->getMessage());
            return redirect()->back()->withErrors(['errorQuery','Greska']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
