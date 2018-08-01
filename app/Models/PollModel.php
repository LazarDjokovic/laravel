<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 0:30
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;


class PollModel
{
    public $idQuestion;
    public $idAnswer;
    public $ipAddress;

    public function getPollQuestion(){
        return DB::table('poll as p')
            ->select('*')
            ->join('poll_answers as pa','p.id','=','pa.id_poll')
            ->where('p.active',1)
            ->get();
    }

    public function setPollVote(){
        $result= DB::table('poll_votes')
            ->where([
                'ip_address'=>$this->ipAddress,
                'id_poll'=>$this->idQuestion
            ])
            ->get()->count();
        if($result!=0){
            return [
                'color'=>'red',
                'text'=>'You have already voted!'
            ];
        }
        else{
            DB::table('poll_votes')
                ->insert([
                    'id_poll'=>$this->idQuestion,
                    'id_answers'=>$this->idAnswer,
                    'ip_address'=>$this->ipAddress
                ]);
            DB::table('poll_answers')
                ->where([
                    'id'=>$this->idAnswer,
                    'id_poll'=>$this->idQuestion
                ])
                ->increment('votes');
            return [
                'color'=>'green',
                'text'=>'Success, ty for voting!'
            ];
        }


    }
}