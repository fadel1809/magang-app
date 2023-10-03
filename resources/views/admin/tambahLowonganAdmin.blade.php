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
     @if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        
    </div>
@endif
    <p>form tambah lowongan</p>
    <form action={{ route('company.tambah', ['id'=>$user->id]) }} method="POST">
        @csrf
        <label for="title" class="form-label">Posisi:</label>
        <input type="text" class="form-control" name="title">
        <label for="description" class="form-label">Deskripsi Pekerjaan:</label>
        <textarea name="description" cols="20" class="form-control" rows="5"></textarea>
        <label for="jumlah_slot">Jumlah slot</label>
        <input type="text" name="jumlah_slot" class="form-control">
        <button type="submit" class="btn btn-primary" >submit</button>
    </form>
</body>
</html>