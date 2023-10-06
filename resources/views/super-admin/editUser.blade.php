<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Profile</title>
</head>
<body>
     @if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        
    </div>
@endif
@if(isset($message))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif
<h1>Edit User</h1>
<form action={{route('superadmin.editUser',['id'=>$admin->id,'idUser'=>$user->id])}} method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name" class="form-label">name</label>
    <input type="text" class="form-control" value="{{$user->name}}" name="name" >
    <label for="school" class="form-label">school</label>
    <input type="text" class="form-control" value="{{$user->school}}" name="school" >
    <label for="notelp" class="form-label">No Telpon</label>
    <input type="text" class="form-control" value="{{$user->notelp}}" name="notelp">
     <label for="cv" class="form-label">Upload CV</label>
     @if ($user->cv)     
     <div class="alert alert-success">
        <a class="nav-link" href={{route('download.pdf',['id'=>$user->id,'filename'=>$user->cv])}}  >{{$user->cv}}</a>
     </div>
     @endif
    <input type="file" class="form-control" value="Upload CV mu"  name="cv">
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>    
</body>
</html>