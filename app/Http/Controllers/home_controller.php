<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Response;
class home_controller extends Controller
{
    public function index(){

        $banner_data=DB::table('home')->get();

        $data['banner_data']=$banner_data;

        $category_data=DB::table('category')->get();

        $data['category_data']=$category_data;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        $cloth_data=DB::table('product')->get();

        $data['cloth_data']=$cloth_data;

        $product_image=DB::table('m_product_image')->get();

        $data['product_image']=$product_image;

        return view('welcome',$data);
    }


    public function product($id){

        $category_data=DB::table('category')->get();

        $data['category_data']=$category_data;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        $product_data=DB::table('product')->where('sub_category_id',$id)->paginate(4);

        $data['product_data']=$product_data;

        $product_image=DB::table('m_product_image')->get();

        $data['product_image']=$product_image;

        return view('product',$data);
    }

    public function product_detail($id){

        $product_data=DB::table('product')->where('id',$id)->get();

        $data['product_data']=$product_data;

        $data['sub_category_id']=$product_data[0]->sub_category_id;

        $category_id=$product_data[0]->category_id;

        $sub_category_id=$product_data[0]->sub_category_id;

        $product_data_all=DB::table('product')->where('sub_category_id',$sub_category_id)->where('id', '!=' , $id)->get();

        $data['product_data_all']=$product_data_all;

        $product_image_all=DB::table('m_product_image')->get();

        $data['product_image_all']=$product_image_all;

        $category_data=DB::table('category')->get();

        $data['category_data']=$category_data;

        $category_name=DB::table('category')->where('id',$category_id)->get();

        $data['category_name']=$category_name;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        $product_image=DB::table('m_product_image')->where('product_id',$id)->get();

        $data['product_image']=$product_image;

        $size=DB::table('size_type')->get();

        $data['size']=$size;

        return view('product_detail',$data);
    }

    public function book_now($id){

        $product_data=DB::table('product')->where('id',$id)->get();

        $data['product_data']=$product_data;

        $category_data=DB::table('category')->get();

        $data['category_data']=$category_data;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        return view('product_booking',$data);
    }

    public function category_product($id){

        $product_data=DB::table('product')->where('sub_category_id',$id)->paginate(4);

        $data['product_data']=$product_data;

        $category_data=DB::table('category')->get();

        $data['category_data']=$category_data;

        $sub_category=DB::table('sub_category')->where('id',$id)->get();

        $data['sub_category']=$sub_category;

        $sub_category_data=DB::table('sub_category')->get();

        $data['sub_category_data']=$sub_category_data;

        $m_product_image=DB::table('m_product_image')->get();

        $data['m_product_image']=$m_product_image;

        return view('category_product',$data);
    }

    public function view_category($id){

        $category_data=DB::table('category')->get();

        $data['category_data']=$category_data;

        $category_name=DB::table('category')->where('id',$id)->get();

        $data['category_name']=$category_name[0]->category;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        $product_data=DB::table('product')->where('category_id',$id)->paginate(4);

        $data['product_data']=$product_data;

        $m_product_image=DB::table('m_product_image')->get();

        $data['m_product_image']=$m_product_image;

        return view('view_category',$data);
    }

    public function search_product(Request $request){

        $request->validate([
            'product'=>'required',
        ]);

        $search=$request->input('product');

        $product=DB::table('product')->where('product_name','LIKE',"%{$search}%")->get()->toArray();

        $product_type_data=DB::table('product_type')->where('name','LIKE',"%{$search}%")->get()->toArray();

        $product_type=DB::table('product_type')->where('category','LIKE',"%{$search}%")->get()->toArray();

        $product_sub_type=DB::table('product_type')->where('sub_category_name','LIKE',"%{$search}%")->get()->toArray();

       

          /*if(count($product) != 0){
                $product_name=$product[0]->product_name;

            }else{
                $product_name="null";
            }*/        

        if(count($product) != 0)
        {
            $output='';

            

            foreach($product as $s){
                
                $product_id=$s->id;

                $product_image=DB::table('m_product_image')->where('product_id',$product_id)->get();

                $image=$product_image[0]->m_product_image;

                $output .='<h3><a href="/search_product_detail/'.$s->product_type_id.'" value="'.$s->product_type_id.'"><img src="/uploads/'.$image.'"style="height:50px;width:50px;"/>'.$s->product_name.'</a></h3>';
            }
            

            foreach($product_type_data as $p){

                $output .='<a class="icon-text" href="/search_product_detail/'.$p->id.'" value="'.$p->id.'">'.$p->name.'<i class="fas fa-search"></i></a>';
            }

             return response($output);

        }
        elseif(count($product_type) != 0)
        {

            $output='';

            foreach($product_type as $p){

                $output .='<a class="icon-text" href="/search_product_detail/'.$p->id.'" value="'.$p->id.'">'.$p->name.'<i class="fas fa-search"></i></a>';
            }

             return response($output);
            
        }

        elseif(count($product_sub_type) != 0)
        {

            $output='';

            foreach($product_sub_type as $p){

                $output .='<a class="icon-text" href="/search_product_detail/'.$p->id.'" value="'.$p->id.'">'.$p->name.'<i class="fas fa-search"></i></a>';
            }

             return response($output);
            
        }

        elseif(count($product_type_data) != 0)
        {

            $output='';

            foreach($product_type_data as $p){

                $output .='<a class="icon-text" href="/search_product_detail/'.$p->id.'" value="'.$p->id.'">'.$p->name.'<i class="fas fa-search"></i></a>';
            }

             return response($output);
            
        }
        else{

            return response()->json([
                'error'=>'data not found',
            ]);
        }

        
    }


    public function search_product_detail($id){

        $category_data=DB::table('category')->get();

        $data['category_data']=$category_data;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        $product_data=DB::table('product')->where('product_type_id',$id)->paginate(4);

        $data['product_data']=$product_data;

        $product_image=DB::table('m_product_image')->get();

        $data['product_image']=$product_image;

        return view('search_product',$data);
    }


    public function all_category(){

        $category_data=DB::table('category')->get();

        $data['category_data']=$category_data;

        $sub_category=DB::table('sub_category')->get();

        $data['sub_category']=$sub_category;

        return view('all_category',$data);
    }
    
}


