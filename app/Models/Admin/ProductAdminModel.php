<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 16:03
 */

namespace App\Models\Admin;


use Illuminate\Support\Facades\DB;

class ProductAdminModel
{
    public $id;
    public $title;
    public $picture;
    public $price;
    public $description;
    public $trailer;

    public function getProducts(){
        return DB::table('product')
            ->get();
    }

    public function addProduct(){
        return DB::table('product')
            ->insert([
               'title'=>$this->title,
               'picture'=>$this->picture,
               'price'=>$this->price,
               'description'=>$this->description,
               'trailer'=>$this->trailer
            ]);
    }

    public function deleteProduct(){
        return DB::table('product')
            ->where([
                'id'=>$this->id
            ])
            ->delete();
    }

    public function getDeletedPicture(){
        return DB::table('product')
            ->where([
                'id'=>$this->id
            ])
            ->first();
    }

    public function getOneProduct(){
        return DB::table('product')
            ->where([
                'id'=>$this->id
            ])
            ->first();
    }

    public function editProductWithoutPicture(){
        return DB::table('product')
            ->where([
                'id'=>$this->id
            ])
            ->update([
                'title'=>$this->title,
                'price'=>$this->price,
                'description'=>$this->description,
                'trailer'=>$this->trailer
            ]);
    }

    public function editProductWithPicture(){
        return DB::table('product')
            ->where([
                'id'=>$this->id
            ])
            ->update([
                'title'=>$this->title,
                'picture'=>$this->picture,
                'price'=>$this->price,
                'description'=>$this->description,
                'trailer'=>$this->trailer
            ]);
    }
}