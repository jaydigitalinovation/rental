<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
/*use Spatie\ImageOptimizer\OptimizerChain;
use Illuminate\Http\File;*/
use Illuminate\Support\Facades\Storage;
use Image;
use DB;



use Hash;

class Admin_controller extends Controller
{

     public function __construct(){

        $this->middleware('auth:admin');
    }


    public function home(){

        $userdata=DB::table('home')->get();

        $data['userdata']=$userdata;

        return view('admin.home',$data);
      }

      

      public function edit_profile(){


        $admin=auth()->guard('admin')->id();

        $userdata=DB::table('admins')->where('id',$admin)->get();

        $data['id']=$userdata[0]->id;

        $data['image']=$userdata[0]->image;

        $data['name']=$userdata[0]->name;

        $data['email']=$userdata[0]->email;

        $data['phone_no']=$userdata[0]->phone_no;

        $data['address']=$userdata[0]->address;

        return view('admin.edit_profile',$data);
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

            DB::table('admins')->where('id',$id)->update(['image'=>$imagename]);
        }

        DB::table('admins')->where('id',$id)->update(['name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'address'=>$address,]);

        return redirect('/admin/home')->with('error','profile updated successfully!!');
    }

    public function store_change_password(Request $request,$id){

        $validated=$request->validate([
            'password'=>'required|min:6',
            'c_password'=>'required|same:password',
        ]);

        DB::table('admins')->where('id',$id)->update(['password'=>Hash::make($request->password),]);

        return redirect('/admin/home')->with('error','password changed successfully!!');
    }


    public function add_banner_info(){

        return view('admin.add_banner_info');
    }

    public function store_add_banner_info(Request $request){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        $file=$request->file('image');

        $imagename='';

        if($file){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);
        }
        /*$fileSize = File::size(public_path('/uploads/'.$imagename));

        
        
        dd($fileSize);*/

        DB::table('home')->insert(['image'=>$imagename,'title'=>$title , 'description'=>$description]);

        return redirect('/admin/home')->with('error','data submited successfully!!');
    }


    public function delete_banner_data($id){

        $userdata=DB::table('home')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home')->where('id',$id)->delete();

        return redirect('/admin/home')->with('error','data deleted successfully!!');
    }


    public function update_banner_data($id){

        $userdata=DB::table('home')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['image']=$userdata[0]->image;

        $data['title']=$userdata[0]->title;

        $data['description']=$userdata[0]->description;


        return view('admin.update_banner_data',$data);
    }


    public function store_update_banner_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

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

