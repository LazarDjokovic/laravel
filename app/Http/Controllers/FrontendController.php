<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Models\OrdersModel;
use App\Models\PagesModel;
use App\Models\PictureModel;
use App\Models\PollModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\User;
use Illuminate\Http\Request;
use Mail;
/**
 * Description of FrontendController
 *
 * @author Lignjoslav
 */
class FrontendController extends Controller{
    private $data=[];
    public function __construct(Request $request)
    {
        $pages=new PagesModel();
        $this->data['user_info']=session()->get('user')[0];
        $this->data['pages']=$pages->getAll();
        $numberOfOrders=new OrdersModel();
        //dd($this->data['pages']);
        //$numberOfOrders->user_id=$request->session()->get('user')[0]->user_id;
        //$this->data['numberOfOrders']=$numberOfOrders->numberOfOrders();
        //dd($this->data['numberOfOrders']);
    }

    public function index(){
        $modelSlider=new PictureModel();
        $modelProduct=new ProductModel();
        $this->data['slider']=$modelSlider->getAllSlider();
        $this->data['firstSixProducts']=$modelProduct->getFirstSix();
        return view('pages.index',$this->data);
    }
    public function all_products(){
        $modelProduct=new ProductModel();
        $this->data['allProducts']=$modelProduct->getAll();
        return view('pages.all_products',$this->data);
    }
    public function contact(){
        return view('pages.contact',$this->data);
    }
    public function contact_send(Request $request){
        /*$name=$request->get('name');
        $email=$request->get('email');
        $message=$request->get('message');
        dd($name, $email, $message);*/

        $this->validate($request,[
            'name'=>'min:3',
            'email'=>'required|email',
            'message'=>'min:3'
        ]);

        $data=array(
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'bodyMessage'=>$request->get('message')
        );

        Mail::send('email.contact_form', $data, function ($message) use ($data){
           $message->from($data['email']);
           $message->to('lakilazar1@gmail.com');
           $message->subject('ZolaTrade Contact form');
        });
        return redirect()->back()->with('success','Thanks for contacting us!');
    }
    public function gallery(){
        $modelGallery=new PictureModel();
        $this->data['gallery']=$modelGallery->getAllGallery();
        return view('pages.gallery',$this->data);
    }
    public function author(){
        return view('pages.author',$this->data);
    }
    public function register(){
        return view('pages.register',$this->data);
    }
    public function one_product($id){
        //dd(session('user')[0]);
        $modelOrders=new OrdersModel();
        $modelOrders->product_id=$id;
        if(session()->has('user')){
            $modelOrders->user_id=session('user')[0]->user_id;
        }
        $this->data['isOrdered']=$modelOrders->isOrdered();
        $modelProduct=new ProductModel();
        $modelProduct->id=$id;
        $this->data['oneProduct']=$modelProduct->oneProduct();
        return view('pages.one_product',$this->data);
    }
    public function user_profile($id){
        $modelUser=new UserModel();
        $modelUser->id=$id;
        $this->data['user']=$modelUser->getUser();
        $modelOrders=new OrdersModel();
        $modelOrders->user_id=$id;
        $this->data['userOrders']=$modelOrders->userOrders();
        //dd($this->data['user']);
        return view('pages.user_profile',$this->data);
    }
    public function change_profile_picture(Request $request){
        $modelPicture=new PictureModel();

        $id=$request->get('userId');
        $modelPicture->id=$id;

        $picture = $request->file('inputProfilePicture');
        if($picture==null){
            return redirect()->back()->withErrors(['Choose picture first']);
        }
        {
            $tmp_path = $picture->getPathName(); // tmp putanja
            $extension = $picture->getClientOriginalExtension(); // vraca: jpg, png - bez .
            $file_name = time().'.'.$extension;
            $modelPicture->path=$file_name;
            $path = 'images/profile/';
            $path_server = public_path($path);
            $result=$modelPicture->getCurrentPicture();

            //dd($modelPicture->getCurrentPicture());
            if($result!="default.png"){
                $modelPicture->deleteChangedPicture();
                unlink('images/profile/'.$result);
            }

            $modelPicture->changePicture();
            $picture->move($path, $file_name);
            return redirect()->back();
            //unlink($file_path);
            //dd($file_name, $path, $path_server);
        }

    }

    public function add_to_cart(Request $request){
        if(session()->has('user')){
            $user_id=$request->get('user_id');
            $product_id=$request->get('product_id');
            $game_title=$request->get('game_title');
            $price=$request->get('price');
            //dd($user_id,$product_id,$price,$game_title);
            $modelOrders=new OrdersModel();

            $modelOrders->user_id=$user_id;
            $modelOrders->product_id=$product_id;
            $modelOrders->game_title=$game_title;
            $modelOrders->price=$price;
            $result=$modelOrders->add_to_cart();
            //dd($result);
            if($result){
                return redirect()->back();
            }
        }
        else{
            return redirect('/register');
        }
    }

    public function getOrders($id){
        $modelOrders=new OrdersModel();
        $modelOrders->user_id=$id;
        $data=$modelOrders->userOrders();
        return ['podaci' => $data];
    }

    public function delete_orders($id){
        $modelOrders=new OrdersModel();
        $modelOrders->id=$id;
        $data=$modelOrders->delete_orders();
        return['podaci'=>$data];
    }

    public function numberOfOrders($id){
        $modelOrders=new OrdersModel();
        $modelOrders->user_id=$id;
        $data=$modelOrders->numberOfOrders();
        return['podaci'=>$data];
    }

    public function getPoll(){
        $modelPoll=new PollModel();
        $data=$modelPoll->getPollQuestion();
        return['podaci'=>$data];
    }

    public function setPollVote($idQuestion,$idAnswer,$ipAddress){
        $modelPoll=new PollModel();
        $modelPoll->idQuestion=$idQuestion;
        $modelPoll->idAnswer=$idAnswer;
        $modelPoll->ipAddress=$ipAddress;
        $data=$modelPoll->setPollVote();
        return ['podaci'=>$data];
    }
}
