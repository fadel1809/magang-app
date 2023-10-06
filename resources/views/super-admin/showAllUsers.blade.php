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

        <h1>User</h1>
        <table class="table">
        <thead>
            <th>#</th>
            <th>email</th>
            <th>Nama</th>
            <th>Asal Sekolah</th>
            <th>CV</th>
            <th>Domisili</th>
            <th>No. Telpon</th>
            <th>action</th>
        </thead>
        @php
            $no = 1
        @endphp
        {{$admin->id}}
        @foreach ($data as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->school}}</td>
                
                <td>@if(!$item->cv)
                    Belum diinput
                    @else
                    <a href={{route('download.pdf',['id'=>$item->id,'filename'=>$item->cv])}} class="btn btn-outline-primary">View CV</a>
                @endif

                
                
                </td>
                <td>{{$item->location}}</td>
                <td>{{$item->notelp}}</td>
                <td class="d-flex justify-content-center">
                    <a href={{route('show.superadmin.editUser',['id'=> 1,'idUser'=>$item->id])}} class="btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>