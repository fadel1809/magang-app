<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="/assets/image/logo-title.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <script type="text/javascript" src="main.js"></script>
    <title>Uhamka- Internship</title>


<body>
    @if ($errors->any())
      <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        
    </div>
    
        
    @endif
    <!--*NavBar-->
    <section class="navigation ">
        <nav class="navbar navbar-expand-lg bg-body-light">
  <div class="container-fluid container">
    <a class="navbar-brand" href="/">
    <img class="logo" src="{{asset('/assets/image/logo.jpg')}}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto d-flex">
        
      </ul>
      <a href={{route('user.register')}} class="btn btn-outline-primary rounded-5 ml-5 px-4">Daftar</a>
    </div>
  </div>
</nav>
    </section>
    <!--NavBar-->

    <!--*Header -->
    <section class="header">
        <div class="container">
            <div class="box-header">
                <!--? Kolom pertama-->
                <div class="box">
                    <h1>Uhamka Internship </h1>
                    <p>Di dalam program magang kami, Anda akan memiliki peluang untuk menjelajahi industri dan
                        membangun jaringan kontak yang berharga.
                    </p>
                    <a href="{{route('user.login')}}">
                        <button>Cari Magang</button>
                    </a>
                </div>

                <!--Kolom Kedua -->
                <div class="box">
                    <img src="/assets/image/Home.png" alt="Internship">
                </div>
            </div>
        </div>
    </section>
    <!--Card Swipe HTML-->
    <div class="body">
        <div class="container-2">
            <h1>Uhamka Internship</h1>
            <p>
                Pilih Jenis Magang Sesuai Jurusan Anda
            </p>
            <div class="slider">
                <div>
                    <a href="#">
                        <img src="/assets/image/Image_1.jpg" alt="Image 1">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="/assets/image/image_2.jpg" alt="Image 2">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="/assets/image/image_3.jpg" alt="Image 3">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="/assets/image/image_4.jpg" alt="Image 4">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="/assets/image/image_5.jpg" alt="Image 5">
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!--?Content3-->

    <!--?Content3-->


    <!--Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row d-flex justify-content-center">
                
                <div class="footer-col">

                    <p class="text-center" style="color: white;"><strong>Contact Us</strong></p>
                    <div class="social-links d-flex justify-content-center">
                        <a href="https://www.facebook.com/bpti.uhamka"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/bpti_uhamka"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/bpti.uhamka/"><i class="fab fa-instagram"></i></a>
                        <a href="https://id.linkedin.com/company/bptiuhamka"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>Copyright © 2023, BPTI UHAMKA. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Slick JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>



    <!-- Our Script -->
    <script>
        $(document).ready(function () {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 2500,
                dots: true
            });
        });

    </script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Slick JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Our Script -->
    <script>
        $(document).ready(function () {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 2500,
                dots: true
            });
        });
    </script>

    <script src="/dist/js/script.js"></script>

    <!--! Content 2-->

</body>

</html>