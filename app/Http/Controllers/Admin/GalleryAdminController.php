<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 15:51
 */

namespace App\Http\Controllers\Admin;


use App\Models\Admin\GalleryAdminModel;
use Illuminate\Http\Request;

class GalleryAdminController
{
    private $data=[];

    public function getGallery(){
        $modelGallery=new GalleryAdminModel();
        $this->data['gallery']=$modelGallery->getGallery();
        return view('admin.adminGallery',$this->data);
    }

    public function addGallery(){
        return view('admin.adminAddGallery');
    }

    public function addGalleryAdd(Request $request){
        $rules=[
            'alt'=>'required',
            'picture'=>'required|mimes:jpg,jpeg,png,gif'
        ];
        $custom_mesages=[
            'required'=>':attribute field is required',
            'mimes'=>'Wrong format, please choose jpg, jpeg, png or gif'
        ];

        $request->validate($rules,$custom_mesages);

        try{
            $alt=$request->get('alt');
            $modelSlider=new GalleryAdminModel();

            $picture=$request->file('picture');
            $extension = $picture->getClientOriginalExtension(); // vraca: jpg, png - bez .
            $file_name = time().'.'.$extension;


            $modelSlider->picture=$file_name;
            $modelSlider->alt=$alt;
            $path = 'images/gallery/';
            //dd($file_name,$alt,$path);
            $modelSlider->addGallery();
            //dd($file_name,$alt,$path);

            $picture->move($path, $file_name);

            return redirect('/adminGallery');
        }
        catch (\Exception $ex){
            \Log::error("Doslo je do greske pri unosu " . $ex->getMessage());
            return redirect()->back()->with("error", "Try later...");
        }
    }

    public function adminDeleteGallery($id){
        $modelGallery=new GalleryAdminModel();
        $modelGallery->id=$id;
        $dataGetDeleted=$modelGallery->getDeletedPicture();
        //dd($dataGetDeleted);
        $picture=$dataGetDeleted->path;
        unlink('images/gallery/'.$picture);
        $data=$modelGallery->deleteGallery();

        return ['podaci'=>$data];
    }
}