<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>user Page</p>
    <p>{{$user->id}}</p>
    <a href="{{'/user'.'/'.$user->id.'/edit'}}" class="btn btn-primary">Edit Profile</a>
    <a href="{{'/user'.'/'.$user->id.'/lowongan'}}" class="btn btn-success" >cari magang</a>
    <a href="{{'/user'.'/'.$user->id.'/lowongan-user'}}" class="btn btn-success" > Lowongan saya</a>
    <form action={{'/user'.'/'.$user->id.'/logout'}} method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>