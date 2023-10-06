<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <a class="btn btn-success"  href={{route('superadmin.users',['id'=>$user->id])}}>show all user</a>
    <a class="btn btn-success"  href={{route('superadmin.companies',['id'=>$user->id])}}>show all companies</a>
    <a class="btn btn-success"  href={{route('superadmin.lowongan',['id'=>$user->id])}}>show all lowongan</a>
    <a class="btn btn-success"  href={{route('superadmin.lamaran',['id'=>$user->id])}}>show all lamaran</a>
    <a class="btn btn-success"  href={{route('superadmin.pemagangAktif',['id'=>$user->id])}}>show all pemagang aktif</a>
    <a class="btn btn-success" href={{route('superadmin.pemagangInAktif',['id'=>$user->id])}}>show all pemagang tidak aktif</a>
    <a class="btn btn-success" href={{route('superadmin.pending.companies',['id'=>$user->id])}}>show all pending companies</a>
    <form action={{route('superadmin.logout',['id'=>$user->id])}} method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">
            Log Out
        </button>
    </form>
</body>
</html>