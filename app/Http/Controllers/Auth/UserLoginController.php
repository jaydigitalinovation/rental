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

class UserLoginController extends Controller
{

     public function user_login(){

        return view('user.login');
    }
     

    protected $redirectTo ='/user/home';

    public function authenticate(Request $request){

    $phone_no=$request->input('phone_no');

    if($phone_no){

        $request->validate([
          
          'phone_no'         => 'required',
          'password'       => 'required',
      ]);
        
   /*     if ($validator->fails())
        {
            
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
     
        else{
*/
            

            $remember=($request->input('remember')) ? true : false;
      $login_atempt=Auth::guard('web')->attempt([

        'phone_no'=>$request->input('phone_no'),
        'password'=>$request->input('password')

      ],$remember);

    

  }else{

    $request->validate([
          
          'email'         => 'required',
          'password'       => 'required',
      ]);
        
   /*     if ($validator->fails())
        {
            
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
     
        else{
*/
            

            $remember=($request->input('remember')) ? true : false;
      $login_atempt=Auth::guard('web')->attempt([

        'email'=>$request->input('email'),
        'password'=>$request->input('password')

      ],$remember);
  }

     if($login_atempt) {
        
        $request->session()->regenerate();
        
        return response()->json([

           'success'=>'user signed in successfully',
        ]);

     }else{

         return response()->json([
           'error'=>"Your Email or Password is incorrect",
        ]);
     }

     /*   }*/
    
      

    } 



    public function logout(){

         Auth::guard('web')->logout();

         return redirect('user/user_login');
      }

    public function register(){

        return view('user.register');
    }
    public function user_register(Request $request){
        $validated=$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone_no'=>'required',
            'password'=>'required|min:6',
            'c_password'=>'required|same:password',
            'address'=>'required',
            'checkbox'=>'required|in:1',
        ]);

        $name=$request->input('name');

        $email=$request->input('email');

        $phone_no=$request->input('phone_no');

        $address=$request->input('address');

        $checkbox=$request->input('checkbox');

        DB::table('users')->insert(['name'=>$name , 'email'=>$email , 'password'=>Hash::make($request->password) , 'phone_no'=>$phone_no , 'address'=>$address]);

        return redirect('/user/user_login')->with('error','User register successfully!!');
    }

    public function register_data(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone_no'=>'required',
            'password'=>'required|min:6',
            'c_password'=>'required|same:password',
            'address'=>'required',
            'checkbox'=>'required|in:1',
        ]);

        $name=$request->input('name');

        $email=$request->input('email');

        $phone_no=$request->input('phone_no');

        $address=$request->input('address');

        $checkbox=$request->input('checkbox');

        DB::table('users')->insert(['name'=>$name , 'email'=>$email , 'password'=>Hash::make($request->password) , 'phone_no'=>$phone_no , 'address'=>$address]);

        return response()->json([
            'success'=>'User register successfully',
        ]);
    }

    public function forget_password(){

        return view('user.email');
    }


    public function send_mail(Request $request){

        $phone_no=$request->input('phone_no');

        if($phone_no){

            $validated=$request->validate([
            'phone_no'=>'required',
        ]);

        $phone_no=$request->input('phone_no');

        $user=User::where('phone_no',$phone_no)->count();

        if($user){

            $user_data=User::where('phone_no',$phone_no)->get();

            $user_id=$user_data[0]->id;

            $string=$this->generateRandomString(4);

            $already_store=DB::table('user_password_resets')->where('user_id',$user_id)->count();

            if($already_store){

                DB::table('user_password_resets')->where('user_id',$user_id)->update(['token'=>$string]);
            }else{

                DB::table('user_password_resets')->insert(['token'=>$string,'user_id'=>$user_id]);
            }
            return redirect('user/confirm_otp/'.$user_id)->with('error','otp send on phone_no!!');
        
        }else{

            return redirect('user/user_login')->with('error','user not registered!!!');
        }

        }else{

        $validated=$request->validate([
            'email'=>'required|email',
        ]);

        $email=$request->input('email');

        $user=User::where('email',$email)->count();

        if($user){

            $user_data=User::where('email',$email)->get();

            $user_id=$user_data[0]->id;

            $string=$this->generateRandomString(4);

            $already_store=DB::table('user_password_resets')->where('user_id',$user_id)->count();

            if($already_store){

                DB::table('user_password_resets')->where('user_id',$user_id)->update(['token'=>$string]);
            }else{

                DB::table('user_password_resets')->insert(['token'=>$string,'user_id'=>$user_id]);
            }
            return redirect('user/confirm_otp/'.$user_id)->with('error','otp send on email!!');
        
        }else{

            return redirect('user/user_login')->with('error','user not registered!!!');
        }
        }
    }

    public function confirm_otp($id){

        $data['id']=$id;

        return view('user.otp',$data);
    }

    public function verify_otp(Request $request,$id){

        $validated=$request->validate([
            'otp'=>'required',
        ]);

        $otp=$request->input('otp');

        $user_data=DB::table('user_password_resets')->where('user_id',$id)->get();

        $token=$user_data[0]->token;

        if($otp==$token){

            DB::table('user_password_resets')->where('user_id',$id)->delete();

            return redirect('/user/reset_password/'.$id);
        }
        else{

            return redirect('/user/confirm_otp/'.$id)->with('error','otp is incorrect');
        }
    }

    public function reset_password($id){

        $data['id']=$id;

        return view('user.reset_password',$data);
    }

    public function store_password(Request $request,$id){

        $validated=$request->validate([
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',
        ]);

        User::where('id',$id)->update(['password'=>Hash::make($request->password),]);

        return redirect('/user/user_login')->with('error','User password change successfully!!');
    }

    

    public function edit_profile($id){

        $userdata=DB::table('users')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['image']=$userdata[0]->image;

        $data['name']=$userdata[0]->name;

        $data['email']=$userdata[0]->email;

        $data['phone_no']=$userdata[0]->phone_no;

        $data['address']=$userdata[0]->address;

        return view('user.edit_profile',$data);
    }

    public function store_update_profile(Request $request,$id){

        $validated=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
            'address'=>'required',
        ]);

        $name=$request->input('name');

        $email=$request->input('email');

        $phone_no=$request->input('phone_no');

        $address=$request->input('address');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('users')->where('id',$id)->update(['image'=>$imagename]);
        }

        DB::table('users')->where('id',$id)->update(['name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'address'=>$address,]);

        return redirect('/')->with('error','profile updated successfully!!');
    }


    public function store_change_password(Request $request,$id){

        $validated=$request->validate([
            'password'=>'required|min:6',
            'c_password'=>'required|same:password',
        ]);

        User::where('id',$id)->update(['password'=>Hash::make($request->password),]);

        return redirect('/')->with('error','password changed successfully!!');
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
