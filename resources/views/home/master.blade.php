<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Essence - Fashion Ecommerce Template</title>
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/jquery/my.js')}}"></script>

    <title>Toastr.js</title>
    @toastr_css
</head>

<body>
<!-- ##### Header Area Start ##### -->
<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="">Shopping</a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="#">Tùy chọn</a>
                            <ul class="dropdown">
                                <li><a href="{{route('products.shop')}}">Trang chủ</a></li>
                                <li><a href="">Ý kiến đóng góp</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form action="{{route('products.search')}}" method="get">
                    @csrf
                    <input type="search" name="search"  placeholder="Tìm kiếm sản phẩm" onchange="this.form.submit()">
                </form>
            </div>
            <div class="cart-area">
                <a href="{{route('carts.show')}}" class="text-danger"><i class="fas fa-shopping-cart"></i>
                    ({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})</a>
            </div>
            <div class="user-login-info">
                <a href="#"><i class="fas fa-user"></i></a>
            </div>
        </div>

    </div>
</header>
<div class="cta-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="cta-content bg-img background-overlay"
                     style="background-image: url({{asset('trrtrtr.jpg')}});">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('description')
<footer class="footer_area clearfix">
    <div class="container">
        <div class="row">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area d-flex mb-30">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <h2 class="text-white">Shopping</h2>
                    </div>
                    <!-- Footer Menu -->
                </div>
            </div>

        </div>

        <div class="row align-items-end">
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_social_area">
                        <label class="text-white">Đăng kí nhận thông tin</label>
                        <input type="email" class=" form-control" placeholder="Nhập email ">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p class="text-white">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                </p>
            </div>
        </div>

    </div>
</footer>
<!-- ##### Footer Area End ##### -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('js/plugins.js')}}"></script>
<!-- Classy Nav js -->
<script src="{{asset('js/classy-nav.min.js')}}"></script>
<!-- Active js -->
<script src="{{asset('js/active.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
</body>
@jquery
@toastr_js
@toastr_render
</html>
