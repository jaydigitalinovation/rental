<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>RENTAL SYSTEM</title>
   <link rel="stylesheet" type="text/css" href="/css/home.css">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
   <link rel="icon" href="/image/logo.png">
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
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
<body class="body">
   <div class="co_header" id="dynamic">
      <div class="container">
         <div class="row row1">
            <div class="col-lg-3 col-md-3">
               <div class="logo">
                  <a href="index.html"><img src="/image/logo.png"></a>
               </div>
            </div> 
            <div class="col-lg-6 col-md-6">
                <div class="search-box">
                  <input type="text" placeholder="Search Products..." name="product">
                  <button>search</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
               
            </div>
         </div>
      </div>
   </div>
   <div class="mobile_manu">
      <div class="row row1">
         <div class="col-md-6 col-6">
           <div class="logo">
             <a href="index.html"><img src="/image/logo.png"></a>
           </div>
         </div>
         <div class="col-md-6 col-6">
            <div class="item">
               <i class="icon1 fas fa-search"></i>
               <a href="login.html"><i class="fas fa-user-alt"></i></a>
               <div class="mobile-menu">
                  <div id="mySidepanel" class="sidepanel" style="width: 0px;">
                     <div class="m_menu">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="far fa-times"></i></a>
                        <nav class="animated bounceInDown">
                           <ul>
                              <li class="sub-menu link1"><a href="#">Cloth</a><div class="fa fa-caret-down right"></div>
                                 <ul style="display: none;">
                                    <li><a href="men-product.html">Men</a></li>
                                    <li><a href="men-product.html">women</a></li>
                                    <li><a href="men-product.html">Kids</a></li>
                                 </ul>
                              </li>
                              <li class="sub-menu link1"><a href="#">Electronics</a> <div class="fa fa-caret-down right"></div>
                                 <ul style="display: none;">                      
                                    <li><a href="men-product.html">laptop</a></li>                      
                                 </ul>
                              </li>
                              <li class="sub-menu link1"><a href="#">Events</a> <div class="fa fa-caret-down right"></div>
                                 <ul style="display: none;">
                                    <li><a href="men-product.html">marriage events</a></li>
                                    <li><a href="men-product.html">birthday events</a></li>
                                 </ul>
                              </li>
                              <li class="sub-menu link1"><a href="#">Appliances</a> <div class="fa fa-caret-down right"></div>
                                 <ul style="display: none;">
                                    <li><a href="men-product.html">Air Conditioners</a></li>
                                    <li><a href="men-product.html">Air Coolers</a></li>
                                    <li><a href="men-product.html">Microwaves & Induction</a></li>
                                 </ul>
                              </li>
                              <li class="sub-menu link1"><a href="#">Vehicle</a> <div class="fa fa-caret-down right"></div>
                                 <ul style="display: none;">
                                    <li><a href="men-product.html">car</a></li>
                                    <li><a href="men-product.html">bicycle</a></li>
                                    <li><a href="men-product.html">tempo</a></li>
                                 </ul>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                     <button class="openbtn" onclick="openNav()"><i class="far fa-bars"></i></button> 
               </div>
            </div>
         </div>
      </div>
      <div class="search-box1">
         <form>
            <input type="text" placeholder="search &amp; enter" name="search" value="">
         </form>
         <a class="srh-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
      </div>
   </div>
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
            <form method="post" enctype="multipart/form-data" action="{{url('/user/store_update_profile')}}/{{$id}}">
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
            <form method="post" enctype="multipart/form-data" action="{{url('/user/store_change_password')}}/{{$id}}">
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
   <div class="main_footer">
      <div class="container1">
         <div class="footer">
            <div class="container">
               <div class="footer_inner">
                  <div class="shape-1"></div>
                  <div class="left-/image"></div>
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="footer_silder slick-initialized slick-slider">
                            <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 1592px; left: -398px;"><div class="footer_img slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true" tabindex="-1" style="width: 398px;">
                               <img src="/image/f_img4.webp">
                               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                               <button tabindex="-1"><a href="#" tabindex="-1">Book Now</a></button>
                            </div><div class="footer_img slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 398px;">
                               <img src="/image/f_img3.jpg">
                               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                               <button tabindex="0"><a href="#" tabindex="0">Book Now</a></button>
                            </div><div class="footer_img slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide11" style="width: 398px;">
                               <img src="/image/f_img4.webp">
                               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                               <button tabindex="-1"><a href="#" tabindex="-1">Book Now</a></button>
                            </div><div class="footer_img slick-slide slick-cloned" data-slick-index="2" id="" aria-hidden="true" tabindex="-1" style="width: 398px;">
                               <img src="/image/f_img3.jpg">
                               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                               <button tabindex="-1"><a href="#" tabindex="-1">Book Now</a></button>
                            </div></div></div>
                            
                        </div>
                     </div>
                     <div class="col-lg-5">
                        <div class="footer_right">
                           <div class="info-footer">
                                  <div class="footer-content">
                                      <div class="footer-title"><h4>Contact Details</h4></div>                   
                                      <div class="info">
                                          <ul>
                                              <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <p>Shop No. 19, Shree Vinayak Homes Apartment, Opp. I, T.I, Bilimora, Maharashtra 396325</p>
                                              </li>
                                              <li>
                                                  <i class="far fa-phone-alt"></i>
                                                  <p><a href="tel:+91-9558561212">+91-9558561212</a> /
                                                    <a href="tel:+91-9427112299">+91-9427112299</a></p>
                                              </li>
                                              <li>
                                                  <i class="fas fa-envelope-open-text"></i>
                                                  <p><a href="mailto:info@digitalinovation.com">info@digitalinovation.com</a></p>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="footer-last">
                           <div class="footer-title"><h4>What We Do</h4></div>
                           <ul>
                              <li class="page_item"><a href="#">About Us</a></li>
                              <li class="page_item"><a href="#">Contact</a></li>
                              <li class="page_item"><a href="#">Renting Policy</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
               <div class="container">
                   <div class="inner">
                       <div class="copyright">Copyright © 2020 Langong. All Rights Reserved.</div>
                        <div class="social-links">
                      <ul>
                          <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                          <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                          <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                          <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
                      </ul>
                  </div>
                   </div>
               </div>
           </div>
      </div>
   </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script type="text/javascript" src="https://cldup.com/S6Ptkwu_qA.js"></script>

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


         function openNav() {
            document.getElementById("mySidepanel").style.width = "100%";
        }
        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }

      $(document).ready(function(){
            $(".font").click(function(){
                 $(".search-box").slideDown("slow");
             });

            $(".search-close").click(function(){
                $(".search-box").slideUp("slow");
            });
        });

        $(document).ready(function(){
            $(".icon1").click(function(){
                $(".search-box1").slideDown("slow");
            });
            $(".search-box1 a").click(function(){
                $(".search-box1").slideUp("slow");
            });
        });

        $('.search-toggle').addClass('closed');
        $('.search-toggle .search-icon').click(function(e) {
            if ($('.search-toggle').hasClass('closed')) {
                $('.search-toggle').removeClass('closed').addClass('opened');
                $('.search-toggle, .search-container').addClass('opened');
                $('#search-terms').focus();
            } else {
                $('.search-toggle').removeClass('opened').addClass('closed');
                $('.search-toggle, .search-container').removeClass('opened');
            }
        });
      
      $('.sub-menu ul').hide();
      $(".sub-menu .fa.fa-caret-down").click(function () {
         $(this).parent(".sub-menu").children("ul").slideToggle("100");
         $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
      });
      
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
</body>