<!DOCTYPE html>
<html lang="en">
<head>

     <title>ABSENSI</title>
<!--

DIGITAL TREND

https://templatemo.com/tm-538-digital-trend

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="assets/template/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/template/css/font-awesome.min.css">
     <link rel="stylesheet" href="assets/template/css/aos.css">
     <link rel="stylesheet" href="assets/template/css/owl.carousel.min.css">
     <link rel="stylesheet" href="assets/template/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="assets/template/css/templatemo-digital-trend.css">

</head>
<body>

     <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
              ABSENSI
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    </nav>


     <!-- HERO -->
     <section class="hero hero-bg d-flex justify-content-center align-items-center">
               <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                              <div class="hero-text">
                                   <h2 class="text-white" data-aos="fade-up">JGN LP ABSEN Y</h2>
                                  @if (Route::has('login'))
                                  @auth
                                    <a href="{{ url('/home') }}" class="custom-btn btn-bg btn mt-3"data-aos="fade-up" data-aos-delay="100">Home</a>
                                  @else
                                    <a href="{{ route('login') }}" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">LOGIN</a>
                                  @endauth
                                  @endif
                              </div>
                        </div>

                        <div class="col-lg-6 col-12">
                          <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

                            <img src="assets/template/images/working-girl.png" class="img-fluid" alt="working girl">
                          </div>
                        </div>

                    </div>
               </div>
     </section>
     <!-- SCRIPTS -->
     <script src="assets/template/js/jquery.min.js"></script>
     <script src="assets/template/js/bootstrap.min.js"></script>
     <script src="assets/template/js/aos.js"></script>
     <script src="assets/template/js/owl.carousel.min.js"></script>
     <script src="assets/template/js/smoothscroll.js"></script>
     <script src="assets/template/js/custom.js"></script>

</body>
</html>
