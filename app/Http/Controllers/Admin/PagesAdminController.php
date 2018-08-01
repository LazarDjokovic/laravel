<?php
/**
 * Created by PhpStorm.
 * User: Lignjoslav
 * Date: 15.03.2018.
 * Time: 15:29
 */

namespace App\Http\Controllers\Admin;


use App\Models\Admin\PagesAdminModel;
use Illuminate\Http\Request;

class PagesAdminController
{
    private $data=[];

    public function getPages(){
        $modelPages=new PagesAdminModel();
        $this->data['allPages']=$modelPages->getPages();
        return view('admin.adminPages',$this->data);
    }

    public function addPage(){
        return view('admin.adminAddPage');
    }

    public function addPageAdd(Request $request){
        $rules=[
          'name'=>'required',
          'path'=>'required'
        ];
        $custom_mesages=[
          'required'=>':attribute field is required'
        ];

        $request->validate($rules,$custom_mesages);

        try{
            $name=$request->get('name');
            $path=$request->get('path');
            $modePages=new PagesAdminModel();
            $modePages->name=$name;
            $modePages->path=$path;
            $modePages->addPage();

            return redirect('/pages');
        }
        catch (\Exception $ex){
            \Log::error("Doslo je do greske pri unosu " . $ex->getMessage());
            return redirect()->back()->with("error", "Try later...");
        }
    }

    public function adminDeletePage($id){
        $modelPages=new PagesAdminModel();
        $modelPages->id=$id;
        $data=$modelPages->deletePage();
        return['podaci'=>$data];
    }

    public function adminEditPage($id){
        $modelPage=new PagesAdminModel();
        $modelPage->id=$id;
        $this->data['onePage']=$modelPage->getOnePage();
        //dd($this->data['onePage']);
        return view('admin.adminEditPage',$this->data);
    }

    public function adminEditPageEdit(Request $request,$id){
        $name=$request->get('name');
        $path=$request->get('path');
        $modelPage=new PagesAdminModel();
        //dd($id);
        $modelPage->id=$id;
        $modelPage->name=$name;
        $modelPage->path=$path;

        $modelPage->adminEditPage();
        return redirect('/pages');
    }
}