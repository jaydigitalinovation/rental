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
	<link rel="icon" href="/image/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="body">
	<div class="signup d-flex align-items-center flex-column justify-content-center h-100 text-dark">
	    <div class="row" id="loginForm">
	        <div class="col-md-8 col-sm-12 text" id="right">
	            <h2>Sign Up Now</h2>
	            <form method="post" action="{{url('/user/register_data')}}">
	            	@csrf
	                <div class="form-group mt-3">
					    <input class="form-control" name="name" type="text" placeholder="Name">
                         <span class="underline"></span>
					</div>
					<div class="form-group">
                            <div class="show_code">
                                <div class="di_felx">
                                    <p class="c_code">+91</p>
                                    <input class="form-control" type="number" placeholder="Phone Number" name="phone_no">
                                    <span class="underline"></span>
                                </div>
                            </div>
					</div>
					<div class="form-group">
					    <input class="form-control" id="exampleInputPassword1" type="email" name="email" placeholder="Email Address">
                         <span class="underline"></span>
					</div>
					<div class="form-group">
					    <input class="form-control" type="password" name="password" placeholder="password">
                         <span class="underline"></span>
	                </div>
	                <div class="form-group">
					    <input class="form-control" type="password" name="c_password" placeholder="Confirm Password">
                         <span class="underline"></span>
	                </div>
	                <div class="form-group">
	                	<textarea class="form-control" placeholder="Enter Address" name="address" value="" required="" spellcheck="false"></textarea>
                         <span class="underline"></span>
	                </div>
	                <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="">I agree to theterms of service
                        </label>
                    </div>
                    <button type="submit" class="submit">Sign Up Now</button>
	            </form>
	        </div>
	        <div class="col-md-4 p-0">
	        	<div class="image_vander">
	        		<img src="/image/wedding-1.jpg">
	        	</div>
	        </div>
	    </div>
	</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(".show_code").click(function(){
        $(".c_code").show();
      });
  </script>
</body> 
</html>

