<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Register Company</title>
</head>
<body>
     @if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        
    </div>
@endif
    <h1>Daftar admin</h1>
    <form action='/company-register' method="POST">
        @csrf
          <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" required><br>
            <label for="">Nama Perusahaan</label>
            <input type="text" name="companyName" class="form-control" required><br>
             <label for="">Email</label>
            <input type="email" name="email" class="form-control" required><br>
             <label for="">Password</label>
            <input type="password" name="password" class="form-control" required><br>
            <label for="">No telpon</label>
            <input type="text" name="notelp" class="form-control" required><br>
            <label for="">Address</label>
            <textarea class="form-control" name="location" id="" cols="20" rows="5"></textarea>
         
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            <input type="reset" value="Reset" class="btn btn-danger">
    </form>
</body>
</html>