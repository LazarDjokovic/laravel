<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 15:43
 */

namespace App\Models\Admin;
use Illuminate\Support\Facades\DB;


class SliderAdminModel
{
    public $id;
    public $picture;
    public $alt;
    public $active;

    public function getSlider(){
        return DB::table('slider')
            ->get();
    }

    public function addSlider(){
        return DB::table('slider')
            ->insert([
                'alt'=>$this->alt,
                'picture'=>$this->picture,
                'active'=>''
            ]);
    }

    public function deleteSlider(){
        return DB::table('slider')
            ->where([
                'id'=>$this->id
            ])
            ->delete();
    }

    public function getDeletedSlider(){
        return DB::table('slider')
            ->where([
                'id'=>$this->id
            ])
            ->first();
    }

    public function adminSliderChangeFirstPicture(){
        DB::table('slider')
            ->update([
                'active'=>''
            ]);
        return DB::table('slider')
            ->where([
                'id'=>$this->id
            ])
            ->update([
                'active'=>'first'
            ]);

    }
}