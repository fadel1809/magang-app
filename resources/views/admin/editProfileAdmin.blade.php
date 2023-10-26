<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>Document</title>
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href={{route('dashboard.company',['id'=>$user->id])}}>
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dashboard Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href={{route('dashboard.company',['id'=>$user->id])}}>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href={{route('company.tambah',['id'=>$user->id])}} >
                    <i class="fas fa-solid fa-plus"></i>
                    <span>Tambah Lowongan</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href={{route('show.edit.company',['id'=>$user->id])}} >
                    <i class="fas fa-solid fa-pen-to-square"></i>
                    <span>Edit Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('lowongan.all',['id'=>$user->id])}} >
                    <i class="fa-solid fa-laptop"></i>
                    <span>Lowongan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('lamaran.pending',['id'=>$user->id])}} >
                    <i class="fa-solid fa-paperclip"></i>
                    <span>Lamaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('lamaran.accepted',['id'=>$user->id])}} >
                    <i class="fa-solid fa-check"></i>
                    <span>Lamaran diterima</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('pemagang.aktif',['id'=>$user->id])}} >
                    <i class="fa-solid fa-suitcase"></i>
                    <span>Pemagang Aktif</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('pemagang.inaktif',['id'=>$user->id])}} >
                    <i class="fa-solid fa-person-running"></i>
                    <span>Pemagang tidak aktif</span>
                </a>
            </li>
            
           

            


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->
       
         <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h1 class="company-name">{{$user->companyName}}</h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$user->nama}}</span>
                                @if($user->photo)
                                
                                <img class="img-profile rounded-circle" src="{{asset('photos/'.$user->photo)}}">
                                @else
                                <i class="fa-solid fa-user img-profile rounded-circle pt-2 pl-1"></i>
                                @endif
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                               <form action="{{route('company.logout',['id'=>$user->id])}}" method="POST">
                                    @csrf
                                    <button type="submit"  class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
                    </div>

                    <!-- Content Row -->
                    
     @if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        
    </div>
@endif
    
    <form action={{route('company.edit.profile',['id' => $user->id])}} method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="" class="form-label" >upload photo profile</label>
        @if($user->photo)
            <div class="alert alert-success">
            {{$user->photo}}
            </div>
            @endif
        <input type="file" class="form-control" name="photo">
        </div>
        <div class="form-group">
        <label class="form-label" for="">nama</label>
        <input type="text" name="nama" value={{$user->nama}} class="form-control">
        </div>
        <div class="form-group">
            <label class="form-label" for="">Company Name</label>
    <input type="text" name="companyName"  class="form-control" value={{$user->companyName}}>
        </div>
        <div class="form-group">
            <label class="form-label" for="">Company Profile</label>
    <textarea name="companyProfile"  class="form-control"  cols="20" rows="5">{{$user->companyProfile}}</textarea> 
        </div>
    <div class="form-group">
        <label for="" class="form-label">Address</label>
    <textarea name="location" id="" cols="20" class="form-control"  rows="5"> {{$user->location}} </textarea> 
    </div>
    
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</div>
</body>
 <!-- Bootstrap core JavaScript-->
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
