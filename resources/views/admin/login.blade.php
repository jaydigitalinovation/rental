
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
input.d-inline-block {
    width: 10%;
}
</style>
<body class="body">
	<div class="co_login">
		<div class="row">
			<div class="col-lg-12">
				<div class="cont">
					<div class="count-head">
						<h2>Sign In</h2>
						<h3>Admin Login</h3>
					</div>
					@if(session()->has('error'))
		              <div class="alert alert-success" id="newhide">
		                  {{session()->get('error')}}
		              </div>
		              @endif
					<div class="login_1">
						<div class="form sign-in">
							<form method="post" action="{{url('/admin/authenticate')}}">
								@csrf

								<label>
							        <span>Phone Number</span>
							        <input type="phone_no" name="phone_no">
							        @if($errors->has('phone_no')) <p class="error_mes text-danger">{{ $errors->first('phone_no') }}</p> @endif
							        <span class="underline"></span>
							    </label>

							    <label>Or</label>
							    
							    <label>
							        <span>Email Address</span>
							        <input type="email" name="email">
							        @if($errors->has('email')) <p class="error_mes text-danger">{{ $errors->first('email') }}</p> @endif
							        <span class="underline"></span>
							    </label>
							    <label>
							        <span>Password</span>
							        <input type="password" name="password" autocomplete="off" id="myInput">
							        @if($errors->has('password')) <p class="error_mes text-danger">{{ $errors->first('password') }}</p> @endif
							        <input type="checkbox" class="d-inline-block" onclick="myFunction()">Show Password
							        <span class="underline"></span>
							    </label>
						        <button class="submit" type="submit">Sign In</button>

						    </form>
						        <p class="forgot-pass"><a href="{{url('/admin/forget_password')}}">Forgot Password ?</a></p>
						        <div class="extra-login clearfix">
		                            <span>Or Login With</span>
		                        </div>
		                        <div class="social-list">
		                            <a href="#" class="facebook-bg"><i class="fab fa-facebook-f"></i></a>
		                            <a href="#" class="twitter-bg"><i class="fab fa-twitter"></i></a>
		                            <a href="#" class="google-bg"><i class="fab fa-google"></i></a>
		                            <a href="#" class="linkedin-bg"><i class="fab fa-linkedin-in"></i></a>
		                        </div>
		                          
						    </div>
					</div>
				    
			    </div>
			</div>
		</div>	    
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    	setTimeout(function() { $(".alert").fadeOut(1500); },5000);

    	function myFunction() {
			  var x = document.getElementById("myInput");
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
			})

		})

	  	document.querySelector('.img-btn').addEventListener('click', function()
		    {
		    	document.querySelector('.cont').classList.toggle('s-signup')
		    }
	    );

	    $(".show_code").click(function(){
        $(".c_code").show();
      });
  </script>
</body> 
</html>

