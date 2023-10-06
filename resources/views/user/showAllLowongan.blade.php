<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <h1>Lihat semua Lowongan</h1>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4">
        @foreach ($lowongan as $item)
    <div class="card" style="width: 18rem;">
    <div class="card-body">
     <h5 class="card-title">{{$item->name}}</h5>   
    <h5 class="card-title">{{$item->title}}</h5>
    <p class="card-text">{{$item->description}}</p>
    <a href={{route('lowongan.page',['id'=>$user->id,'idLowongan'=>$item->id])}} class="card-link">Lamar</a>
</div>
</div>
</div>
    @endforeach
        </div>
    </div>
</body>
</html>