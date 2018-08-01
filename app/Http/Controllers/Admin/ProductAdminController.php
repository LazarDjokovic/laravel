<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 16:03
 */

namespace App\Http\Controllers\Admin;


use App\Models\Admin\ProductAdminModel;
use Illuminate\Http\Request;

class ProductAdminController
{
    private $data=[];

    public function getProducts(){
        $modelProduct=new ProductAdminModel();
        $this->data['products']=$modelProduct->getProducts();
        return view('admin.adminProduct',$this->data);
    }

    public function addProduct(){
        return view('admin.adminAddProduct');
    }

    public function addProductAdd(Request $request){
        $rules=[
            'title'=>'required|regex:/^[A-Za-z0-9_ ]{3,30}+$/',
            'price'=>'required|regex:/^[0-9]{1,20}+$/',
            'description'=>'required',
            'trailer'=>'required',
            'picture'=>'required|mimes:jpg,jpeg,png,gif'
        ];
        $custom_mesages=[
            'required'=>'You must fill :attribute field',
            'title.regex'=>'Title in not in good format, only letters and numbers max 30 chars',
            'price.regex'=>'Price in not in good format, only numbers max 20 chars',
            'mimes'=>'Wrong picture format, please choose jpg, jpeg, png or gif'
        ];

        $request->validate($rules,$custom_mesages);

        try{
            $title=$request->get('title');
            $price=$request->get('price');
            $description=$request->get('description');
            $trailer=$request->get('trailer');
            $modelProduct=new ProductAdminModel();

            $picture=$request->file('picture');
            $extension = $picture->getClientOriginalExtension(); // vraca: jpg, png - bez .
            $file_name = time().'.'.$extension;


            $modelProduct->picture=$file_name;
            $modelProduct->title=$title;
            $modelProduct->price=$price;
            $modelProduct->description=$description;
            $modelProduct->trailer=$trailer;
            $path = 'images/games/';

            $modelProduct->addProduct();

            $picture->move($path, $file_name);

            return redirect('/adminProduct');
        }
        catch (\Exception $ex){
            \Log::error("Doslo je do greske pri unosu " . $ex->getMessage());
            return redirect()->back()->with("error", "Try later...");
        }
    }


    public function adminDeleteProduct($id){
        $modelProduct=new ProductAdminModel();
        $modelProduct->id=$id;
        $dataGetDeleted=$modelProduct->getDeletedPicture();
        //dd($dataGetDeleted);
        $picture=$dataGetDeleted->picture;
        unlink('images/games/'.$picture);
        $data=$modelProduct->deleteProduct();

        return ['podaci'=>$data];
    }

    public function adminEditProduct($id){
        $modelProduct=new ProductAdminModel();
        $modelProduct->id=$id;
        $this->data['oneProduct']=$modelProduct->getOneProduct();
        return view('admin.adminEditProduct',$this->data);
    }

    public function adminEditProductEdit(Request $request,$id){
        $rules=[
            'title'=>'required|regex:/^[A-Za-z0-9_ ]{3,30}+$/',
            'price'=>'required|regex:/^[0-9]{1,20}+$/',
            'description'=>'required',
            'trailer'=>'required',
            'picture'=>'nullable|mimes:jpg,jpeg,png,gif'
        ];
        $custom_mesages=[
            'required'=>'You must fill :attribute field',
            'title.regex'=>'Title in not in good format, only letters and numbers max 30 chars',
            'price.regex'=>'Price in not in good format, only numbers max 20 chars',
            'mimes'=>'Wrong picture format, please choose jpg, jpeg, png or gif'
        ];

        $request->validate($rules,$custom_mesages);

        $modelProduct=new ProductAdminModel();
        $modelProduct->id=$id;

        $picture=$request->file('picture');

        if(!empty($picture)){
            $modelProduct->title=$request->get('title');
            $modelProduct->price=$request->get('price');
            $modelProduct->description=$request->get('description');
            $modelProduct->trailer=$request->get('trailer');

            $extension = $picture->getClientOriginalExtension(); // vraca: jpg, png - bez .
            $file_name = time().'.'.$extension;
            $path = 'images/games/';

            $modelProduct->picture=$file_name;
            $deletedPicture=$modelProduct->getDeletedPicture();
            $modelProduct->editProductWithPicture();
            unlink('images/games/'.$deletedPicture->picture);
            $picture->move($path, $file_name);

            return redirect()->back();
        }
        else{
            $modelProduct->title=$request->get('title');
            $modelProduct->price=$request->get('price');
            $modelProduct->description=$request->get('description');
            $modelProduct->trailer=$request->get('trailer');

            $modelProduct->editProductWithoutPicture();
            return redirect()->back();
        }
    }
}