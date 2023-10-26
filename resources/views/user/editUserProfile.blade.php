<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Profile</title>
     <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-body-secondary">
    <section class="navigation">
            <nav class="navbar navbar-expand-lg bg-body-light">
  <div class="container-fluid container">
    <a class="navbar-brand" href="{{route('home.user',['id'=>$user->id])}}">
    <img class="logo" src="{{asset('/assets/image/logo.jpg')}}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto d-flex justify-content-end">
        <li class="nav-item">
            <a href={{route('show.lowongan',['id'=>$user->id])}} class="nav-link">Lowongan</a>

        </li>
        <li class="nav-item">
        <a href={{route('lowongan.user',['id'=>$user->id])}} class="nav-link">Lamaran Saya</a>

        </li>
    </ul>
    <li class="nav-item dropdown" style="list-style-type: none;">
        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-regular fa-user"></i>  {{$user->name}}
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href={{route('user.edit',['id'=>$user->id])}}>Edit Profile <i class="fa-regular fa-pen-to-square"></i></a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action={{route('user.logout',['id'=>$user->id])}} method="POST">
                @csrf   
                <button class="dropdown-item" type="submit" style="color: #3661da;">
                    Logout <i class="fa-solid fa-door-open"></i>
                </button>
            </form>
          </li>
        </ul>
      </li>
    </div>
  </div>
</nav>
    </section>
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
<div class="container mt-4 rounded-2 shadow-lg  bg-light py-3 px-3">

    <h3><strong>Edit Profile</strong></h3>
    <form action="{{'/user'.'/'.$user->id.'/edit'}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control mb-2" value="{{$user->name}}" name="name" >
        <label for="school" class="form-label">school</label>
        <input type="text" class="form-control mb-2" value="{{$user->school}}" name="school" >
    <label for="notelp" class="form-label">No Telpon</label>
    <input type="text" class="form-control mb-2" value="{{$user->notelp}}" name="notelp">
     <label for="cv" class="form-label">Upload CV</label>
     @if ($user->cv)     
     <div class="alert alert-success">
        <a class="nav-link" href={{route('download.pdf',['id'=>$user->id,'filename'=>$user->cv])}}  >{{$user->cv}}</a>
     </div>
     @endif
    <input type="file" class="form-control mb-3" value="Upload CV mu"  name="cv">
    <button type="submit" class="btn btn-primary rounded-5 px-4" >Edit <i class="fa-regular fa-pen-to-square"></i></button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>