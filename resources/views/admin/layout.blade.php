<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_assets/css/font-face.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin_assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">

    <!-- admin multiple images dynamic form custom js-->   
    <script src="{{asset('admin_assets/js/images_dynamic_form.js')}}"> </script>

    <!-- admin attribute dynamic form custom js-->   
    <script src="{{asset('admin_assets/js/attribute_dynamic_form.js')}}"> </script>
    
    

    

</head>

<body >


<div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <li class="@yield('active_dashboard')">
                            <a href="{{route('dashboard.index')}}">
                                <i class="fas fa-chart-bar"></i>Dashboard</a>
                        </li>
                        <li class="@yield('active_category')">
                            <a href="{{route('category.index')}}">
                            <i class="fas fa-align-left"></i>Category</a>
                        </li>
                        <li class="@yield('active_coupon')">
                            <a href="{{route('coupon.index')}}">
                            <i class="fas fa-ticket-alt"></i>Coupon</a>
                        </li>
                        <li class="@yield('active_size')">
                            <a href="{{route('size.index')}}">
                            <i class="fas fa-weight"></i>Size</a>
                        </li>
                        <li class="@yield('active_color')">
                            <a href="{{route('color.index')}}">
                            <i class="fas fa-paint-brush"></i>Color</a>
                        </li>
                        <li class="@yield('active_brand')">
                            <a href="{{route('brand.index')}}">
                            <i class="fas fa-bold"></i>Brand</a>
                        </li>
                        <li class="@yield('active_tax')">
                            <a href="{{route('tax.index')}}">
                            <i class="fab fa-tumblr-square"></i>Tax</a>
                        </li>
                        <li class="@yield('active_product')">
                            <a href="{{route('product.index')}}">
                            <i class="fas fa-archive"></i>Product</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('active_dashboard')">
                            <a href="{{route('dashboard.index')}}">
                                <i class="fas fa-chart-bar"></i>Dashboard</a>
                        </li>
                        <li class="@yield('active_category')">
                            <a href="{{route('category.index')}}">
                            <i class="fas fa-align-left"></i>Category</a>
                        </li>
                        <li class="@yield('active_coupon')">
                            <a href="{{route('coupon.index')}}">
                            <i class="fas fa-ticket-alt"></i>Coupon</a>
                        </li>
                        <li class="@yield('active_size')">
                            <a href="{{route('size.index')}}">
                            <i class="fas fa-weight"></i>Size</a>
                        </li>
                        <li class="@yield('active_color')">
                            <a href="{{route('color.index')}}">
                            <i class="fas fa-paint-brush"></i>Color</a>
                        </li>
                        <li class="@yield('active_brand')">
                            <a href="{{route('brand.index')}}">
                            <i class="fas fa-bold"></i>Brand</a>
                        </li>
                        <li class="@yield('active_tax')">
                            <a href="{{route('tax.index')}}">
                            <i class="fab fa-tumblr-square"></i>Tax</a>
                        </li>
                        <li class="@yield('active_product')">
                            <a href="{{route('product.index')}}">
                            <i class="fas fa-archive"></i>Product</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                              
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{asset('admin_assets/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{asset('admin_assets/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
                           
                            @yield('content')
                           
                          
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

</div>
 <!-- Jquery JS-->
    <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin_assets/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/select2/select2.min.js')}}"></script>
    
    <!-- Main JS-->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->