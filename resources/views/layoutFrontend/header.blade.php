<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Callie HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <!-- NAV -->
        <div id="nav">
            <!-- Top Nav -->
            <div id="nav-top">
                <div class="container">
                    <!-- social -->
                    <ul class="nav-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <!-- /social -->

                    <!-- logo -->
                    <div class="nav-logo">
                        <a href="index.html" class="logo"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
                    </div>
                    <!-- /logo -->

                    <!-- search & aside toggle -->
                    <div class="nav-btns">
                        <button class="aside-btn"><i class="fa fa-bars"></i></button>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                        <div id="nav-search">
                            <form method="GET" action="{{ url('cari') }}">
                                <input class="input" name="cari" placeholder="Enter your search...">
                            </form>
                            <button class="nav-close search-close">
                                <span></span>
                            </button>
                        </div>
                    </div>
                    <!-- /search & aside toggle -->
                </div>
            </div>
            <!-- /Top Nav -->

            <!-- Main Nav -->
            <div id="nav-bottom">
                <div class="container">
                    <!-- nav -->
                    <ul class="nav-menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
                      @foreach ($category_widget as $cat)
                        <li><a href="{{ url('ListCategory',$cat->slug) }}">{{ $cat->name }}</a></li>
                        @endforeach
                        <li><a href="{{ url('ListBlog') }}">List  Posts</a></li>
                        <li><a href="#">about</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                    <!-- /nav -->
                </div>
            </div>
            <!-- /Main Nav -->

            <!-- Aside Nav -->
            <div id="nav-aside">
                <li><a href="{{ url('/') }}">Home</a></li>
                <ul class="nav-aside-menu">
                    <li><a href="index.html">Category</a></li>
                    <li class="has-dropdown"><a>Categories</a>
                        <ul class="dropdown">
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Health</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Contacts</a></li>
                    <li><a href="#">Advertise</a></li>
                </ul>
                <button class="nav-close nav-aside-close"><span></span></button>
            </div>
            <!-- /Aside Nav -->
        </div>
        <!-- /NAV -->
    </header>
    <!-- /HEADER -->
