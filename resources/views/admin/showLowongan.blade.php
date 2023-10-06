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
    <h1>Lihat Lowongan</h1>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4">
        @foreach ($data as $item)
    <div class="card" style="width: 18rem;">
    <div class="card-body">
    <h5 class="card-title">{{$item->title}}</h5>
    <p class="card-text">{{$item->description}}</p>
    <a href={{route('lowongan.edit',['id'=>$admin->id,'idLowongan'=>$item->id])}} class="card-link">Edit</a>
    <form action={{route('lowongan.delete',['id'=>$admin->id,'idLowongan'=>$item->id])}} method="post">
        @csrf
        @method('DELETE')
    <button type="submit" class="card-link">Delete</button>
    </form>
</div>
</div>
</div>
    @endforeach
        </div>
    </div>
    
    
</body>
</html>