<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Lowongan {{$lowongan->title}} di {{$lowongan->name}}</title>
</head>
<body>
    <div class="container">
        <div class="card" style="width: 100%;">
    <div class="card-body">
         <h1> {{$lowongan->name}} </h1>
    <h5 class="card-title">{{$lowongan->title}}</h5>
    <hr>
    <h6>Deskripsi pekerjaan {{$lowongan->title}} {{$lowongan->name}}</h6>
    <p class="card-text">{{$lowongan->description}}</p>
    <hr>
    <h6>Tentang perusahaan {{$lowongan->name}}</h6>
    <p >{{$lowongan->profile}}</p>
    <hr>        
    <h6>Alamat Perusahaan</h6>
    <p class="card-text">{{$lowongan->location}}</p>

    <form action={{route('lamar.lowongan',['id'=>$user->id,'idLowongan'=>$lowongan->id])}} method="POST">
        @csrf
        <button type="submit"  class="btn btn-primary">Lamar</button>
    </form>
</div>
</div>
       

    </div>

</body>
</html>