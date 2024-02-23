<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Lowongan</title>
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
    <div class="container bg-light rounded-2 mt-3 shadow p-3 py-4 px-4">
        <h3><strong>Lowongan Tersedia</strong></h3>
        @if(!isset($lowongan))
           <h5 style="color: grey;">Tidak ada lowongan untuk saat ini</h5>
        @endif
        <div class="row">
            <div class="col-lg-6">
        @foreach ($lowongan as $item)
    <div class="card shadow-lg" style="width: 100%;">
    <div class="card-body">
     <h5 class="card-title">{{$item->name}}</h5>   
    <h5 class="card-title"><strong>{{$item->title}}</strong></h5>
    <hr>
    <p class="card-text" style="color: grey;">{{$item->description}}</p>
    <a href={{route('lowongan.page',['id'=>$user->id,'idLowongan'=>$item->id])}} class="card-link rounded-5 px-4 btn btn-primary">Lamar <i class="fa-solid fa-file"></i></a>
</div>
</div>
</div>
    @endforeach
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>