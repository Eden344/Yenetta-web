<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/login-validation" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input value="{{old('username')}}" type="text" name="username" class="form-control" value="{{ old('username') }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input value="{{old('password')}}" type="text" name="password" class="form-control" value="{{('password') }}">
        </div>

        <button type="submit">Login</button>
</body>
</html>