<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Daftar</title>
</head>
<body>
   @if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        
    </div>
@endif
<div class="container container-fluid">
        <h1>Daftar</h1>

        <form action='/register' method="POST">
            @csrf
                <label for="">Nama</label>
                <input type="text" name="name" class="form-control" ><br>
                 <label for="">Email</label>
                <input type="email" name="email" class="form-control"><br>
                 <label for="">Password</label>
                <input type="password" name="password" class="form-control" ><br>
                 <label for="">Asal Sekolah/Universitas</label>
                <input type="text" name="school" class="form-control"><br>
                 <label for="">Domisili</label>
                <input type="text" name="location" class="form-control"><br>
                <label for="">No. Telepon</label>
                <input type="text" name="notelp" class="form-control" ><br>
               
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                <input type="reset" value="Reset" class="btn btn-danger">
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>