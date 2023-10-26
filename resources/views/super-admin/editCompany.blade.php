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
    <title>Edit User</title>
    <style>
        .back-button{
            position: relative;
        }
        .edit-user-container{
            margin-top: 1.75em;
        }
    </style>
</head>
<body class="bg-primary">
    
    <div class="container bg-gray-100 rounded-3 py-3 edit-user-container shadow-lg">
        <a href="{{route('superadmin.companies',['id'=>$admin->id])}}" class="back-button btn btn-danger btn-circle"><i class="fa-solid fa-arrow-left"></i></a>
        <h1 style="color: black; font-weight:bold;">Edit Company</h1>
        <form action="{{route('superadmin.editCompany',['id'=>$admin->id,'idCompany'=>$company->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="" class="form-label" >upload photo profile</label>
        <input type="file" class="form-control" name="photo">
        </div>
        <div class="form-group">
        <label class="form-label" for="">nama</label>
        <input type="text" name="nama" value={{$company->nama}} class="form-control">
        </div>  
        <div class="form-group">
        <label class="form-label" for="">Company Name</label>
        <input type="text" name="companyName"  class="form-control" value={{$company->companyName}}>
        </div>
        <div class="form-group">
        <label class="form-label" for="">Company Profile</label>
        <textarea name="companyProfile"  class="form-control"  cols="20" rows="5">{{$company->companyProfile}}</textarea> 
        </div>
    <div class="form-group">
    <label for="" class="form-label">Address</label>
    <textarea name="location" id="" cols="20" class="form-control"  rows="5"> {{$company->location}} </textarea> 
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
