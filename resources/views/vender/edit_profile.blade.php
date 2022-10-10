@extends('vender.layout.header_footer')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/home.css">

<style type="text/css">
.co_edit {
    padding: 20px 0 80px;
}
.in_manu {
    background: #f5f6f9;
    margin: 30px 0;
}
.in_manu .container{
   max-width: 1250px!important;
}
.in_manu .breadcumbs1 {
    padding: 13px 72px;
}
.box-button {
    text-align: right;
    padding-top: 40px;
    position: relative;
    right: -15px;
}
.edit_image img {
    width:10%;
    border-radius: 10px;
    margin: 0 auto;
}
.nav1 {
    display: block!important;
    width: 40%;
    margin: 0 0 0 auto !important;
}
.edit_image {
    padding-bottom: 20px;
}
.edit_inner {
    padding-bottom: 20px;
}
.edit1 {
   width: 20%;
    padding-bottom: 20px;
}
.edit2 {
   width: 40%;
    padding-bottom: 20px;
}
.edit3 {
    width: 100%;
    padding-bottom: 20px;
}
.col-md-12.data {
    padding-left: 0;
}
.col-md-12.label {
    padding-left: 0;
}
.edit1 input {
    padding: 8px 10px;
    width:100%;
    border: 1px solid #adb5bd;
    border-radius: 7px;
}
.edit_d-flex {
    display: flex;
    justify-content: center;
}
.edit1 label {
    font-weight: 600;
}
.edit_btn button {
    border: none;
    padding: 8px 60px;
    background-color: #df453e;
    color: white;
    font-size: 20px;
    font-weight: 600;
    border-radius: 7px;
}
.edit_sub {
   text-align: center;
   padding-left: 90px;
}
.edit_btn {
    padding-top: 20px;
    text-align: center;
}
.edit_main {
    padding-top: 40px;
}
ul.tabs{
   margin: 0px;
   padding: 0px;
   list-style: none;
   text-align: center;
}
ul.tabs li{
   background: none;
   color: #222;
   display: inline-block;
   padding: 10px 40px;
   cursor: pointer;
}
ul.tabs li.current {
    background: #1b3e41;
    color: #f5f6f9;
}
.tab-content{
   display: none;
   padding: 15px;
}
.tab-content.current{
   display: inherit;
}
.e_main{
   width: 50%;
   margin: 0 auto;
}
.e_main {
    width: 25%;
    margin: 0 auto;
    padding-top: 40px;
}
.co_edit textarea {
    overflow: auto;
    resize: vertical;
    width: 100%;
    height: 100px;
    border-radius: 7px;
    border: 1px solid #adb5bd;
}

</style>


   <div class="in_manu">
      <div class="container">
         <ul class="breadcumbs1">
            <li><a href="index.html">Home</a>  <i class="fal fa-chevron-double-right"></i></li>
            <li>Edit Profile</li>
         </ul>
      </div>
   </div>
   <div class="co_edit">
      <!-- <div class="container"> -->
         <ul class="tabs">
            <li class="tab-link current" data-tab="tab-1">Edit Profile</li>
            <li class="tab-link" data-tab="tab-2">Change Password</li>
         </ul>
         <div id="tab-1" class="tab-content current">
            <form method="post" enctype="multipart/form-data" action="{{url('/vender/store_update_profile')}}/{{$id}}">
               @csrf
            <div class="edit_main">
               <div class="edit_inner">
                  <div class="edit_image">
                     <img class="mx-auto" id="blah" src="/uploads/{{$image}}" alt="">
                  </div>
                  <div class="edit_sub">
                     <input type="file" name="image" onchange="readURL(this);">
                     
                     <input type="hidden" name="oldimage" value="{{$image}}">
                  </div>  
               </div>
               <div class="edit_d-flex">
                  <div class="edit1">
                     <div class="col-md-12 label">
                        <label>Name</label>
                     </div>
                     <div class="col-md-12 data">
                        <input type="text"  name="name" value="{{$name}}">
                     </div>   
                  </div>
                  <div class="edit1">
                     <div class="col-md-12 label">
                        <label>Phone Number</label>
                     </div>
                     <div class="col-md-12 data">
                        <input type="text" name="phone_no"  value="{{$phone_no}}">
                     </div>   
                  </div>
               </div>
               <div class="edit_d-flex">
                  <div class="edit1 edit2">
                     <div class="col-md-12 label">
                        <label>Email</label>
                     </div>
                     <div class="col-md-12 data">
                        <input type="text"  name="email" value="{{$email}}">
                     </div>   
                  </div>
               </div>
               <div class="edit_d-flex">
                  <div class="edit1 edit2">
                     <div class="col-md-12 label">
                        <label>Address</label>
                     </div>
                     <div class="col-md-12 data">
                        <textarea name="address">{{$address}}</textarea>
                     </div>   
                  </div>
               </div>
               <div class="edit_btn">
                  <button>Submit</button>
               </div>
            </div>
            </form>
         </div>       
         <div id="tab-2" class="tab-content">
            <form method="post" enctype="multipart/form-data" action="{{url('/vender/store_password')}}/{{$id}}">
               @csrf
             <div class="e_main">
                 <div class="edit1 edit3">
                     <div class="col-md-12 label">
                        <label>Change Password</label>
                     </div>
                     <div class="col-md-12 data">
                        <input type="text"  name="password">
                     </div>   
                  </div>
                  <div class="edit1 edit3">
                     <div class="col-md-12 label">
                        <label>Password</label>
                     </div>
                     <div class="col-md-12 data">
                        <input type="text"  name="c_password">
                     </div>   
                  </div>
                  <div class="edit_btn">
                  <button>Submit</button>
               </div>
             </div>
          </form>
         </div>
    <!--   </div> -->
   </div>

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

        $(document).ready(function(){
   
         $('ul.tabs li').click(function(){
            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');

            $(this).addClass('current');
            $("#"+tab_id).addClass('current');
         });

      });

      </script>

@endsection