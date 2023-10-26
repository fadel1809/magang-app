<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="../../../../css/sb-admin-2.min.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <title>Edit Lowongan</title>
    <style>
        .back-button{
            position: relative;
        }
        .edit-user-container{
            margin-top: 3em;
        }
    </style>
</head>
<body class="bg-primary">
    
    <div class="container bg-gray-100 rounded-3 py-3 edit-user-container shadow-lg">
        <a href="{{route('superadmin.lowongan',['id'=>$admin->id])}}" class="back-button btn btn-danger btn-circle"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 style="color: black; font-weight:bold;">Edit User</h1>
         <form action={{route('superadmin.editLowongan',['id'=>$admin->id,'idLowongan'=>$lowongan->id])}} method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
         <label for="title" class="form-label">Posisi</label>
        <input type="text" class="form-control" name="title" value="{{$lowongan->title}}">
    </div>
    <div class="form-group">
         <label for="description" class="form-label">Deskripsi Pekerjaan</label>
        <textarea name="description" cols="20" class="form-control" rows="5">{{$lowongan->description}}</textarea>
    </div>
       <div class="form-group">
        <label for="" class="form-label">Status</label>
        <select name="status" class="form-select" aria-label="Default select example"> 
            <option value="available" >available</option>
            <option value="full">full</option>
        </select>
       </div>
        
        <button type="submit" class="btn btn-primary" >submit</button>
    </form>
    </div>

    
</html>