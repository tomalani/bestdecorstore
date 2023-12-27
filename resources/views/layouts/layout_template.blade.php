<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- title of site -->
    <title>Best Decorstore</title>

    <!-- For favicon png -->
    <link re<!doctype html>
    <html class="no-js" lang="en">
    
    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--font-family-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
            rel="stylesheet">
    
        <!-- title of site -->
        <title>Best Decorstore</title>
    
        <!-- For favicon png -->
        <link rel="shortcut icon" type="image/icon" href="{{ url('assets/logo/favicon.png') }}" />
    
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
    
        <!--linear icon css-->
        <link rel="stylesheet" href="{{ url('assets/css/linearicons.css') }}">
    
        <!--animate.css-->
        <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}">
    
        <!--owl.carousel.css-->
        <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}">
    
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap-theme.min.css') }} ">
    
        <!-- bootsnav -->
        <link rel="stylesheet" href="{{ url('assets/css/bootsnav.css') }}">
    
        <!--style.css-->
        <link rel="stylesheet" href="{{ url('assets/css/style-theme.css') }}">
    
        <!--responsive.css-->
        <link rel="stylesheet" href="{{ url('assets/css/theme-responsive.css') }}">
    </head>
    
    <body>
        <!-- top-area Start -->
        <div class="top-area">
            <div class="header-area">
                <!-- Start Navigation -->
                <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70"
                    data-minus-value-mobile="55" data-speed="1000">

                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Search -->

                    <div class="container">
                        @if(\Request::route()->getName() != 'cart')
                        <!-- Start Atribute Navigation -->
                        <div class="attr-nav">                                
                            <livewire:cart-nav />
                        </div><!--/.attr-nav-->
                        <!-- End Atribute Navigation -->
                        @endif

                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="{{ route('home') }}">best<span>decorstore</span>.</a>

                        </div><!--/.navbar-header-->
                        <!-- End Header Navigation -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                                <li class="active"><a href="{{ route('home') }}">home</a></li>
                                <li class=""><a href="#">product</a></li>
                                <li class=""><a href="#">contact</a></li>
                            </ul><!--/.nav -->
                        </div><!-- /.navbar-collapse -->
                    </div><!--/.container-->
                </nav><!--/nav-->
                <!-- End Navigation -->
            </div><!--/.header-area-->
            <div class="clearfix"></div>

        </div><!-- /.top-area-->
        <!-- top-area End -->
    
        <!-- Content section -->
        @yield('content')
    
        <!-- Include common scripts -->
    
    
        <!--sofa-collection start -->
    <section id="sofa-collection">
        <div class="owl-carousel owl-theme" id="collection-carousel">
            <div class="sofa-collection collectionbg1">
                <div class="container">
                    <div class="sofa-collection-txt">
                        <h2>unlimited sofa collection</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <div class="sofa-collection-price">
                            <h4>strting from <span>$ 199</span></h4>
                        </div>
                        <button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
                            view more
                        </button>
                    </div>
                </div>
            </div><!--/.sofa-collection-->
            <div class="sofa-collection collectionbg2">
                <div class="container">
                    <div class="sofa-collection-txt">
                        <h2>unlimited dainning table collection</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <div class="sofa-collection-price">
                            <h4>strting from <span>$ 299</span></h4>
                        </div>
                        <button class="btn-cart welcome-add-cart sofa-collection-btn" onclick="window.location.href='#'">
                            view more
                        </button>
                    </div>
                </div>
            </div><!--/.sofa-collection-->
        </div><!--/.collection-carousel-->

    </section><!--/.sofa-collection-->
    <!--sofa-collection end -->

    <!--newsletter strat -->
    <section id="newsletter" class="newsletter">
        <div class="container">
            <div class="hm-footer-details">
                <div class="row">
                    <div class=" col-md-3 col-sm-6 col-xs-12">
                        <div class="hm-footer-widget">
                            <div class="hm-foot-title">
                                <h4>information</h4>
                            </div><!--/.hm-foot-title-->
                            <div class="hm-foot-menu">
                                <ul>
                                    <li><a href="#">about us</a></li><!--/li-->
                                    <li><a href="#">contact us</a></li><!--/li-->
                                </ul><!--/ul-->
                            </div><!--/.hm-foot-menu-->
                        </div><!--/.hm-footer-widget-->
                    </div><!--/.col-->
                    <div class=" col-md-3 col-sm-6 col-xs-12">
                        <div class="hm-footer-widget">
                            <div class="hm-foot-title">
                                <h4>collections</h4>
                            </div><!--/.hm-foot-title-->
                            <div class="hm-foot-menu">
                                <ul>
                                    <li><a href="#">wooden chair</a></li><!--/li-->
                                    <li><a href="#">royal cloth sofa</a></li><!--/li-->
                                    <li><a href="#">accent chair</a></li><!--/li-->
                                    <li><a href="#">bed</a></li><!--/li-->
                                    <li><a href="#">hanging lamp</a></li><!--/li-->
                                </ul><!--/ul-->
                            </div><!--/.hm-foot-menu-->
                        </div><!--/.hm-footer-widget-->
                    </div><!--/.col-->
                    <div class=" col-md-3 col-sm-6 col-xs-12">
                        <div class="hm-footer-widget">
                            <div class="hm-foot-title">
                                <h4>my accounts</h4>
                            </div><!--/.hm-foot-title-->
                            <div class="hm-foot-menu">
                                <ul>
                                    <li><a href="#">my account</a></li><!--/li-->

                                    <li><a href="#">my cart</a></li><!--/li-->
                                </ul><!--/ul-->
                            </div><!--/.hm-foot-menu-->
                        </div><!--/.hm-footer-widget-->
                    </div><!--/.col-->
                    <div class=" col-md-3 col-sm-6  col-xs-12">
                        <div class="hm-footer-widget">
                            <div class="hm-foot-title">
                                <h4>newsletter</h4>
                            </div><!--/.hm-foot-title-->
                            <div class="hm-foot-para">
                                <p>
                                    Subscribe to get latest news,update and information.
                                </p>
                            </div><!--/.hm-foot-para-->
                            <div class="hm-foot-email">
                                <div class="foot-email-box">
                                    <input type="text" class="form-control" placeholder="Enter Email Here....">
                                </div><!--/.foot-email-box-->
                                <div class="foot-email-subscribe">
                                    <span><i class="fa fa-location-arrow"></i></span>
                                </div><!--/.foot-email-icon-->
                            </div><!--/.hm-foot-email-->
                        </div><!--/.hm-footer-widget-->
                    </div><!--/.col-->
                </div><!--/.row-->
            </div><!--/.hm-footer-details-->

        </div><!--/.container-->

    </section><!--/newsletter-->
    <!--newsletter end -->

    <!--footer start-->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="hm-footer-copyright text-center">
                <div class="footer-social">
                    <p>
                        Copyright 2024 &copy; <a href="https://www.themesine.com/">BestDecorstore</a> All Rights Reserved.
                    </p><!--/p-->
                </div><!--/.text-center-->
            </div><!--/.container-->

            <div id="scroll-Top">
                <div class="return-to-top">
                    <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top"
                        title="" data-original-title="Back to Top" aria-hidden="true"></i>
                </div>
            </div><!--/.scroll-Top-->

    </footer><!--/.footer-->
    <!--footer end-->

    </body>
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    
    <script src="{{ url('assets/js/jquery.js') }}"></script>
    <!--bootstrap.min.js-->
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    
    <!-- bootsnav js -->
    <script src="{{ url('assets/js/bootsnav.js') }}"></script>
    
    <!--owl.carousel.js-->
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    
    <!--Custom JS-->
    <script src="{{ url('assets/js/custom.js') }}"></script>
    
    
    @yield('scripts')
    </html>
