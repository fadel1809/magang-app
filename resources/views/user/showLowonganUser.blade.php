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
   
    <div class="container">
         @foreach ($lamaran as $item)
        @if ($item->status == 'accepted')
            <div class="alert alert-success alert-dismissible  fade show" role="alert">
                Selamat lamaran anda ada yang diterima, silahkan cek email mu secara berkala
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @php
                break;
            @endphp
        @endif
    @endforeach
        <h1>Lamaran Saya</h1>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Lowongan</th>
            <th>Perusahaan</th>
            <th>location</th>
            <th>status</th>
        </thead>
        @php
            $no = 1
        @endphp
        @foreach ($lamaran as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->title_lowongan}}</td>
                <td>{{$item->company}}</td>
                <td>{{$item->location}}</td>
                <td>{{$item->status}}</td>
            </tr>
        @endforeach
    </table>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>