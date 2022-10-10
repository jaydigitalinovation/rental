<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class Vender_Controller extends Controller
{

    public function __construct(){

        $this->middleware('auth:vender');
    }
    public function home(){

        return view('vender.home');
    }

    public function edit_profile(){

        $vender=auth()->guard('vender')->id();

        $userdata=DB::table('venders')->where('id',$vender)->get();

        $data['id']=$userdata[0]->id;

        $data['image']=$userdata[0]->image;

        $data['name']=$userdata[0]->name;

        $data['email']=$userdata[0]->email;

        $data['phone_no']=$userdata[0]->phone_no;

        $data['address']=$userdata[0]->address;

        return view('vender.edit_profile',$data);
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

            DB::table('venders')->where('id',$id)->update(['image'=>$imagename]);
        }

        DB::table('venders')->where('id',$id)->update(['name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'address'=>$address,]);

        return redirect('/vender/home')->with('error','profile updated successfully!!');
    }


    public function store_change_password(Request $request,$id){

        $validated=$request->validate([
            'password'=>'required|min:6',
            'c_password'=>'required|same:password',
        ]);

        DB::table('venders')->where('id',$id)->update(['password'=>Hash::make($request->password),]);

        return redirect('/vender/home')->with('error','password changed successfully!!');
    }

    public function category(){

        $userdata=DB::table('category')->get();

        $data['userdata']=$userdata;

        $product_data=DB::table('product')->get();

        $data['product_data']=$product_data;

        return view('vender.category',$data);
    }

    public function add_product_info($id){

        $userdata=DB::table('category')->where('id',$id)->get();

        $data['userdata']=$userdata;

        $data['id']=$id;

        $sub_category=DB::table('sub_category')->where('category_id',$id)->get();

        $data['sub_category']=$sub_category;

        return view('vender.add_product_info',$data);
    }

    public function store_add_product_info(Request $request,$id){

        $validated=$request->validate([
            'product_price'=>'required',
            'duration'=>'required',
            'product_name'=>'required',
        ]);

        $product_price=$request->input('product_price');

        $duration=$request->input('duration');

        $product_name=$request->input('product_name');

        $sub_category=$request->input('sub_category');

        $file=$request->file('product_image');

        $imagename='';

        if($file){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);
        }

        DB::table('product')->insert(['product_image'=>$imagename,'product_price'=>$product_price,'duration'=>$duration,'category_id'=>$id,'sub_category_id'=>$sub_category,'product_name'=>$product_name]);

        return redirect('/vender/category')->with('error','data submited successfully!!!');
    }

    public function delete_product_data($id){

        $userdata=DB::table('product')->where('id',$id)->get();

        $image=$userdata[0]->product_image;

        if($image){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('product')->where('id',$id)->delete();

        return redirect('/vender/category')->with('error','data deleted successfully!!!');
    }

    public function update_product_data($id){

        $userdata=DB::table('product')->where('id',$id)->get();

        $category_id=$userdata[0]->category_id;

        $data['id']=$userdata[0]->id;

        $data['product_image']=$userdata[0]->product_image;

        $data['product_price']=$userdata[0]->product_price;

        $data['duration']=$userdata[0]->duration;

        $data['category_id']=$userdata[0]->category_id;

        $data['product_name']=$userdata[0]->product_name;

        $sub_category=DB::table('sub_category')->where('category_id',$category_id)->get();

        $data['sub_category']=$sub_category;

        return view('vender.update_product_data',$data);
    }

    public function store_update_product_data(Request $request,$id){

        $validated=$request->validate([
            'product_price'=>'required',
            'duration'=>'required',
            'product_name'=>'required',
        ]);

        $product_price=$request->input('product_price');

        $duration=$request->input('duration');

        $product_name=$request->input('product_name');

        $sub_category=$request->input('sub_category');

        $file=$request->file('product_image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('product')->where('id',$id)->update(['product_image'=>$imagename]);
        }

        DB::table('product')->where('id',$id)->update(['product_price'=>$product_price ,'sub_category_id'=>$sub_category ,'duration'=>$duration ,'product_name'=>$product_name]);

        return redirect('/vender/category')->with('error','data updated successfully!!!');

    }

    public function a_product(){

        $userdata=DB::table('product')->get();

        $data['userdata']=$userdata;

        $image_data=DB::table('m_product_image')->get();

        $data['image_data']=$image_data;

        $size=DB::table('size_type')->get();

        $data['size']=$size;

        $product=DB::table('product_type')->get();

        $data['product']=$product;

        $category=DB::table('category')->get();

        $data['category']=$category;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        return view('vender.a_product',$data);
    }

    public function add_a_product_info(){

        $userdata=DB::table('category')->get();

        $data['userdata']=$userdata;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        $size=DB::table('size_type')->get();

        $data['size']=$size;

        return view('vender.add_a_product_info',$data);
    }

    public function subcat(Request $request){
         
        $parent_id = $request->cat_id;
         
        $subcategories = DB::table('sub_category')->where('category_id',$parent_id)->get();

        $output='';

        if($subcategories  !=''){

            $output .='<option value="">Select your category</option>';

        foreach($subcategories as $s){

           $output .='<option value="'.$s->id.'">'.$s->sub_category_name.'</option>';
        }
    }

        return response($output);
    }

    public function subtype(Request $request){

        $sub_category_id=$request->sub_cat_id;

        $subcategories = DB::table('product_type')->where('sub_category_id',$sub_category_id)->get();

        $output='';

        if($subcategories  !=''){

        $output .='<option value="">Select your sub category</option>';

        foreach($subcategories as $s){

           $output .='<option value="'.$s->id.'">'.$s->name.'</option>';
        }
    }

        return response($output);
    }

    public function store_add_a_product_info(Request $request){

        $validated=$request->validate([
            'product_price'=>'required',
            'duration'=>'required',
            'category_id'=>'required',
            'product_name'=>'required',
            'color'=>'required',
        ]);

        $product_price=$request->input('product_price');

        $duration=$request->input('duration');

        $category_id=$request->input('category_id');

        $sub_category_id=$request->input('sub_category_id');

        $product_type_id=$request->input('product_type');

        $product_name=$request->input('product_name');

        $color=$request->input('color');

        $size_id=$request->input('size_id');

        DB::table('product')->insert(['product_image'=>NULL,'product_price'=>$product_price ,'duration'=>$duration,'category_id'=>$category_id,'sub_category_id'=>$sub_category_id,'product_type_id'=>$product_type_id,'product_name'=>$product_name,'color'=>$color,'size_id'=>$size_id]);

        $product_id=DB::table('product')->max('id');

        $file=$request->file('m_product_image');

        if($file){

            foreach($file as $f){

                $imagename='';

                $destination_path='uploads';

                $imagename=time().'_'.$f->getClientOriginalName();

                $f->move($destination_path,$imagename);

                DB::table('m_product_image')->insert(['m_product_image'=>$imagename,'product_id'=>$product_id]);
            }
        }

        return redirect('/vender/a_product')->with('error','data submited successfully!!');
    }

    public function delete_a_product_data($id){

        $userdata=DB::table('product')->where('id',$id)->get();

        $image=$userdata[0]->product_image;

        if($image){
            unlink(public_path('/uploads/'.$image));
        }

        $image_file=DB::table('m_product_image')->where('product_id', $id)->get();

                    if($image_file !=''){

                      foreach($image_file as $pi){


                          if ($pi->m_product_image!=''){

                            unlink(public_path("/uploads/".$pi->m_product_image));
                          }

                      }
 
                  }

        DB::table('m_product_image')->where('product_id',$id)->delete();

        DB::table('product')->where('id',$id)->delete();

        return redirect('/vender/a_product')->with('error','data deleted successfully!!');
    }

    public function update_a_product_data($id){

        $userdata=DB::table('product')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['product_image']=$userdata[0]->product_image;

        $data['product_price']=$userdata[0]->product_price;

        $data['duration']=$userdata[0]->duration;

        $data['category_id']=$userdata[0]->category_id;

        $data['sub_category_id']=$userdata[0]->sub_category_id;

        $data['product_type_id']=$userdata[0]->product_type_id;

        $data['product_name']=$userdata[0]->product_name;

        $data['color']=$userdata[0]->color;

        $data['size_id']=$userdata[0]->size_id;

        $size_id=$userdata[0]->size_id;

        $size_name=DB::table('size_type')->where('id',$size_id)->get();

        if(count($size_name) == 0){

            $data['size_name']="none";
        }else{

            $data['size_name']=$size_name[0]->name;
        }
        
        $size=DB::table('size_type')->get();

        $data['size']=$size;

        $category=DB::table('category')->get();

        $data['category']=$category;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        $product_type=DB::table('product_type')->get();

        $data['product_type']=$product_type;

        $product_image=DB::table('m_product_image')->where('product_id',$id)->get();

        $data['product_image']=$product_image;





        return view('vender.update_a_product_data',$data);
    }

    public function store_update_a_product_data(Request $request,$id){

        $validated=$request->validate([
            'product_price'=>'required',
            'duration'=>'required',
            'category_id'=>'required',
            'product_name'=>'required',
        ]);

        $product_price=$request->input('product_price');

        $duration=$request->input('duration');

        $category_id=$request->input('category_id');

        $sub_category_id=$request->input('sub_category_id');

        $product_type_id=$request->input('product_type_id');

        $product_name=$request->input('product_name');

        $color=$request->input('color');

        $size_id=$request->input('size_id');

        $file=$request->file('product_image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file=move($destination_path,$imagename);

            if($oldimage){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('product')->where('id',$id)->update(['product_image'=>$imagename]);
        }

        DB::table('product')->where('id',$id)->update(['product_price'=>$product_price ,'duration'=>$duration,'category_id'=>$category_id,'sub_category_id'=>$sub_category_id,'product_type_id'=>$product_type_id,'product_name'=>$product_name,'color'=>$color,'size_id'=>$size_id]);

        return redirect('/vender/a_product')->with('error','data updated successfully!!');
    }

    public function delete_product_image($id){

        $userdata=DB::table('m_product_image')->where('id',$id)->get();

        $image=$userdata[0]->m_product_image;

        $product_id=$userdata[0]->product_id;

        if($image){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('m_product_image')->where('id',$id)->delete();

        return redirect('/vender/update_a_product_data/'.$product_id);
    }

    public function update_product_image($id){

        $userdata=DB::table('m_product_image')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['m_product_image']=$userdata[0]->m_product_image;

        return view('vender.update_product_image',$data);
    }

    public function store_update_product_image(Request $request,$id){

        $file=$request->file('m_product_image');

        $imagename='';

        $oldimage=$request->input('oldimage');

        if($file){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('m_product_image')->where('id',$id)->update(['m_product_image'=>$imagename]);
        }

        $userdata=DB::table('m_product_image')->where('id',$id)->get();

        $product_id=$userdata[0]->product_id;

        return redirect('/vender/update_a_product_data/'.$product_id);
    }

    public function product_type(){

        $userdata=DB::table('product_type')->get();

        $data['userdata']=$userdata;

        return view('vender.type_of_product',$data);
    }

    public function add_product_type(){

        $userdata=DB::table('category')->get();

        $data['userdata']=$userdata;

        return view('vender.add_product_type',$data);
    }

    public function store_add_product_type(Request $request){

        $validated=$request->validate([
            'product_type'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',

        ]);

        $product_type=$request->input('product_type');

        $category_id=$request->input('category_id');

        $sub_category_id=$request->input('sub_category_id');



        $category=DB::table('category')->where('id',$category_id)->get();

        $category_name=$category[0]->category;
        
        $sub_category_data=DB::table('sub_category')->where('id',$sub_category_id)->get();

        $sub_category_name=$sub_category_data[0]->sub_category_name;



        DB::table('product_type')->insert(['name'=>$product_type, 'sub_category_id'=>$sub_category_id ,'sub_category_name'=>$sub_category_name , 'category_id'=>$category_id , 'category'=>$category_name]);

        return redirect('/vender/product_type')->with('error','data submited successfully!!');
    }

    public function delete_product_type($id){

        DB::table('product_type')->where('id',$id)->delete();

        return redirect('/vender/product_type')->with('error','data deleted successfully!!');
    }


    public function update_product_type($id){

        $userdata=DB::table('product_type')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['product_type']=$userdata[0]->name;

        $data['sub_category_id']=$userdata[0]->sub_category_id;

        $data['sub_category_name']=$userdata[0]->sub_category_name;

        $data['category_id']=$userdata[0]->category_id;

        $data['category']=$userdata[0]->category;

        $category_data=DB::table('category')->get();

        $data['category_data']=$category_data;

        return view('vender.update_product_type',$data);

    }

    public function store_update_product_type(Request $request,$id){

        $validated=$request->validate([
            'product_type'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',

        ]);

        $product_type=$request->input('product_type');

        $category_id=$request->input('category_id');

        $sub_category_id=$request->input('sub_category_id');



        $category=DB::table('category')->where('id',$category_id)->get();

        $category_name=$category[0]->category;
        
        $sub_category_data=DB::table('sub_category')->where('id',$sub_category_id)->get();

        $sub_category_name=$sub_category_data[0]->sub_category_name;

        DB::table('product_type')->where('id',$id)->update(['name'=>$product_type, 'sub_category_id'=>$sub_category_id ,'sub_category_name'=>$sub_category_name , 'category_id'=>$category_id , 'category'=>$category_name]);

        return redirect('/vender/product_type')->with('error','data updated successfully!!');
    }
}
