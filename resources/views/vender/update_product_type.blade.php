@extends('vender.layout.header_footer')

@section('content')

<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 -->
  <div class="page my-4 title1">
        <div class="mt-5">
            <h4 class="mb-4">Details List</h4>
            <div class="detail">
                <div class="form">      
                  <form method="post" action="{{url('/vender/store_update_product_type')}}/{{$id}}" enctype="multipart/form-data">  

                  	@csrf

                            <div class="part">
                                  <div class="col-md-12 label">
                                      <label>product_type</label>
                                  </div>
                                  <div class="col-md-12 data">
                                      <input type="text" placeholder="product_type" name="product_type" value="{{$product_type}}">
                                      @if($errors->has('product_type')) <p class="error_mes">{{ $errors->first('product_type') }}</p> @endif
                                  </div>   
                            </div>


                            <div class="part">
                              <div class="col-md-12 label">
                                  <label>Category_id</label>
                              </div>
                              <div class="col-md-12 data">
                                <select name="category_id" id="category">

                                    <option value="{{$category_id}}">{{$category}}</option>

                                  @foreach($category_data as $c)
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
                                    <option value="{{$sub_category_id}}">{{$sub_category_name}}</option>
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