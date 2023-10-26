<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Lamaran Saya</title>
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
    <div class="container mt-3 bg-light rounded-2 shadow p-3 py-4 px-4">
         @foreach ($lamaran as $item)
        @if ($item->status == 'accepted')
            <div class="alert alert-success alert-dismissible  fade show" role="alert">
                Selamat lamaran anda ada yang diterima, silahkan cek email mu secara berkala
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @php
                break;
            @endphp
        @endif
    @endforeach
        <h3>Lamaran Saya</h3>
    <table class="table table-light">
        <thead>
            <th>#</th>
            <th>Lowongan</th>
            <th>Perusahaan</th>
            <th>location</th>
            <th>status</th>
        </thead>
        @php
            $no = 1
        @endphp
        @foreach ($lamaran as $item)
            @if($item->status=='pending')
            <tr class="table-warning">
                <td>{{$no++}}</td>
                <td>{{$item->title_lowongan}}</td>
                <td>{{$item->company}}</td>
                <td>{{$item->location}}</td>
                <td>{{$item->status}}</td>
            </tr>
            @endif
            @if($item->status=='accepted')
            <tr class="table-success">
                <td>{{$no++}}</td>
                <td>{{$item->title_lowongan}}</td>
                <td>{{$item->company}}</td>
                <td>{{$item->location}}</td>
                <td>{{$item->status}}</td>
            </tr>
            @endif
            @if($item->status=='declined')
            <tr class="table-danger">
                <td>{{$no++}}</td>
                <td>{{$item->title_lowongan}}</td>
                <td>{{$item->company}}</td>
                <td>{{$item->location}}</td>
                <td>{{$item->status}}</td>
            </tr>
            @endif
            
        @endforeach
    </table>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>