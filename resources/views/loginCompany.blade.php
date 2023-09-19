<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Login Admin</title>
</head>
<body>
    <h1>Login admin</h1>
    <form action='/company-login' method="POST">
        @csrf

            <label for="">Email</label>
            <input type="email" name="email" class="form-control" required><br>
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" required><br>
            
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            belum punya akun perusahaan? <a href="/company-register">Register</a>
    </form>
</body>
</html>