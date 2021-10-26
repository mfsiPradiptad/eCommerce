<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function upload(Request $request)
    {
        $id =$request->id;
       // dd($request->all());
        $validated = $request->validate([
            'pName' =>'bail|required',
            'pDesc'=>'required',
            'pPrice'=>'required',
            'pQuantity'=>'required',
            'pImage' => 'required',

        ]);
        $fileOriginalName=$request->pImage->getClientOriginalName();
        $file = explode('.',$fileOriginalName);
        $newName =$file[0].'_'.time().'.'.$file[1];
        $msg='';

    try {

        DB::beginTransaction();
        if($id !=''){
            $product = Product::where('id',$id)->
            update([
                'productName'=>$request->pName,
                'price'=>$request->pPrice,
                'quantity'=>$request->pQuantity,
                'description'=>$request->pDesc,
                'image'=>$newName,

            ]);
            $msg='Product updated sucessfully';
        }else{
            $product = Product::create([
                'productName'=>$request->pName,
                'price'=>$request->pPrice,
                'quantity'=>$request->pQuantity,
                'description'=>$request->pDesc,
                'image'=>$newName,

            ]);
            $id=$product->id;
            $msg='Product added sucessfully';
        }

        $path = $request->file('pImage')->storeAs(
            '/public/documents/product', $newName
        );

        DB::commit();
    } catch (\Exception $e) {

        DB::rollback();

        $msg='Some Error Occured';
    }
    $product = Product::where('id',$id)->get();
    $product=json_decode($product,true);

        return view('admin.addProduct',['data'=>$product,'msg'=>$msg,'submit'=>'Update']);
    }
    public function product()
    {
       $data =DB::select('select * from product');
      // dd($data);
       return view('admin.productList',['data'=>$data]);
    }
    public function productId($id='')
    {
       // dd($id);
        if($id !=''){
             $product = Product::where('id',$id)->get();
             $product=json_decode($product,true);
             $submit='Update';
        }else{
            $product=array();
            $product[0]['quantity']='';
            $product[0]['id']='';
            $product[0]['price']='';
            $product[0]['image']='';
            $product[0]['description']='';
            $product[0]['productName']='';

            $submit='Add';
        }
       //dd($product);
        return view('admin.addProduct',['data'=>$product,'msg'=>'','submit'=>$submit]);
    }
}
