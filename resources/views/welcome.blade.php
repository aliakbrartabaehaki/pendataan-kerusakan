<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Badan Penelitian dan Pengembangan Kementerian Pertahanan RI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@100..1000&family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="assetss/lib/animate/animate.min.css">
    <link href="assetss/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="assetss/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assetss/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assetss/css/style.css" rel="stylesheet">

    <!-- CSS untuk merapikan gambar favicon di navbar -->
    <style>
        .navbar-brand-img {
            max-width: 95px; /* Menetapkan ukuran maksimal gambar */
            height: auto; /* Menjaga proporsi gambar */
            object-fit: contain; /* Menjaga gambar tetap dalam batas area tanpa terpotong */
            display: block; /* Menghindari adanya jarak bawah yang tidak diinginkan */
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
        <div class="container">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        <div class="border-end border-primary pe-3">
                            <a href="https://www.google.co.id/maps/place/Balitbang+Kemhan+RI/@-6.3142809,106.7895586,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69ef5c6e0e243f:0x7596ffe67f9af2bb!8m2!3d-6.3142862!4d106.7921335!16s%2Fg%2F11n18hc3j1?entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D" class="text-muted small">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i> Balitbang Kemhan Pondok Labu, Jakarta Selatan
                            </a>
                        </div>
                        <div class="ps-3">
                            <!-- <a href="mailto:balitbang@gmail.com" class="text-muted small"> -->
                                <i class="fas fa-envelope text-primary me-2"></i> balitbang@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <img src="{{ asset('favicon.ico') }}" alt="logo" class="navbar-brand-img">
                <h1 class="text-primary mb-0">Balitbang Kemhan RI</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="d-flex ms-auto align-items-center">
                        <!-- Kontak -->
                        <div class="d-none d-xl-flex align-items-center me-3">
                            <a class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                                <i class="fa fa-phone-alt fa-2x"></i>
                                <div class="position-absolute" style="top: 7px; right: 12px;">
                                    <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                </div>
                            </a> 
                            <div class="d-flex flex-column ms-3">
                                <span>Kontak</span>
                                <!-- <a href="tel:(021)7502086"> -->
                                    <span class="text-dark">(021) 7504466</span></a>
                            </div>
                        </div>
                        <!-- Tombol Login -->
                        <a href="/login" class="btn btn-primary rounded-pill py-2 px-4">Masuk</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->

   <!-- Carousel Start -->
<div class="header-carousel owl-carousel">
    <div class="header-carousel-item bg-primary">
        <div class="carousel-caption">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7 animated fadeInLeft">
                        <div class="text-sm-center text-md-start">
                            <h1 class="display-1 text-white mb-4"></h1>
                            <img src="{{ asset('aban123.png.png') }}" alt="logo" class="img-fluid" style="max-width: 70%; height: auto;">
                            <h2 class="text-white text-uppercase fw-bold mb-4">Pelaporan Kerusakan Barang Elektronik</h2>
                        </div>
                    </div>
                    <div class="col-lg-5 animated fadeInRight">
                        <div class="carousel-img" style="object-fit: cover;">
                            <!-- Placeholder for Image -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-carousel-item bg-primary">
        <div class="carousel-caption">
            <div class="container">
                <div class="row gy-4 gy-lg-0 gx-0 gx-lg-5 align-items-center">
                    <div class="col-lg-5 animated fadeInLeft">
                        <div class="carousel-img">
                            <!-- Placeholder for Image -->
                        </div>
                    </div>
                    <div class="col-lg-7 animated fadeInRight">
                        <div class="text-sm-center text-md-end">
                        <img src="{{ asset('aban123.png.png') }}" alt="logo" class="img-fluid" style="max-width: 70%; height: auto;">
                            <h1 class="display-1 text-white mb-4"></h1>
                            <!-- <img src="{{ asset('ali123.png.png') }}" alt="logo" class="img-fluid" style="max-width: 35%; height: auto;"> -->
                           
                            <h2 class="text-white text-uppercase fw-bold mb-4">Pelaporan Kerusakan Barang Elektronik</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-light text-dark py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <p class="mb-0">© 2024 Balitbang Kemhan RI. Hak Cipta Dilindungi Undang-Undang.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a> -->

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assetss/lib/wow/wow.min.js"></script>
    <script src="assetss/lib/easing/easing.min.js"></script>
    <script src="assetss/lib/waypoints/waypoints.min.js"></script>
    <script src="assetss/lib/counterup/counterup.min.js"></script>
    <script src="assetss/lib/lightbox/js/lightbox.min.js"></script>
    <script src="assetss/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="assetss/js/main.js"></script>
</body>

</html>
