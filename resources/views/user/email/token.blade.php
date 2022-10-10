<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<h1>token</h1>

	<h6>your token is:<b>{{$token}}</b></h6>

	<button><a href="{{url('/admin/confirm_otp')}}/{{$id}}">click here to change password</a></button>

</body>
</html>