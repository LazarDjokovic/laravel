<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 17.03.2018.
 * Time: 14:34
 */

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;


class PollAdminModel
{
    public $id;
    public $question;
    public $active;

    public function getPolls(){
        return DB::table('poll')
            ->get();
    }

    public function addPoll(){
        $idAddedPoll=DB::table('poll')
            ->insertGetId([
                'question'=>$this->question,
                'active'=>0
            ]);
        DB::table('poll_answers')
            ->insert([
                'id_poll'=>$idAddedPoll,
                'answer'=>'Yes',
                'votes'=>0
            ]);
        return DB::table('poll_answers')
            ->insert([
                'id_poll'=>$idAddedPoll,
                'answer'=>'No',
                'votes'=>0
            ]);
    }

    public function deletePoll(){
        DB::table('poll_answers')
            ->where('id_poll',$this->id)
            ->delete();

        return DB::table('poll')
            ->where('id',$this->id)
            ->delete();
    }

    public function getOnePoll(){
        return DB::table('poll')
            ->where('id',$this->id)
            ->first();
    }

    public function editPollEdit(){
        return DB::table('poll')
            ->where('id',$this->id)
            ->update([
                'question'=>$this->question
            ]);
    }

    public function adminChangeActiveQuestion(){
        DB::table('poll')
            ->update([
                'active'=>0
            ]);
        return DB::table('poll')
            ->where([
                'id'=>$this->id
            ])
            ->update([
                'active'=>1
            ]);
    }
}