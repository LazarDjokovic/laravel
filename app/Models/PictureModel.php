<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 28.02.2018.
 * Time: 23:16
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class PictureModel
{
    public $id;
    public $path;
    public $alt;
    public $currentPictureId;

    public function getAllSlider(){
        return DB::table('slider')
            ->get();
    }

    public function getAllGallery(){
        return DB::table('gallery')
            ->get();
    }

    public function changePicture(){
        $pictureId=DB::table('picture')
            ->insertGetId([
                'path'=>$this->path,
                'alt'=>'profile picture'
            ]);
        return DB::table('user')
            ->where('id', $this->id)
            ->update(['picture_id' => $pictureId]);
    }

    public function getCurrentPicture(){
        $this->currentPictureId=DB::table('user')
            ->select('picture_id')
            ->where('id',$this->id)
            ->pluck('picture_id')
            ->first();

        return DB::table('picture')
            ->select('path')
            ->where('id',$this->currentPictureId)
            ->pluck('path')
            ->first();
    }

    public function deleteChangedPicture(){
        DB::table('picture')
            ->where('id',$this->currentPictureId)
            ->delete();
    }
}