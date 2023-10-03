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

        <h1>Lamaran User</h1>
        <table class="table">
        <thead>
            <th>#</th>
            <th>Lowongan</th>
            <th>Email User</th>
            <th>CV</th>
            <th>status</th>
            <th></th>
        </thead>
        @php
            $no = 1
        @endphp
        @foreach ($lamaran as $item)
        @php
         
        @endphp
            <tr>
                
                <td>{{$no++}}</td>
                <td>{{$item->title_lowongan}}</td>
                <td>{{$item->email_user}}</td>
                <td> <a href={{route('download.pdf',['id'=>$item->created_by,'filename'=>$item->cv_user])}} class="btn btn-outline-primary">View CV</a></td>
                <td>{{$item->status}}</td>
                <td class="d-flex justify-content-center">
                    <form action={{route('lamaran.pemagang.aktif',['id'=>$item->company_id,'idLamaran'=>$item->id])}} method="POST">
                        @csrf
                        <button type="submit"  class="btn btn-success mx-2" >Sudah Aktif</button>
                    </form>
                    <form action={{route('lamaran.decision',['id'=>$item->company_id,'idLamaran'=>$item->id,'decision'=>'decline'])}} method="POST" >
                        @csrf
                        @method('PUT')
                        <button type="submit"   class="btn btn-danger" name="decline">Tolak</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    </body>
    </html>