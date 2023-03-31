<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        $data=['title'=>'Productos','products'=>$products];
        return view('product.index',$data);
    }

    public function getproductadd(){
        $data=['title'=>'Agregar Producto'];
        return view('product.add',$data);
    }
    public function postproductadd(Request $request){

            $p = new Product;

            if( $request->hasfile('photo')) {
                $file = $request->file('photo');
                $destinationPath = 'images/';
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
                $p->photo = $destinationPath . $filename;
            }
            
            
            $p->name = $request->input('name');
            $p->category = $request->input('category');
            $p->price = $request->input('price');
            $p->description = $request->input('description');
           
            
            
            if($p->save()){
                $products = Product::get();
                $data=['title'=>'Productos','products'=>$products];
                return view('product.index',$data);
            }
       

        
    }
    public function getproductedit($id){
        $p = Product::findOrFail($id);
        $data=['title'=>'Modificar','product'=>$p];
        return view('product.edit',$data);
    }
    public function postproductedit(Request $request , $id){
        $p = Product::findOrFail($id);
        $p->name = $request->input('name');
        $p->category = $request->input('category');
        $p->price = $request->input('price');
        $p->description = $request->input('description');
        
        if($p->save()){
        $products = Product::get();
        $data=['title'=>'Productos','products'=>$products];
        return view('product.index',$data);
        }
    }
    public function getproductdelete($id){
        $p = Product::findOrFail($id);
        $p->delete();
        $products = Product::get();
        $data=['title'=>'Productos','products'=>$products];
        return view('product.index',$data);
    }
}
