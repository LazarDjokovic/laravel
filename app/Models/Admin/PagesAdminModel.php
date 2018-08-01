<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 15:30
 */

namespace App\Models\Admin;
use Illuminate\Support\Facades\DB;

class PagesAdminModel
{
    public $id;
    public $name;
    public $path;

    public function getPages(){
        return DB::table('pages')
            ->get();
    }

    public function addPage(){
        return DB::table('pages')
            ->insert([
                'name'=>$this->name,
                'path'=>$this->path
            ]);
    }

    public function deletePage(){
        return DB::table('pages')
            ->where([
                'id'=>$this->id
            ])
            ->delete();
    }

    public function getOnePage(){
        return DB::table('pages')
            ->where([
                'id'=>$this->id
            ])
            ->first();
    }

    public function adminEditPage(){
        return DB::table('pages')
            ->where('id',$this->id)
            ->update([
                'name'=>$this->name,
                'path'=>$this->path
            ]);


    }
}