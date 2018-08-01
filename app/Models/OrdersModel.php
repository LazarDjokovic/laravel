<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 12.03.2018.
 * Time: 16:20
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class OrdersModel
{
    public $id;
    public $user_id;
    public $product_id;
    public $game_title;
    public $price;

    public function add_to_cart(){
        return DB::table('orders')
            ->insert([
                'user_id'=>$this->user_id,
                'product_id'=>$this->product_id,
                'game'=>$this->game_title,
                'price'=>$this->price
            ]);
    }

    public function isOrdered(){
        return DB::table('orders')
            ->where([
                'user_id'=>$this->user_id,
                'product_id'=>$this->product_id,
            ])
            ->get()->count();
    }

    public function numberOfOrders(){
        return DB::table('orders')
            ->where([
                'user_id'=>$this->user_id,
            ])
            ->get()->count();
    }

    public function userOrders(){
        return DB::table('orders')
            ->where([
                'user_id'=>$this->user_id,
            ])
            ->get();
    }

    public function delete_orders(){
        return DB::table('orders')
            ->where('id',$this->id)
            ->delete();
    }
}