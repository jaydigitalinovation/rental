@extends('vender.layout.header_footer')

@section('content')

<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 -->
  <div class="page my-4 title1">
        <div class="mt-5">
            <h4 class="mb-4">Details List</h4>
            <div class="detail">
                <div class="form">      
                  <form method="post" action="{{url('/vender/store_update_a_product_data')}}/{{$id}}" enctype="multipart/form-data">  

                  	@csrf

                            <div class="part">
                              <div class="col-md-12 label">
                                 <label>Product_image</label>
                              </div>
                              <div class="col-md-12 d-flex justify-content-between">

                                @foreach($product_image as $pi)
                                 <img id="blah1" src="/uploads/{{$pi->m_product_image}}" width="100px" height="100px" alt="">
                                 <a href="{{url('/vender/update_product_image')}}/{{$pi->id}}"><i class="fal fa-pencil"></i></a>
                                 <a href="{{url('/vender/delete_product_image')}}/{{$pi->id}}"><i class="fal fa-trash-alt"></i></a>
                                 @if($errors->has('product_image')) <p class="error_mes">{{ $errors->first('product_image') }}</p> @endif

                                @endforeach
                                 
                               </div>   
                            </div>

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
                                      <input type="text" placeholder="product_price" name="product_price" value="{{$product_price}}">
                                      @if($errors->has('product_price')) <p class="error_mes">{{ $errors->first('product_price') }}</p> @endif
                                  </div>   
                            </div>

                            <div class="part">
                                  <div class="col-md-12 label">
                                      <label>duration</label>
                                  </div>
                                  <div class="col-md-12 data">
                                      <input type="text" placeholder="duration" name="duration" value="{{$duration}}">
                                      @if($errors->has('duration')) <p class="error_mes">{{ $errors->first('duration') }}</p> @endif
                                  </div>   
                            </div>


                            <div class="part">
                              <div class="col-md-12 label">
                                  <label>Category_id</label>
                              </div>
                              <div class="col-md-12 data">
                                <select name="category_id" id="category">

                                @foreach($category as $c)
                                @if($c->id==$category_id)
                                    <option value="{{$category_id}}">{{$c->category}}</option>
                                @endif
                                @endforeach

                                  @foreach($category as $c)
                                  <option value="{{$c->id}}">{{$c->category}}</option>
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
                                    @foreach($sub_category  as $sc)
                                    @if($sc->id==$sub_category_id)
                                    <option value="{{$sc->id}}">{{$sc->sub_category_name}}</option>
                                    @endif
                                    @endforeach
                                  </select>
                              </div>   
                          </div> 

                          <div class="part" id="type_id">
                              <div class="col-md-12 label">
                                  <label>product_type</label>
                              </div>
                              <div class="col-md-12 data">
                                  <select name="product_type_id" id="producttype">
                                    @foreach($product_type  as $pt)
                                    @if($pt->id==$product_type_id)
                                    <option value="{{$pt->id}}">{{$pt->name}}</option>
                                    @endif
                                    @endforeach
                                  </select>
                              </div>   
                          </div>

                            <div class="part">
                                  <div class="col-md-12 label">
                                      <label>product_name</label>
                                  </div>
                                  <div class="col-md-12 data">
                                      <input type="text" placeholder="product_name" name="product_name" value="{{$product_name}}">
                                      @if($errors->has('product_name')) <p class="error_mes">{{ $errors->first('product_name') }}</p> @endif
                                  </div>   
                            </div> 

                            <div class="part">
                                  <div class="col-md-12 label">
                                      <label>color</label>
                                  </div>
                                  <div class="col-md-12 data">
                                      <input type="text" placeholder="color" name="color" value="{{$color}}">
                                      @if($errors->has('color')) <p class="error_mes">{{ $errors->first('color') }}</p> @endif
                                  </div>   
                            </div> 

                            <div class="part" id="size_id" style="display:none;">
                              <div class="col-md-12 label">
                                  <label>Select size</label>
                              </div>
                              <div class="col-md-12 data">
                                <select name="size_id">
                                  <option value="{{$size_id}}">{{$size_name}}</option>
                                  @foreach($size as $s)
                                  <option value="{{$s->id}}">{{$s->name}}</option>
                                  @endforeach
                                </select>
                            </div> 
                          </div>

                          <button type="submit" class="glow-on-hover my-5 mx-auto">update</button>
                    </form>       
                </div>  
            </div>
        </div>
      </div>


      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script type="text/javascript">


  /*$('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
*/
  
</script>

      <style type="text/css">
        

    .glow-on-hover {
        width: 220px;
        height: 50px;
        color: #fff;
        background: #111;
        position: relative;
        z-index: 0;
        border-radius: 10px;
    }

    .glow-on-hover:before {
        content: '';
        background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
        position: absolute;
        top: -2px;
        left:-2px;
        background-size: 400%;
        z-index: -1;
        filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing 20s linear infinite;
        opacity: 0;
        transition: opacity .3s ease-in-out;
        border-radius: 10px;
    }
    .glow-on-hover:hover:before {
        opacity: 1;
    }
    .glow-on-hover:after {
        z-index: -1;
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #111;
        left: 0;
        top: 0;
        border-radius: 10px;
    }

    @keyframes glowing {
        0% { background-position: 0 0; }
        50% { background-position: 400% 0; }
        100% { background-position: 0 0; }
    }
</style>


      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <script type="text/javascript">

        
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


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

              $('#type_id').hide();
              
              $('#subcategory').empty();

               $('#subcategory').html(data);

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


















@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script type="text/javascript">
        
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




            
           }
          });
          });
        });
</script>