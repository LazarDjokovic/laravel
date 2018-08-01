<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 09.03.2018.
 * Time: 22:02
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ProductModel
{
    public $id;
    public $title;
    public $picture;
    public $price;
    public $description;
    public $trailer;

    public function getAll(){
        return DB::table('product')
            ->paginate(6);
    }

    public function getFirstSix(){
        return DB::table('product')
            ->take(6)
            ->get();
    }

    public function oneProduct(){
        return DB::table('product')
            ->where('id',$this->id)
            ->first();
    }


}