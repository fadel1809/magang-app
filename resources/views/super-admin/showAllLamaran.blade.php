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

        <h1>Lamaran</h1>
        <table class="table">
        <thead>
            <th>#</th>
            <th>Posisi</th>
            <th>Domisili</th>
            <th>Nama Perusahaan</th>
            <th>User</th>
            <th>CV</th>
            <th>status</th>
            <th></th>
        </thead>
        @php
            $no = 1
        @endphp
        @foreach ($data as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->title_lowongan}}</td>
                <td>{{$item->location}}</td>
                <td>{{$item->company}}</td>
                <td>{{$item->email_user}}</td>
                <td>@if(!$item->cv)
                    Belum diinput
                    @else
                    <a href={{route('download.pdf',['id'=>$item->id,'filename'=>$item->cv])}} class="btn btn-outline-primary">View CV</a>
                @endif

                
                
                </td>
                <td>{{$item->status}}</td>
                <td class="d-flex justify-content-center">
                    <form action={{route('superadmin.deleteLamaran',['id'=>$admin->id,'idLamaran'=>$item->id])}} method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>