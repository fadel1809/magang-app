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
    <div class="container text-center">

        <h1>Pemagang Aktif</h1>
        <table class="table">
        <thead>
            <th>#</th>
            <th>username</th>
            <th>email</th>
            <th>posisi</th>
            <th>status</th>
            <th></th>
        </thead>
        @php
            $no = 1
        @endphp
        @foreach ($data as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->username}}</td>
                <td>{{$item->email_user}}</td>
                <td>{{$item->posisi}}</td>
                <td>{{$item->status}}</td>
                <td class="d-flex justify-content-center">
                    <form action={{route('pemagang.aktif.remove',['id'=>$item->id_company,'idPemagangAktif'=>$item->id])}} method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger" >Sudah Behenti</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>