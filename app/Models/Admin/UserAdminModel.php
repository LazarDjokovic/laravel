<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 15:36
 */

namespace App\Models\Admin;
use Illuminate\Support\Facades\DB;

class UserAdminModel
{
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $picture_id;
    public $role;
    public $role_id;
    public $picture;

    public function getAllUsers(){
        return DB::table('user as u')
            ->select('*','u.id as user_id','r.id as role_id')
            ->join('role as r','u.role_id','=','r.id')
            ->join('picture as p','u.picture_id','=','p.id')
            ->get();
    }

    public function addUser(){
        $check_username=DB::table('user')
            ->select('username')
            ->where('username',$this->username)
            ->first();

        $check_email=DB::table('user')
            ->select('email')
            ->where('email',$this->email)
            ->first();
        if($check_username!=null){
            return "username";
        }
        else if($check_email!=null){
            return "email";
        }
        else{

            if($this->picture_id==1){
                $query_register= DB::table('user')
                    ->insert([
                        'first_name'=>$this->first_name,
                        'last_name'=>$this->last_name,
                        'username'=>$this->username,
                        'email'=>$this->email,
                        'password'=>md5($this->password),
                        'picture_id'=>1,
                        'role_id'=>$this->role_id
                    ]);
                //return (bool) $query_register;
                if($query_register){
                    return "success";
                }
                else{
                    return "error";
                };
            }
            else{
                $picture_id=DB::table('picture')
                    ->insertGetId([
                        'path'=>$this->picture,
                        'alt'=>'profile picture'
                    ]);
                $query_register= DB::table('user')
                    ->insert([
                        'first_name'=>$this->first_name,
                        'last_name'=>$this->last_name,
                        'username'=>$this->username,
                        'email'=>$this->email,
                        'password'=>md5($this->password),
                        'picture_id'=>$picture_id,
                        'role_id'=>$this->role_id
                    ]);
                //return (bool) $query_register;
                if($query_register){
                    return "success";
                }
                else{
                    return "error";
                };
            }
        }
    }

    public function getPictureIdFromUser(){
        return DB::table('user')
            ->select('picture_id')
            ->where([
                'id'=>$this->id
            ])
            ->first();
    }

    public function deleteUser(){
        return DB::table('user')
            ->where([
                'id'=>$this->id
            ])
            ->delete();
    }

    public function getProfilePictureName(){
        return DB::table('picture')
            ->select('path')
            ->where([
                'id'=>$this->picture_id
            ])
            ->first();
    }

    public function deleteProfilePicture(){
        return DB::table('picture')
            ->where([
                'id'=>$this->picture_id
            ])
            ->delete();
    }

    public function getOneUser(){
        return DB::table('user as u')
            ->select('*','u.id as user_id','r.id as role_id')
            ->join('role as r','u.role_id','=','r.id')
            ->join('picture as p','u.picture_id','=','p.id')
            ->where('u.id',$this->id)
            ->first();
    }

    public function getCurrentPassword(){
        return DB::table('user')
            ->select('password')
            ->where('id',$this->id)
            ->first();
    }

    public function editUserWithPassword(){
        $edit_user = DB::table('user')
            ->where('id', $this->id)
            ->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'password'=>md5($this->password),
                'role_id' => $this->role_id
            ]);

        //return (bool) $query_register;
        if ($edit_user) {
            return "success";
        } else {
            return "error";
        }
    }
    public function editUserWithoutPassword(){
        $edit_user = DB::table('user')
            ->where('id', $this->id)
            ->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'role_id' => $this->role_id
            ]);

        //return (bool) $query_register;
        if ($edit_user==0 || $edit_user==1) {
            return "success";
        } else {
            return "error";
        }
    }
}