<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\support\facades\Auth;
use App\Models\Admin;
use Illuminate\support\MessageBag;
use Illuminate\Support\Facades\Mail;
use Illuminate\support\facades\Input;
use DB;
use Hash;

class AdminLoginController extends Controller
{

    

    public function __construct(){

           $this->middleware('guest:admin')->except('logout');
    }

  
    protected function guard(){

        return Auth::guard('admin');

     }


    public function admin_login(){

        return view('admin.login');
    }

    public function authenticate(Request $request){

        

        $phone_no=$request->input('phone_no');

        if($phone_no){

            $error=$request->validate([
                'phone_no'=>'required',
                'password'=>'required|min:6',
            ]);

            $remember=($request->input('remember')) ? true : false;
            $login_atempt=Auth::guard('admin')->attempt([

            'phone_no'=>$request->input('phone_no'),
            'password'=>$request->input('password')

            ],$remember);
            
        }else{

            $error=$request->validate([
                'email'=>'required',
                'password'=>'required|min:6',
            ]);

            $remember=($request->input('remember')) ? true : false;
            $login_atempt=Auth::guard('admin')->attempt([

            'email'=>$request->input('email'),
            'password'=>$request->input('password')

            ],$remember);

        }

    

     if ($login_atempt) {
        
        $request->session()->regenerate();

        return redirect('/admin/home');

     }else{

         return redirect('/admin/admin_login')
        ->with('error','Your email/phone_no or password are invalid.');

        /*$errors=new MessageBag(['password'=>['Email and / or password invalid.']]);

        return Redirect::back()->withError($errors);*/
     }
    }

    public function forget_password(){

        return view('admin.email');
    }

    public function send_mail(Request $request){

        $phone_no=$request->input('phone_no');

        if($phone_no){

            $validated=$request->validate([
                'phone_no'=>'required',
            ]);

            $phone_no=$request->input('phone_no');

            $user=Admin::where('phone_no',$phone_no)->count();

            if($user){

            $admin_data=Admin::where('phone_no',$phone_no)->get();

            $admin_id=$admin_data[0]->id;

            $string=$this->generateRandomString(4);

            $already_store=DB::table('admin_password_reset')->where('admin_id',$admin_id)->count();

            if($already_store){

                DB::table('admin_password_reset')->where('admin_id',$admin_id)->update(['token'=>$string]);
            }else{

                DB::table('admin_password_reset')->insert(['token'=>$string,'admin_id'=>$admin_id]);
            }
            return redirect('admin/confirm_otp/'.$admin_id)->with('error','otp send on phone_no!!');

        }else{

                return redirect('admin/admin_login')->with('error','admin not registered!!!');
            }


        }else{

            $validated=$request->validate([
                'email'=>'required|email'
            ]);

            $email=$request->input('email');

            $user=Admin::where('email',$email)->count();

            if($user){

            $admin_data=Admin::where('email',$email)->get();

            $admin_id=$admin_data[0]->id;

            $string=$this->generateRandomString(4);

            $already_store=DB::table('admin_password_reset')->where('admin_id',$admin_id)->count();

            if($already_store){

                DB::table('admin_password_reset')->where('admin_id',$admin_id)->update(['token'=>$string]);
            }else{

                DB::table('admin_password_reset')->insert(['token'=>$string,'admin_id'=>$admin_id]);
            }
            return redirect('admin/confirm_otp/'.$admin_id)->with('error','otp send on email!!');


            }else{

                return redirect('admin/admin_login')->with('error','admin not registered!!!');
            }
        }
        
    }

    public function confirm_otp($id){

        $data['id']=$id;

        return view('admin.otp',$data);
    }


    public function verify_otp(Request $request,$id){

        $validated=$request->validate([
            'otp'=>'required',
        ]);

        $otp=$request->input('otp');

        $userdata=DB::table('admin_password_reset')->where('admin_id',$id)->get();

        $token=$userdata[0]->token;

        if($otp==$token){

            DB::table('admin_password_reset')->where('admin_id',$id)->delete();

            return redirect('/admin/reset_password/'.$id);
        }else{

            return redirect('/admin/confirm_otp/'.$id)->with('error','otp is incorrect');
        }
    }


    public function reset_password($id){

        $data['id']=$id;

        return view('admin.reset_password',$data);
    }

    public function store_password(Request $request,$id){

        $validated=$request->validate([
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',
        ]);

        Admin::where('id',$id)->update(['password'=>Hash::make($request->password),]);

        return redirect('/admin/admin_login')->with('error','Admin password change successfully!!');
    }

    public function logout(){

         Auth::guard('admin')->logout();

         return redirect('admin/admin_login');
      }










      function generateRandomString($length = 4) {
           $characters = '0123456789';
           $charactersLength = strlen($characters);
           $randomString = '';
           for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
           }
         return $randomString;
      }

}
