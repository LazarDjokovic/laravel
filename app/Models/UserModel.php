<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author Lignjoslav
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;



class UserModel {
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $picture_id;
    public $role_id;
    public $path;

    public function register(){
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
            $query_register= DB::table('user')
                    ->insert([
                        'first_name'=>$this->first_name,
                        'last_name'=>$this->last_name,
                        'username'=>$this->username,
                        'email'=>$this->email,
                        'password'=>md5($this->password),
                        'picture_id'=>1,
                        'role_id'=>1
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

    public function login(){
        return DB::table('user as u')
            ->select('*','u.id as user_id','r.id as role_id')
            ->join('role as r','u.role_id','=','r.id')
            ->where([
                'username'=>$this->username,
                'password'=>md5($this->password)
            ])
            ->first();
    }

    public function getUser(){
        return DB::table('user as u')
            ->select('*','u.id as user_id','r.id as role_id')
            ->join('role as r','u.role_id','=','r.id')
            ->join('picture as p','u.picture_id','=','p.id')
            ->where('u.id','=',$this->id)
            ->first();
        //return $this->id;
    }

    public function changeProfilePicture(){
        return DB::table('user')
            ->join('role as r','u.role_id','=','r.id')
            ->join('picture as p','u.picture_id','=','p.id')
            ->where('u.id','=',$this->id)
            ->update([
                'path'=>$this->path
            ]);

    }
}
