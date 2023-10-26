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
    <title>Edit User - Super Admin</title>
    <style>
        .back-button{
            position: relative;
        }
        .edit-user-container{
            margin-top: 1.25em;
        }
    </style>
</head>
<body class="bg-primary">
    
    <div class="container bg-gray-100 rounded-3 py-3 edit-user-container shadow-lg">
        <a href="{{route('superadmin.users',['id'=>$admin->id])}}" class="back-button btn btn-danger btn-circle"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 style="color: black; font-weight:bold;">Edit User</h1>
          <form action={{route('superadmin.editUser',['id'=>$admin->id,'idUser'=>$user->id])}} method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name" class="form-label">name</label>
    <input type="text" class="form-control" value="{{$user->name}}" name="name" >
    </div>
    <div class="form-group">
        <label for="school" class="form-label">school</label>
    <input type="text" class="form-control" value="{{$user->school}}" name="school" >
    </div>
    <div class="form-group">
        <label for="notelp" class="form-label">No Telpon</label>
    <input type="text" class="form-control" value="{{$user->notelp}}" name="notelp">
    </div>
    <div class="form-group">
         <label for="cv" class="form-label">Upload CV</label>
     @if ($user->cv)     
     <div class="alert alert-success">
        <a class="nav-link" href={{route('download.pdf',['id'=>$user->id,'filename'=>$user->cv])}}  >{{$user->cv}}</a>
     </div>
     @endif
    <input type="file" class="form-control" value="Upload CV mu"  name="cv">
    </div>
    
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>    
    </div>

    
</body>
<script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    
    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>
</html>
