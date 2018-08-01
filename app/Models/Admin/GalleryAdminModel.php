<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 15:52
 */

namespace App\Models\Admin;
use Illuminate\Support\Facades\DB;

class GalleryAdminModel
{
    public $id;
    public $picture;
    public $alt;

    public function getGallery(){
        return DB::table('gallery')
            ->get();
    }
    public function addGallery(){
        return DB::table('gallery')
            ->insert([
                'alt'=>$this->alt,
                'path'=>$this->picture
            ]);
    }

    public function deleteGallery(){
        return DB::table('gallery')
            ->where([
                'id'=>$this->id
            ])
            ->delete();
    }

    public function getDeletedPicture(){
        return DB::table('gallery')
            ->where([
                'id'=>$this->id
            ])
            ->first();
    }
}