
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RENTAL SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="icon" href="image/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<style type="text/css">
	.count-head h3 {
    text-align: center;
    padding-right: 235px;
    padding-bottom: 0px;
    font-size: 20px;
    color: #df453e;
    font-weight: 600;
}
.new-tab .active{
	background-color: orange!important;
	color: white!important;
}
input.d-inline-block {
    width: 15%;
}
.cont.s-signup {
	height: 100%!important;
}
label.form-check-label {
    width: 300px;
    margin: 15px auto 0;
}
button#user_register {
    margin-top: 25px;
    margin-bottom: 25px;
}
.co_login label {
    margin-top: 15px!important;
}
</style>
<body class="body">
	<div class="co_login">
		<div class="row">
			<div class="col-lg-12">
				<div class="cont">
					<div class="count-head">
						<h2>Sign In</h2>
						<!-- <h3 class="nav nav-tabs" role="tablist">

							<a id="login_1" href="#login_1">User Login</a>
							<a id="login_2" href="#login_2">Patner</a>
						</h3> -->
						<ul class="nav new-tab nav-tabs" role="tablist">
						    <li class="nav-item">
						      <a class="nav-link active" data-bs-toggle="tab" href="#login_1">User Login</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-bs-toggle="tab" href="#login_2">Patner</a>
						    </li>
						</ul>
					</div>

					@if(session()->has('error'))
		              <div class="alert alert-success" id="alert_hide">
		                  {{session()->get('error')}}
		              </div>
		              @endif

					<div class="alert alert-success" id="hideDiv" style="display:none;"> </div>

					

					<div class="tab-content">
						<div id="login_1" class="tab-pane active">
							<div class="form sign-in">
								<form method="post" id="authenticate">
									@csrf

							        <label>
	                                    <span>Phone</span>
	                                    <div class="show_code">
	                                        <div class="di_felx">
	                                            <p class="c_code">+91</p>
	                                            <input type="number" name="phone_no" id="phone_no">
	                                            <span class="alert text-danger" id="phone_noError"></span>
	                                            <span class="underline"></span>
	                                        </div>
	                                    </div>
	                                </label>
								    <p class="or">OR</p>
								    <label>
								        <span>Email Address</span>
								        <input type="email" name="email" id="email">
								        
								        <span class="alert text-danger" id="emailError"></span>
								        <span class="underline"></span>
								    </label>
								    <label>
								        <span>Password</span>
								        <input type="password" name="password" autocomplete="off" id="myInput">
								        
								        <span class="alert text-danger" id="passwordError"></span>
								        <input type="checkbox" class="d-inline-block" onclick="myFunction()">Show Password
								        <span class="underline"></span>
								    </label>
								    <ul id="saveform_errList"></ul>
								    
							        <button id="user_login" class="submit" type="submit">Sign In</button>

							        </form>
							        <p class="forgot-pass"><a href="{{url('/user/forget_password')}}">Forgot Password ?</a></p>
							        <div class="extra-login clearfix">
			                            <span>Or Login With</span>
			                        </div>
			                        <div class="social-list">
			                            <a href="#" class="facebook-bg"><i class="fab fa-facebook-f"></i></a>
			                            <a href="#" class="twitter-bg"><i class="fab fa-twitter"></i></a>
			                            <a href="#" class="google-bg"><i class="fab fa-google"></i></a>
			                            <a href="#" class="linkedin-bg"><i class="fab fa-linkedin-in"></i></a>
			                        </div>
			                         <p class="forgot">Buying for work? <span><a href="{{url('/user/register')}}">Create a User account</a></span></p> 
							    </div>
						</div>
					
						<div id="login_2" class="tab-pane fade">
							<div class="form sign-in">
								<form method="post">
									@csrf
							        <label>
	                                    <span>Phone</span>
	                                    <div class="show_code">
	                                        <div class="di_felx">
	                                            <p class="c_code">+91</p>
	                                            <input type="number" name="phone_no" id="vender_phone_no">
	                                            <span class="alert text-danger" id="pnError"></span>
	                                            <span class="underline"></span>
	                                        </div>
	                                    </div>
	                                </label>
								    <p class="or">OR</p>
								    <label>
								        <span>Email Address</span>
								        <input type="email" name="email" id="vender_email">
								        
								        <span class="alert text-danger" id="eError"></span>
								        <span class="underline"></span>
								    </label>
								    <label>
								        <span>Password</span>
								        <input type="password" name="password" autocomplete="off" id="myInput1">
								        
								        <span class="alert text-danger" id="pError"></span>
								        <input type="checkbox" class="d-inline-block" onclick="myFunction1()">Show Password
								        <span class="underline"></span>
								    </label>
								    <ul id="errlist"></ul>
							        <button id="vender_login" onclick="vender_login()" class="submit" type="submit">Sign In</button>

							        </form>
							        <p class="forgot-pass"><a href="{{url('/vender/forget_password')}}">Forgot Password ?</a></p>
							        <div class="extra-login clearfix">
			                            <span>Or Login With</span>
			                        </div>
			                        <div class="social-list">
			                            <a href="#" class="facebook-bg"><i class="fab fa-facebook-f"></i></a>
			                            <a href="#" class="twitter-bg"><i class="fab fa-twitter"></i></a>
			                            <a href="#" class="google-bg"><i class="fab fa-google"></i></a>
			                            <a href="#" class="linkedin-bg"><i class="fab fa-linkedin-in"></i></a>
			                        </div>
			                         <p class="forgot">Buying for work? <span><a href="{{url('/vender/register')}}">Create a Partner account</a></span></p> 
							    </div>
						</div>
					</div>
				    <div class="sub-cont">
					    <div class="img">
					    	<div class="row">
					    		<div class="col-lg-6">
					    			<div class="login-img">
					    				<img src="/image/product-49.jpg">
					    			</div>
					    		</div>
					    		<div class="col-lg-6">
					    			<div class="login-img">
					    				<img src="/image/product-10.jpg">
					    			</div>
					    		</div>
					    		<div class="col-lg-12">
					    			<div class="login-img x-img">
					    				<img src="/image/product-11.webp">
					    			</div>
					    		</div>
					    		<div class="col-lg-6">
					    			<div class="login-img">
					    				<img src="/image/product-27.jpg">
					    			</div>
					    		</div>
					    		<div class="col-lg-6">
					    			<div class="login-img">
					    				<img src="/image/product-32.jpg">
					    			</div>
					    		</div>
					        </div>
					        <div class="img-text m-up">
					            <h2>New here?</h2>
					            <p>Sign up and discover great amount of new opportunities!</p>
					        </div>
					        <div class="img-text m-in">
					            <h2>One of us?</h2>
					            <p>If you already has an account, just sign in. We've missed you!</p>
					        </div>
					        <div class="img-btn">
					            <span class="m-up">Sign Up</span>
					            <span class="m-in">Sign In</span>
					        </div>
					    </div>
					    <div class="form sign-up">
					        <div class="count-head1">
								<h2>Sign Up</h2>
							</div>

							<form method="post" id="user_singin">
								@csrf
							        <label>
							            <span>Name</span>
							            <input name="name" type="text" id="r_name">

							            <span class="alert text-danger" id="name_err"></span>
							            
							            <span class="underline"></span>
							        </label>
							        <label>
		                                <span>Phone</span>
		                                <div class="show_code">
		                                    <div>
		                                    	<div class="di_felx">
		                                        <p class="c_code">+91</p>
		                                        <input type="number" name="phone_no" id="sign_phone_no">
		                                       </div>
		                                        
		                                        <span class="alert text-danger" id="phone_no_err" style="padding: 0;"></span>
		                                        <span class="underline"></span>
		                                    </div>
		                                </div>
		                            </label>
							        <label>
							            <span>Email</span>
							            <input type="email" name="email" id="r_email">
							            
							            <span class="alert text-danger" id="email_err"></span>
							            <span class="underline"></span>
							        </label>
							        <label>
							            <span>Password</span>
							            <input type="password" name="password" id="r_password">
							            
							            <span class="alert text-danger" id="password_err" style="padding: 0;"></span>
							            <span class="underline"></span>
							        </label>
							        <label>
							            <span>Confirm Password</span>
							            <input type="password" name="c_password" id="r_c_password">
							            
							            <span class="alert text-danger" id="c_password_err" style="padding: 0px;width: 103%!important;display: inline-block;"></span>
							            <span class="underline"></span>
							        </label>

							        <label>
							            <span>Address</span>
							            <input type="text" name="address" id="r_address">
							            
							            <span class="alert text-danger" id="address_err"></span>
							            <span class="underline"></span>
							        </label>
							        <div class="form-check">
			                            <label class="form-check-label">
			                                <input type="checkbox" name="checkbox" class="d-inline-block" id="r_checkbox" value="1">I agree to theterms of service
			                                <span class="alert text-danger" id="checkbox_err" style="padding: 0;"></span>
			                            </label>
				                    </div>
							        <button id="user_register" type="submit" class="submit">Sign Up Now</button>

					        </form>
					        <p class="forgot">Buying for work? <span><a href="{{url('/vender/register')}}">Create a free business account</a></span></p>
					    </div>
				    </div>
			    </div>
			</div>
		</div>	    
    </div>
  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    	
    	
    	setTimeout(function() { $("#alert_hide").fadeOut(1500); },5000);

    	function myFunction() {
			  var x = document.getElementById("myInput");
			  if (x.type === "password") {
			    x.type = "text";
			  } else {
			    x.type = "password";
			  }
			}

			function myFunction1() {
			  var x = document.getElementById("myInput1");
			  if (x.type === "password") {
			    x.type = "text";
			  } else {
			    x.type = "password";
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

	  	document.querySelector('.img-btn').addEventListener('click', function()
		    {
		    	document.querySelector('.cont').classList.toggle('s-signup')
		    }
	    );

	    $(".show_code").click(function(){
        $(".c_code").show();
      });

	    $(document).ready(function(){

	    	$("#login_1").click(function(){

	    		$(".login_1").show();
	    		$(".login_2").hide();
	    	});

	    	$("#login_2").click(function(){

	    		$(".login_2").show();
	    		$(".login_1").hide();
	    	});
	    });


	    // user register        user register        user register        user register        user register        user register        user register        user register        user register        user register        



	    $(document).ready(function(){

	    	$(document).on("click" , "#user_register" , function(e){

	    		e.preventDefault();

	    		var name = $("#r_name").val();

	    		var phone_no = $("#sign_phone_no").val();

	    		var email = $("#r_email").val();

	    		var password = $("#r_password").val();

	    		var c_password = $("#r_c_password").val();

	    		var address = $("#r_address").val();

	    		var checkbox = $("#r_checkbox:checked").val();

	    		$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      	});

	    		$.ajax({

	    			type:"post",
	    			url:"/user/register_data",
	    			data:{name:name , phone_no:phone_no , email:email , password:password , c_password:c_password , address:address , checkbox:checkbox },
	    			datatype:"json",
	    			success:function(response){
	    
	    			document.getElementById("user_singin").reset();

	    	
	    		   document.querySelector('.cont').classList.toggle('s-signup');

	    				$('#hideDiv').show();

	    				$('#hideDiv').text(response.success);
	    				
	    				setTimeout(function() { $(".alert").fadeOut(1500); },5000);
	    			},

	    			error:function(response){
	    				if(response.responseJSON.errors.name){

	    					$("#name_err").show();
	    					$("#name_err").text(response.responseJSON.errors.name);
	    					setTimeout(function() { $(".alert").fadeOut(1500); },5000);
	    				}else{

	    				}

	    				if(response.responseJSON.errors.email){

	    					$("#email_err").show();
	    					$("#email_err").text(response.responseJSON.errors.email);
	    					setTimeout(function() { $(".alert").fadeOut(1500); },5000);
	    				}else{
	    					
	    				}

	    				if(response.responseJSON.errors.phone_no){

	    					$("#phone_no_err").show();
	    					$("#phone_no_err").text(response.responseJSON.errors.phone_no);
	    					setTimeout(function() { $(".alert").fadeOut(1500); },5000);
	    				}else{
	    					
	    				}

	    				if(response.responseJSON.errors.password){

	    					$("#password_err").show();
	    					$("#password_err").text(response.responseJSON.errors.password);
	    					setTimeout(function() { $(".alert").fadeOut(1500); },5000);
	    				}else{
	    					
	    				}

	    				if(response.responseJSON.errors.c_password){

	    					$("#c_password_err").show();
	    					$("#c_password_err").text("The Confirm password field is required");
	    					setTimeout(function() { $(".alert").fadeOut(1500); },5000);
	    				}else{
	    					
	    				}

	    				if(response.responseJSON.errors.address){

	    					$("#address_err").show();
	    					$("#address_err").text(response.responseJSON.errors.address);
	    					setTimeout(function() { $(".alert").fadeOut(1500); },5000);
	    				}else{
	    					
	    				}
	    				if(response.responseJSON.errors.checkbox){

	    					$("#checkbox_err").show();
	    					$("#checkbox_err").text(response.responseJSON.errors.checkbox);
	    					setTimeout(function() { $(".alert").fadeOut(1500); },5000);
	    				}else{
	    					
	    				}
	    			}
	    		});
	    	});
	    });







	   // vender login     vender login      vender login     vender login     vender login     vender login     vender login     vender login       vender login        vender login         vender login 




	    $(document).ready(function(){

  $(document).on('click' , '#vender_login', function(e) {

        e.preventDefault();

        var email=$('#vender_email').val();

        var password=$('#myInput1').val();

        var phone_no=$('#vender_phone_no').val();

          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      	});

        $.ajax({

        type: "post",
        url: "/vender/authenticate",
        data: {email:email , phone_no:phone_no , password:password},
        datatype: "json",
         success:function(response) {

         	if(response.success){

         		window.location.href="/vender/home";

         	}else{

         	$("#errlist").show();
          $("#errlist").html();
          $("#errlist").addClass("alert alert-success");
          $("#errlist").text("Your Email or Password is incorrect");
          setTimeout(function() {$(".alert").fadeOut(1500);},5000);
          }
        },
        error:function (response) {

          if(response.responseJSON.errors.email){

          	$("#eError").show();
          	$("#eError").text(response.responseJSON.errors.email);
          	setTimeout(function() { $(".alert").fadeOut(1500); },5000);

          }
          else{

          }
          if(response.responseJSON.errors.phone_no){

          	$("#pnError").show();
          	$("#pnError").text(response.responseJSON.errors.phone_no);
          	setTimeout(function() { $(".alert").fadeOut(1500); },5000);

          }
          else{

          }
          if(response.responseJSON.errors.password){

          	$("#pError").show();
          	$("#pError").text(response.responseJSON.errors.password);
          	setTimeout(function() { $(".alert").fadeOut(1500); },5000);

          }
          else{

          }
      }
      
      });
    });


  });



	    //  user Login        user Login        user Login        user Login        user Login        user Login        user Login        user Login        user Login        user Login        




	   $(document).ready(function(){

  $(document).on('click' , '#user_login', function(e) {

        e.preventDefault();

        var email=$('#email').val();

        var password=$('#myInput').val();

        var phone_no=$('#phone_no').val();

          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      	});

        $.ajax({

        type: "post",
        url: "/user/authenticate",
        data: {email:email , phone_no:phone_no , password:password},
        datatype: "json",
         success:function(response) {
         	
          if(response.success){

             	window.location.href = "{{url('/')}}";

             }else{

            $("#saveform_errList").show();

            $("#saveform_errList").html();
            $("#saveform_errList").addClass('alert alert-success');
            $("#saveform_errList").text('Your Email or Password is incorrect');
            setTimeout(function() { $("#saveform_errList").fadeOut(1500);},5000);

         
            }
        },
        error:function (response) {

          if(response.responseJSON.errors.email){

          	$("#emailError").show();
          	$('#emailError').text(response.responseJSON.errors.email);
          	setTimeout(function() { $("#emailError").fadeOut(1500);},5000);

          }else{

          }

          if(response.responseJSON.errors.phone_no){

          	$("#phone_noError").show();
          	$('#phone_noError').text(response.responseJSON.errors.phone_no);
          	setTimeout(function() { $("#phone_noError").fadeOut(1500);},5000);

          }else{

          }

          if(response.responseJSON.errors.password){

          	$("#passwordError").show();
          	$('#passwordError').text(response.responseJSON.errors.password);
          	setTimeout(function() { $("#passwordError").fadeOut(1500);},5000);

          }else{

          }
      }
      
      });
    });


  });
    
  </script>
</body> 
</html>

