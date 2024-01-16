<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Office Management System</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Loding... -->
    <div class="container-fluid bg-white fixed-top h-100 w-100" id="siteloding">
        <div class="row h-100">
            <div class="loader m-auto">
                <img src="{{ asset('loding.gif') }}" alt="loging..." width="160">
            </div>
        </div>
    </div>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Brother's Dream IT Ltd.</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        @auth
                        <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Dashboard</a>
                        @else
                        <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>

                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">
                        <span style="font-size: 30px">Welcome to </span><br />Brother's Dream IT Ltd.
                    </h1>
                    <hr class="divider my-4" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">
                        It's an Office Management System for Brother's Dream IT Ltd.
                    </p>
                    <a class="btn btn-light btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">We've got what you need!</h2>
                    <hr class="divider light my-4" />
                    <p class="text-white-50 mb-4 text-justify">
                        IT is a web-based application, using this a medium size office can be easily managed.
                        This system has functionality like Records of employees, Attendance, Project
                        Distribution, Accounts, Event management, overall performance, and working progress
                        report can be easily maintained and mange by this software.
                    </p>
                    <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">At Your Service</h2>
            <hr class="divider my-4" />
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Web Application</h3>
                        <p class="text-muted mb-0">
                            We develop all kinds of web application for your business
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Content Writing</h3>
                        <p class="text-muted mb-0">We have top quality professional content writer</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Marketing</h3>
                        <p class="text-muted mb-0">
                            We have profession marketing team for your business growth
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">SEO</h3>
                        <p class="text-muted mb-0">
                            Our top quality seo expert will increase your website ranking
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img class="img-fluid" src="../assets/img/portfolio/thumbnails/1.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">HRM</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img class="img-fluid" src="../assets/img/portfolio/thumbnails/2.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Content Writing</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img class="img-fluid" src="../assets/img/portfolio/thumbnails/3.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Application</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img class="img-fluid" src="../assets/img/portfolio/thumbnails/4.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Demonstration</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img class="img-fluid" src="../assets/img/portfolio/thumbnails/5.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">SEO</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img class="img-fluid" src="../assets/img/portfolio/thumbnails/6.jpg" alt="" />
                        <div class="portfolio-box-caption p-3">
                            <div class="project-name">Marketing</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Let's Get In Touch!</h2>
                    <hr class="divider my-4" />
                    <p class="text-muted mb-5">
                        Ready to start your next project with us? Give us a call or send us an email and we
                        will get back to you as soon as possible!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div>+880 1670-201031</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                    <a class="d-block" href="mailto:contact@yourwebsite.com">info@brothersdreamit.com</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center" style="color: #b1b1b1">Copyright © 2020 - Brother's Dream IT Ltd.</div>
            <div class="small text-center" style="color: #b1b1b1">
                Office Management System - Developed by Farzana Islam Boby
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" </script> <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js">
    </script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        $(document).ready(function () {
        var myVar = setInterval(loding, 3000);
        function loding() {
          $("#mainNav").attr('style','display: block !important');
          $("#siteloding").fadeOut("slow", function () {
            $("#siteloding").remove();
          });
        }
      });
    </script>

</body>

</html>