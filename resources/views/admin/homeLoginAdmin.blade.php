<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Admin Company</title>
</head>
<body>
    <p>company login {{$user->id}}</p>
     
    <a href={{ route('company.tambah', ['id'=>$user->id]) }} class="btn btn-primary"  >Tambah Lowongan</a>
    <a href={{route('company.edit.profile',['id'=>$user->id])}} class="btn btn-primary" >Edit</a>
    <a href={{route('lowongan.all',['id'=>$user->id])}} class="btn btn-primary">show lowongan</a>
    <a href={{route('lamaran.pending',['id'=>$user->id])}} class="btn btn-primary">show lamaran masuk</a>
    <a href={{route('lamaran.accepted',['id'=>$user->id])}} class="btn btn-primary">show lamaran yang diterima</a>
    <a href={{route('pemagang.aktif',['id'=>$user->id])}} class="btn btn-primary">show pemagang yang aktif</a>
        <a href={{route('pemagang.inaktif',['id'=>$user->id])}} class="btn btn-primary">show pemagang yang tidak aktif</a>
    <form action={{route('company.logout',['id'=>$user->id])}} method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
</body>
</html>