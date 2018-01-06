<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
	<form action="{{url('/reset-password')}}" method="post">
		{{csrf_field()}}
		<input type="email" name="user_email">
	<input type="submit" value="Submit">
	</form>
</body>

</html>