<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //Login Controller
    public function LoginUser(){
        return view('Auth.login');
    }
    public function check_user(Request $req)
 
    {
        $username=$req->username;
        $password=md5($req->password);
        $check=$req->remember;
        $data=DB::select("SELECT * FROM `users` where name like '$username'");
        if($data==null){
            Session()->flash('message', 'Login Failed!');
                return redirect("login")->with("fail","Login Failed");
        }else{
            if($password==$data[0]->password){
                $_SESSION['type']="remember";
                $req->session()->put('user',$username);
                $req->session()->put('role',$data[0]->role);
                if($check==null){
                    if(isset($_COOKIE['user_login'])){
                        setcookie('user_login',"");
                        if(isset($_COOKIE['user_password'])){
                            setcookie('user_password',"");
                        }
                    }
               }else{
                    //COOKIES for username  
                    setcookie("user_login", $_POST['username']);
                    //COOKIES for password
                    setcookie("user_password", $_POST['password']);
                }
                Session()->flash('message', 'Login succssesful');
                return redirect()->route('Religious_Donation');
               }else{
                Session()->flash('message', 'Login Failed!');
                return redirect("login")->with("fail","Login Failed");
               }
            }
        }
    public function destroy()
    {
        session()->forget('user');
        session()->forget('role');
        return view('Auth.login');
    }
}