            DB::table('home')->where('id',$id)->update(['image'=>$imagename]);
        }

        DB::table('home')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/home')->with('error','data updated successfully!!');
    }


    public function category(){

        $userdata=DB::table('category')->get();

        $data['userdata']=$userdata;

        $product_data=DB::table('product')->get();

        $data['product_data']=$product_data;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        return view('admin.category',$data);
    }

    public function add_category_info(){

        return view('admin.add_category_info');
    }

    public function store_add_category_info(Request $request){

         $validated=$request->validate([
            'category'=>'required',
            'description'=>'required',
        ]);

        $category=$request->input('category');

        $description=$request->input('description');

        $file=$request->file('image');

        $imagename='';

        if($file){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);
        }

        $file1=$request->file('icon');

        $imagename1='';

        if($file1){

            $destination_path='uploads';

            $imagename1=time().'__'.$file1->getClientOriginalName();

            $file1->move($destination_path,$imagename1);
        }

        $tags=explode(',', $request->tag);

        DB::table('category')->insert(['image'=>$imagename,'icon'=>$imagename1,'category'=>$category , 'description'=>$description]);

        $shop_id = DB::table('category')->max('id');

        if($tags){

        foreach($tags as $t){

            DB::table('sub_category')->insert(['sub_category_name'=>$t , 'category_id'=>$shop_id]);

            }
        }

        return redirect('/admin/category')->with('error','data submited successfully!!');
    }

     public function delete_category_data($id){

        $userdata=DB::table('category')->where('id',$id)->get();

        $image=$userdata[0]->image;

        $icon=$userdata[0]->icon;

        if($image){

            unlink(public_path('/uploads/'.$image));
        }

        if($icon){

            unlink(public_path('/uploads/'.$icon));
        }

        DB::table('category')->where('id',$id)->delete();

        DB::table('sub_category')->where('category_id',$id)->delete();

        return redirect('/admin/category')->with('error','data deleted successfully!!');
    }


    public function update_category_data($id){

        $userdata=DB::table('category')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['image']=$userdata[0]->image;

        $data['icon']=$userdata[0]->icon;

        $data['category']=$userdata[0]->category;

        $data['description']=$userdata[0]->description;

        $tag_data=DB::table('sub_category')->where('category_id',$id)->get();

        $data['tag_data']=$tag_data;

        return view('admin.update_category_data',$data);
    }


    public function store_update_category_data(Request $request,$id){

        $validated=$request->validate([
            'category'=>'required',
            'description'=>'required',
        ]);

        $category=$request->input('category');

        $description=$request->input('description');

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

            DB::table('category')->where('id',$id)->update(['image'=>$imagename]);
        }

        $file1=$request->file('icon');

        $oldicon=$request->input('oldicon');

        $imagename1='';

        if($file1){

            $destination_path='uploads';

            $imagename1=time().'__'.$file1->getClientOriginalName();

            $file1->move($destination_path,$imagename1);

            if($oldicon){

                unlink(public_path('/uploads/'.$oldicon));
            }

            DB::table('category')->where('id',$id)->update(['icon'=>$imagename1]);
        }

        DB::table('category')->where('id',$id)->update(['category'=>$category,'description'=>$description]);

        $shop_id = $id;

        $tags=explode(',', $request->tag);

       if(count($tags)>1){

        foreach($tags as $t){
    
             DB::table('sub_category')->insert(['sub_category_name'=>$t , 'category_id'=>$shop_id]);

            }
        }

        return redirect('/admin/category')->with('error','data updated successfully!!');
    }


    public function sub_category(){

        $userdata=DB::table('sub_category')->get();

        $data['userdata']=$userdata;

        $category=DB::table('category')->get();

        $data['category']=$category;

        return view('admin.sub_category',$data);
    }

    public function add_sub_category_info(){

        $userdata=DB::table('category')->get();

        $data['userdata']=$userdata;

        return view('admin.add_sub_category_info',$data);
    }

    public function store_add_sub_category_info(Request $request){

        $validated=$request->validate([
            'sub_category'=>'required',
        ]);

        $sub_category=$request->input('sub_category');

        $category=$request->input('category');

        DB::table('sub_category')->insert(['sub_category_name'=>$sub_category,'category_id'=>$category]);

        return redirect('/admin/sub_category')->with('error','data submited successfully!!');
    }

    public function delete_sub_category_data($id){

        DB::table('sub_category')->where('id',$id)->delete();

        return redirect('/admin/sub_category')->with('error','data deleted successfully!!');
    }

    public function update_sub_category_data($id){

        $userdata=DB::table('sub_category')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['sub_category_name']=$userdata[0]->sub_category_name;

        $data['category_id']=$userdata[0]->category_id;

        $category=DB::table('category')->get();

        $data['category']=$category;

        return view('admin.update_sub_category_data',$data);
    }

    public function store_update_sub_category_data(Request $request,$id){

        $validated=$request->validate([
            'sub_category'=>'required',
        ]);

        $sub_category=$request->input('sub_category');

        $category=$request->input('category_id');

        DB::table('sub_category')->where('id',$id)->update(['sub_category_name'=>$sub_category,'category_id'=>$category]);

        return redirect('/admin/sub_category')->with('error','data update successfully!!');
    }


    public function about(){

        $userdata=DB::table('about')->get();

        $data['userdata']=$userdata;

        return view('admin.about',$data);
    }

    public function add_about_info(){

        return view('admin.add_about_info');
    }

    public function store_add_about_info(Request $request){

        $validated=$request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);

        $name=$request->input('name');

        $email=$request->input('email');

        DB::table('about')->insert(['name'=>$name , 'email'=>$email]);

        return redirect('/admin/about')->with('error','data submited successfully!!');
    }

    public function delete_about_data($id){

        DB::table('about')->where('id',$id)->delete();

        return redirect('/admin/about')->with('error','data deleted successfully!!');
    }

    public function delete_selected_data(Request $request)
    {
        $ids = $request->ids;
        DB::table("about")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }





    function getFileSizeByCurl($url) {  
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 1);
                curl_setopt($ch, CURLOPT_HEADER, 1);
                $response = curl_exec($ch);
                return curl_getinfo($ch, CURLINFO_SIZE_DOWNLOAD);
            }

    
}
