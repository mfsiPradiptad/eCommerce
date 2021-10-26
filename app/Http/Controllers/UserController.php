<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username'=>'bail|required|min:8|max:64',
            'password'=>'required|min:8|max:16',
        ]);
        $username=$request->username;
        $password=$request->password;
        $role = $request->role;
        $user = User::where('email',$username)->where('role',$role)->first();
        if($user){
            if(Hash::check($password, $user->password)) {
                if($role==1){
                    $request->session()->flush();
                    $request->session()->regenerate();
                    session(['user' => 'admin']);
                    session(['role' => '1']);


                    //dd(session());
                     return redirect('/productList');
                }else{

                    $request->session()->flush();
                    $request->session()->regenerate();
                    session(['user' => 'user']);
                    session(['userName'=> $user->name]);
                    session(['userId'=> $user->id]);
                    session(['userEmail'=> $user->email]);
                    session(['role' => '7']);
                    session(['cart' => []]);

                    return redirect('/home');
                }
            }
        }else{
            return view('user.userLogin',['msg'=>'User is not registred.']);
        }






    }
    public function register(Request $request)
    {
        if(Route::current()->uri =='signup'){
            $msg='';
        } else{
        $validated = $request->validate([
            'username'=>'bail|required|min:8|max:64',
            'password'=>'required|min:8|max:16',
            'cPassword'=>'required|min:8|max:16',

        ]);
        //$data = $request->all();
        $name=$request->username;
        $email=$request->email;
        $role=7;
        $password=Hash::make($request->password);
        try {
            $user = User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'role'=>$role,
            ]);
            $msg ="Succefully Registred.";
        } catch (\Throwable $th) {
           $msg='Email already registered.';
        }
    }

       return view('user.register',['msg'=>$msg]);
    }
    public function logOut(Request $request)
    {
        if($request->session('user')=='admin'){
            $user=1;
        }else{
            $user=7;
        }
        $request->session()->forget('user');
        $request->session()->forget('role');
        $request->session()->flush();
        $request->session()->regenerate();
        if($user == 1){
            return redirect('/productList');
        }else{
            return redirect('/home');
        }


    }
}
