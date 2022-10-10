@extends('vender.layout.header_footer')

@section('content')



@if(session()->has('error'))
              <div class="alert alert-success" id="newhide">
                  {{session()->get('error')}}
              </div>
              @endif


  <div class="page title1" style="display: block;">
  <div id="saveform_errList"></div>
          <div class="mt-5">
              <div class="list1">
                  <h4 class="mb-4">All Products</h4>
                  <button class="btn1"><a href="{{url('/vender/add_a_product_info')}}" style="color:black;">ADD</a></button>
              </div>
              <div class="detail table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Product_image</th>
                            <th>Product_price</th>
                            <th>Duration in days</th>
                            <th>Category_name</th>
                            <th>Sub_category_name</th>
                            <th>Product_type_name</th>
                            <th>Product_name</th>
                            <th>Product Color</th>
                            <th>Product Size</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                      </thead>

                      @foreach($userdata as $key=>$u)

                      <tbody>
                          <tr class="data_{{$u->id}}">
                            <td>{{$key+1}}</td>
                            <td>
                              @foreach($image_data as $i)

                              @if($i->product_id==$u->id)

                              <img src="/uploads/{{$i->m_product_image}}" width="60" height="60">

                              @break
                              
                              @endif

                              @endforeach

                            </td>
                              <td>{{$u->product_price}}</td>
                              <td>{{$u->duration}}</td>

                              <td>
                              @foreach($category as $c)

                              @if($c->id==$u->category_id)

                             {{$c->category}}

                              @endif

                              @endforeach
                              </td>

                              <td>
                              @foreach($sub_category as $sc)

                              @if($sc->id==$u->sub_category_id)

                             {{$sc->sub_category_name}}

                              @endif

                              @endforeach
                              </td>


                              <td>
                              @foreach($product as $p)

                              @if($p->id==$u->product_type_id)

                             {{$p->name}}

                              @endif

                              @endforeach
                              </td>


                              <td>{{$u->product_name}}</td>
                              <td>{{$u->color}}</td>
                              <td>
                              @foreach($size as $s)

                              @if($s->id==$u->size_id)

                             {{$s->name}}

                              @endif

                              @endforeach
                              </td>

                              <td>
                                <button class="btn2 glow-on-hover"><a href="{{url('/vender/update_a_product_data')}}/{{$u->id}}"><i class="fal fa-pencil"></i></a></button>
                              </td>
                              <td>
                                <button class="glow-on-hover"><a href="{{url('/vender/delete_a_product_data')}}/{{$u->id}}"><i class="fal fa-trash-alt"></i></a></button>
                                <!-- <button type="button" value="{{$u->id}}" id="delete_data" class="btn3 btn0 glow-on-hover"><i class="fal fa-trash-alt"></i></button> -->
                              </td>
                          </tr>
                      </tbody>
                      
                      @endforeach
                  </table>
              </div>
          </div>
      </div>


@endsection


<style type="text/css">
  .glow-on-hover {
        width: 50px!important;
    }
</style>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

  setTimeout(function() { $(".alert").fadeOut(1500);},5000);
  


  /*$(document).ready(function(){

  $(document).on('click' , '#delete_data', function(e) {

        e.preventDefault();
        var my_id = $(this).val();

          alert("Are you sure to delete whole data??");

          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });

          $.ajax({

        type: "get",
        url: "/admin/delete_home_data/"+my_id,
        datatype: "json",
        success:function(response){

          if(response.status == 200)
          {

            $('#saveform_errList').text(response.message);
            $('#saveform_errList').addClass('alert alert-success');
            $('.data_'+my_id).hide();
         
          }else{

             alert("somthing went wrong!!");

          }

          }
      });
    });
  });
  */
</script>
