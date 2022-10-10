@extends('vender.layout.header_footer')

@section('content')

<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css"> -->

  <div class="page my-4 title1" id="AddHomeModel">
        <div class="mt-5">
            <h4 class="mb-4">Details List</h4>
            <div class="detail">

              <div id="success_message"></div>
                <div class="form"> 

                  <!-- action="{{url('/admin/store_add_home_info')}}" -->

                  <ul id="saveform_errList"></ul>
                  <form method="post" enctype="multipart/form-data" id="addData" action="{{url('/vender/store_add_a_product_info')}}">  

                  	@csrf
                          <div class="part">
                              <div class="col-md-12 label">
                                 <label>M_Product_image</label>
                              </div>
                              <div class="col-md-12">
                                 <input type="file" name="m_product_image[]" multiple class="product_image" onchange="readURL(this);">
                                 @if($errors->has('m_product_image')) <p class="error_mes">{{ $errors->first('m_product_image') }}</p> @endif
                                 <img id="blah" src="#" alt="">
                               </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Product_price</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="text" placeholder="product_price" name="product_price" value="" class="product_price">
                                  @if($errors->has('product_price')) <p class="error_mes">{{ $errors->first('product_price') }}</p> @endif
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Duration in days</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="text" placeholder="duration" name="duration" value="" class="duration">
                                  @if($errors->has('duration')) <p class="error_mes">{{ $errors->first('duration') }}</p> @endif
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Category_id</label>
                              </div>
                              <div class="col-md-12 data">
                                <select name="category_id" id="category">
                                  <option>Select category</option>
                                  @foreach($userdata as $u)
                                  <option value="{{$u->id}}">{{$u->category}}</option>
                                  @endforeach
                                </select>
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Sub_category</label>
                              </div>
                              <div class="col-md-12 data">
                                  <select name="sub_category_id" id="subcategory">
                                    <option>Select sub_category</option>
                                  </select>
                              </div>   
                          </div>

                          <div class="part" id="type_id" style="display: none;">
                              <div class="col-md-12 label">
                                  <label>Select Product Type</label>
                              </div>
                              <div class="col-md-12 data">
                                  <select name="product_type" id="producttype">
                                    <option>Select product_type</option>
                                  </select>
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>product_name</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="text"  placeholder="product_name" name="product_name" value="" class="product_name">
                                  @if($errors->has('product_name')) <p class="error_mes">{{ $errors->first('product_name') }}</p> @endif
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Product Color</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="text"  placeholder="color" name="color" value="" class="color">
                                  @if($errors->has('color')) <p class="error_mes">{{ $errors->first('color') }}</p> @endif
                              </div>   
                          </div>

                          <div class="part" id="size_id" style="display: none;">
                              <div class="col-md-12 label">
                                  <label>Select size</label>
                              </div>
                              <div class="col-md-12 data">
                                <select name="size_id">
                                  <option>Select product size</option>
                                  @foreach($size as $s)
                                  <option value="{{$s->id}}">{{$s->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                          </div>


                          <button type="submit" class="glow-on-hover my-5">submit form</button>
                    </form>       
                </div>  
            </div>
        </div>
      </div>






@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script type="text/javascript">

  $(document).ready(function () {
          $('#subcategory').on('change',function(e) {
            var sub_cat_id = e.target.value;


        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      });

        $.ajax({
          url:"/vender/subtype",
          type:"get",
          data: {
             sub_cat_id: sub_cat_id
          },
        success:function(data) {

              $('#type_id').show();
              
              $('#producttype').empty();

               $('#producttype').html(data);

           }
          });
          });
        });
        
        $(document).ready(function () {
          $('#category').on('change',function(e) {
            var cat_id = e.target.value;


        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      });

        $.ajax({
          url:"/vender/subcat",
          type:"POST",
          data: {
             cat_id: cat_id
          },
        success:function(data) {
              
              $('#subcategory').empty();

               $('#subcategory').html(data);

               $('#type_id').hide();

               if(cat_id==1){

                $('#size_id').show();
               }else{

                $('#size_id').hide();
               }


            
           }
          });
          });
        });
</script>


<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){

    $(document).on('click' , '.add_info' ,function(e){

      e.preventDefault();

      let formData=new FormData($('#addData')[0]);

      var image=$("input[type=file]")[0].files[0];

      formData.append('fieldImg', image);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $.ajax({

        type:"post",
        url:"/admin/store_add_home_info",
        data:formData,
        enctype: 'multipart/form-data',
        mimeType: 'multipart/form-data',
        contentType:false,
        processData:false,
        datatype: "json",
        success:function(response){

          if(response.status==400){

            $("#saveform_errList").html();
            $("#saveform_errList").addClass('alert alert-success');
            $.each(response.errors , function(key , err_values){
              $('#saveform_errList').append('<li>'+err_values+'</li>');
            });
          }else{

            window.location.href = "{{url('admin/home')}}";
          }
        }
      });
    });
  });
</script> -->