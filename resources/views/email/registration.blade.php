<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MetaKave</title>
</head>

<body>
    <h1>Welcome to MetaKave</h1>
    <p>
        To active your account, please click on this <a href="{{ Request::root() }}/user/active/{{ $remember_token }}" target="_blank">link.</a>
    </p>
</body>

</html>