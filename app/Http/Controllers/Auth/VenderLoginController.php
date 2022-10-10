<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\support\facades\Auth;
use App\Models\User;
use Illuminate\support\MessageBag;
use Illuminate\Support\Facades\Mail;
use Illuminate\support\facades\Input;
use DB;
use Hash;
use App\Models\Vender;

class VenderLoginController extends Controller
{
     
    protected $redirectTo ='/vender/home';

    public function authenticate(Request $request){

        $phone_no=$request->input('phone_no');

        if($phone_no){

            $request->validate([
 
           'phone_no' => 'required',
            'password' => 'required|string',
           
        ]);
             
    
    
          $remember=($request->input('remember')) ? true : false;
          $login_atempt=Auth::guard('vender')->attempt([

            'phone_no'=>$request->input('phone_no'),
            'password'=>$request->input('password')

          ],$remember);
        }

        else{
          
         $request->validate([
 
           'email' => 'required|email',
            'password' => 'required|string',
           
        ]);
             
    
    
      $remember=($request->input('remember')) ? true : false;
      $login_atempt=Auth::guard('vender')->attempt([

        'email'=>$request->input('email'),
        'password'=>$request->input('password')

      ],$remember);

      }

     if ($login_atempt) {
        
        $request->session()->regenerate();

        return response()->json([
            'success'=>'vender sign in successfully',
        ]);

     }else{

         return response()->json([
            'error'=>'Your Email or Password is incorrect',
         ]);

        /*$errors=new MessageBag(['password'=>['Email and / or password invalid.']]);

        return Redirect::back()->withError($errors);*/
     }

    } 

    public function logout(){

         Auth::guard('vender')->logout();

         return redirect('/user/user_login');
    }

    public function register(){

        return view('vender.register');
    }

    public function register_data(Request $request){

        $validated=$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone_no'=>'required',
            'password'=>'required',
            'c_password'=>'required|same:password',
            'address'=>'required',
            'checkbox'=>'required|in:1',
        ]);

        $name=$request->input('name');

        $email=$request->input('email');

        $phone_no=$request->input('phone_no');

        $address=$request->input('address');

        DB::table('venders')->insert(['name'=>$name , 'email'=>$email , 'password'=>Hash::make($request->password) , 'phone_no'=>$phone_no , 'address'=>$address]);

        return redirect('/vender/home')->with('error','data registered successfully!!');
    }

    public function forget_password(){

        return view('vender.email');
    }


    public function send_mail(Request $request){

        $phone_no=$request->input('phone_no');

        if($phone_no){

            $validated=$request->validate([
            'phone_no'=>'required',
        ]);

        $phone_no=$request->input('phone_no');

        $user=Vender::where('phone_no',$phone_no)->count();

        if($user){

            $vender_data=Vender::where('phone_no',$phone_no)->get();

            $vender_id=$vender_data[0]->id;

            $string=$this->generateRandomString(4);

            $already_store=DB::table('vender_password_reset')->where('vender_id',$vender_id)->count();

            if($already_store){

                DB::table('vender_password_reset')->where('vender_id',$vender_id)->update(['token'=>$string]);
            }else{

                DB::table('vender_password_reset')->insert(['token'=>$string,'vender_id'=>$vender_id]);
            }
            return redirect('vender/confirm_otp/'.$vender_id)->with('error','otp send on phone_no!!');
        
        }else{

            return redirect('user/user_login')->with('error','vender not registered!!!');
        }

        }else{

        $validated=$request->validate([
            'email'=>'required|email',
        ]);

        $email=$request->input('email');

        $user=Vender::where('email',$email)->count();

        if($user){

            $vender_data=Vender::where('email',$email)->get();

            $vender_id=$vender_data[0]->id;

            $string=$this->generateRandomString(4);

            $already_store=DB::table('vender_password_reset')->where('vender_id',$vender_id)->count();

            if($already_store){

                DB::table('vender_password_reset')->where('vender_id',$vender_id)->update(['token'=>$string]);
            }else{

                DB::table('vender_password_reset')->insert(['token'=>$string,'vender_id'=>$vender_id]);
            }
            return redirect('vender/confirm_otp/'.$vender_id)->with('error','otp send on email!!');
        
        }else{

            return redirect('user/user_login')->with('error','vender not registered!!!');
        }
        }
    }

    public function confirm_otp($id){

        $data['id']=$id;

        return view('vender.otp',$data);
    }

    public function verify_otp(Request $request,$id){

        $validated=$request->validate([
            'otp'=>'required',
        ]);

        $otp=$request->input('otp');

        $user_data=DB::table('vender_password_reset')->where('vender_id',$id)->get();

        $token=$user_data[0]->token;

        if($otp==$token){

            DB::table('vender_password_reset')->where('vender_id',$id)->delete();

            return redirect('/vender/reset_password/'.$id);
        }
        else{

            return redirect('/vender/confirm_otp/'.$id)->with('error','otp is incorrect');
        }
    }

    public function reset_password($id){

        $data['id']=$id;

        return view('vender.reset_password',$data);
    }

    public function store_password(Request $request,$id){

        $validated=$request->validate([
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',
        ]);

        DB::table('venders')->where('id',$id)->update(['password'=>Hash::make($request->password),]);

        return redirect('/user/user_login')->with('error','vender password changed successfully!!');
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
