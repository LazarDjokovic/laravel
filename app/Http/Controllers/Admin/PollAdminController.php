<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 17.03.2018.
 * Time: 14:33
 */

namespace App\Http\Controllers\Admin;
use App\Models\Admin\PollAdminModel;
use Illuminate\Http\Request;

class PollAdminController
{
    private $data=[];

    public function getPolls(){
        $modelPoll=new PollAdminModel();
        $this->data['allPolls']=$modelPoll->getPolls();
        return view('admin.adminPoll',$this->data);
    }

    public function addPoll(){
        return view ('admin.adminAddPoll');
    }

    public function addPollAdd(Request $request){
        $question=$request->get('question');
        //dd($question);
        $modelPoll=new PollAdminModel();
        $modelPoll->question=$question;
        $modelPoll->addPoll();

        return redirect('/adminPoll');
    }

    public function deletePoll($id){
        $modelPoll=new PollAdminModel();
        $modelPoll->id=$id;
        $data=$modelPoll->deletePoll();
        return ['podaci'=>$data];
    }

    public function editPoll($id){
        $modelPoll=new PollAdminModel();
        $modelPoll->id=$id;
        $this->data['onePoll']=$modelPoll->getOnePoll();
        return view('admin.adminEditPoll',$this->data);
    }

    public function editPollEdit(Request $request,$id){
        $question=$request->get('question');
        $modelPoll=new PollAdminModel();
        //dd($id);
        $modelPoll->id=$id;
        $modelPoll->question=$question;

        $modelPoll->editPollEdit();
        return redirect('/adminPoll');
    }

    public function changeActiveQuestion($id){
        $modelPoll=new PollAdminModel();
        $modelPoll->id=$id;
        $data=$modelPoll->adminChangeActiveQuestion();
        return ['podaci'=>$data];
    }
}