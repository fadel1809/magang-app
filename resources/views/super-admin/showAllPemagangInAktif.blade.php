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
      <div class="container text-center">

        <h1>Pemagang Tidak Aktif</h1>
        <table class="table">
        <thead>
            <th>#</th>
            <th>User</th>
            <th>Email</th>
            <th>Posisi</th>
            <th>Nama Perusahaan</th>
            <th>Status</th>
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
                <td>{{$item->companyname}}</td>
                <td>{{$item->status}}</td>
                <td class="d-flex justify-content-center">
                    <form action={{route('superadmin.deletePemagangInaktif',['id'=>$admin->id,'idPemagangInaktif'=> $item->id])}} method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Sudah Behenti</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>