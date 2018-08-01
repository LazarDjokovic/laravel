<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 14:04
 */

namespace App\Http\Controllers\Admin;


use App\Models\Admin\UserAdminModel;
use Illuminate\Http\Request;

class UserAdminController
{
    private $data=[];

    public function admin(){
        $modelUser=new UserAdminModel();
        $this->data['allUsers']=$modelUser->getAllUsers();
        return view('admin.adminUsers',$this->data);
    }

    public function addUser(){
        return view('admin.adminAddUser');
    }

    public function addUserAdd(Request $request){
        //dd($request->get('optradio'));
        $rules=[
            'firstName'=>'required|regex:/^[A-Za-z. -]+$/',
            'lastName'=>'required|regex:/^[A-Za-z. -]+$/',
            'username'=>'required|regex:/^[a-zA-z0-9]{3,20}$/',
            'email'=>'required|regex:/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/',
            'password'=>'required',
            'picture'=>'nullable|mimes:jpg,jpeg,png,gif'
        ];
        $custom_mesages=[
            'required'=>'You must fill :attribute field',
            'firstName.regex'=>'First name in not in good format',
            'lastName.regex'=>'Last name in not in good format',
            'username.regex'=>'Username name in not in good format',
            'email.regex'=>'Email name in not in good format',
            'mimes'=>'Wrong picture format, please choose jpg, jpeg, png or gif'
        ];

        $request->validate($rules,$custom_mesages);

        try{
            $file_name="";
            $path="";
            $firstName=$request->get('firstName');
            $lastName=$request->get('lastName');
            $username=$request->get('username');
            $email=$request->get('email');
            $password=$request->get('password');
            $role=$request->get('optradio');
            $modelUser=new UserAdminModel();


            $modelUser->first_name=$firstName;
            $modelUser->last_name=$lastName;
            $modelUser->username=$username;
            $modelUser->email=$email;
            $modelUser->password=$password;

            if($role=='user'){
                $modelUser->role_id=1;
            }
            elseif ($role='admin'){
                $modelUser->role_id=2;
            }


            $picture=$request->file('picture');
            if(!empty($picture)){
                $extension = $picture->getClientOriginalExtension(); // vraca: jpg, png - bez .
                $file_name = time().'.'.$extension;

                $modelUser->picture=$file_name;
                $path = 'images/profile/';
            }
            else{
                $modelUser->picture_id=1;
            }
            //dd($picture);
            $result=$modelUser->addUser();

            $ex=new \Exception();
            if(!empty($picture)){
                $picture->move($path, $file_name);
            }

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
                return redirect('/admin');
            }
        }
        catch (\Exception $ex){
            \Log::error("Doslo je do greske pri unosu " . $ex->getMessage());
            return redirect()->back()->with("error", "Try later...");
        }
    }

    public function adminDeleteUser($id){
        $modelUser=new UserAdminModel();
        $modelUser->id=$id;


        $pictureIdFromUser=$modelUser->getPictureIdFromUser();
        //return ['podaci'=>$pictureIdFromUser];
        if($pictureIdFromUser->picture_id==1){
            //Delete user but not picture
            $data=$modelUser->deleteUser();
            return ['podaci'=>$data];
        }
        else{
            //Delete user and picture from server
            $modelUser->picture_id=$pictureIdFromUser->picture_id;
            $profilePictureName=$modelUser->getProfilePictureName();
            unlink('images/profile/'.$profilePictureName->path);
            $modelUser->deleteUser();
            $data=$modelUser->deleteProfilePicture();
            return ['podaci'=>$data];
        }
        //dd($pictureIdFromUser);
        $dataGetDeleted=$modelUser->getDeletedPicture();
        //dd($dataGetDeleted);
        $picture=$dataGetDeleted->path;
        unlink('images/gallery/'.$picture);
        $data=$modelUser->deleteGallery();


    }

    public function adminEditUser($id){
        $modelUser=new UserAdminModel();
        $modelUser->id=$id;

        $this->data['oneUser']=$modelUser->getOneUser();
        //dd($this->data['oneUser']);
        return view('admin.adminEditUser',$this->data);
    }

    public function adminEditUserEdit(Request $request,$id){
        $rules=[
            'firstName'=>'required|regex:/^[A-Za-z. -]+$/',
            'lastName'=>'required|regex:/^[A-Za-z. -]+$/',
            'password'=>'required',
            'picture'=>'nullable|mimes:jpg,jpeg,png,gif'
        ];
        $custom_mesages=[
            'required'=>'You must fill :attribute field',
            'firstName.regex'=>'First name in not in good format',
            'lastName.regex'=>'Last name in not in good format',
            'mimes'=>'Wrong picture format, please choose jpg, jpeg, png or gif'
        ];

        $request->validate($rules,$custom_mesages);

        $modelUser=new UserAdminModel();
        $modelUser->id=$id;
        $currentPassword=$modelUser->getCurrentPassword();
        $firstName=$request->get('firstName');
        $lastName=$request->get('lastName');
        $passwordChanged=$request->get('password');

        $role=$request->get('optradio');

        if($role=='user'){
            $modelUser->role_id=1;
        }
        elseif ($role='admin'){
            $modelUser->role_id=2;
        }

        $ex=new \Exception();
        //dd($currentPassword,$passwordChanged);
        if($currentPassword->password!=$passwordChanged){
            $modelUser->password=$passwordChanged;
            $modelUser->first_name=$firstName;
            $modelUser->last_name=$lastName;

            $result=$modelUser->editUserWithPassword();

            if($result=="error"){
                \Log::error("Error with database". $ex->getMessage().", ip address: ".$request->ip());
                return redirect()->back()->withErrors(['Insert error, please try later']);
            }
            else if($result=="success"){
                return redirect()->back();
            }
        }
        else{
            $modelUser->first_name=$firstName;
            $modelUser->last_name=$lastName;

            $result=$modelUser->editUserWithoutPassword();

            if($result=="error"){
                \Log::error("Error with database". $ex->getMessage().", ip address: ".$request->ip());
                return redirect()->back()->withErrors(['Insert error, please try later']);
            }
            else if($result=="success"){
                return redirect()->back();
            }
        }

    }
}