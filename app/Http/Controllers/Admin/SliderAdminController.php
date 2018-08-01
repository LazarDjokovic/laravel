<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 15:42
 */

namespace App\Http\Controllers\Admin;
use App\Models\Admin\SliderAdminModel;
use Illuminate\Http\Request;


class SliderAdminController
{
    private $data=[];

    public function getSlider(){
        $modelSlider=new SliderAdminModel();
        $this->data['slider']=$modelSlider->getSlider();
        return view('admin.adminSlider',$this->data);
    }

    public function addSlider(){
        return view('admin.adminAddSlider');
    }

    public function addSliderAdd(Request $request){
        $rules=[
            'alt'=>'required',
            'picture'=>'required|dimensions:width=1920,height:740'
        ];
        $custom_mesages=[
            'required'=>':attribute field is required',
            'dimensions'=>'Picture needs to be 1920x740'
        ];

        $request->validate($rules,$custom_mesages);

        try{
            $alt=$request->get('alt');
            $modelSlider=new SliderAdminModel();

            $picture=$request->file('picture');
            $extension = $picture->getClientOriginalExtension(); // vraca: jpg, png - bez .
            $file_name = time().'.'.$extension;


            $modelSlider->picture=$file_name;
            $modelSlider->alt=$alt;
            $path = 'images/slider/';

            $modelSlider->addSlider();
            //dd($file_name,$alt,$path);

            $picture->move($path, $file_name);

            return redirect('/adminSlider');
        }
        catch (\Exception $ex){
            \Log::error("Doslo je do greske pri unosu " . $ex->getMessage());
            return redirect()->back()->with("error", "Try later...");
        }
    }

    public function adminDeleteSlider($id){
        $modelSlider=new SliderAdminModel();
        $modelSlider->id=$id;
        $dataGetDeleted=$modelSlider->getDeletedSlider();
        //dd($dataGetDeleted);
        $picture=$dataGetDeleted->picture;
        unlink('images/slider/'.$picture);
        $data=$modelSlider->deleteSlider();

        return ['podaci'=>$data];
    }

    public function adminSliderChangeFirstPicture($id){
        $modelSlider=new SliderAdminModel();
        $modelSlider->id=$id;
        $data=$modelSlider->adminSliderChangeFirstPicture();
        return ['podaci'=>$data];
    }
}