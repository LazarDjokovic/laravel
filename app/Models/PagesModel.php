<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 05.03.2018.
 * Time: 19:41
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class PagesModel
{
    public function getAll(){
        $result=DB::table('pages')
            ->get();
        return $result;
    }

}