<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class UserProductController extends Controller
{
    public function index()
    {
        $data =DB::select('select * from product');
        //dd($data);
        return view('user.home',['data'=>$data]);
    }
    public function addToCart(Request $request)
    {
        $id =$request->id;
        $cartData = $request->session()->get('cart');
        $request->session()->put('cart',$id);
        dd($request->session()->get('cart'));

    }
}
