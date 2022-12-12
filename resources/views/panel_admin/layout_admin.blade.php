@if(session('userlevel')!="admin")
    <script>window.location = "/";</script>
@endif

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

    <link rel="stylesheet" href="../assets/libs/css/select2.min.css"  />
    <script src="../assets/libs/js/select2.min.js"></script>

    <script src="../assets/libs/js/pace.min.js"></script>
    <link href="../assets/libs/css/pace-theme-loading-bar.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/libs/pcalender/css/persianDatepicker-default.css" />
    <script src="../assets/libs/js/sweetalert.min.js"></script>
    <title>@yield('PageTitle')</title>
</head>

<body>
@include('sweet::alert')
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header rtl">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand " href="#">میزکار مدیریت</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">

                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatartest.jpg" alt="" class="user-avatar-md rounded-circle"></a>


                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown  text-right rtl" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">@yield('NameUser')</h5>

                            </div>
                            <a class="dropdown-item" href="/PageResetPassword"><i class="fas fa-user ml-2"></i>ویرایش رمز عبور </a>
                            <a class="dropdown-item" href="/logout"><i class="fas fa-power-off ml-2"></i>خروج از سیستم</a>
                        </div>


                    </li>





                </ul>
            </div>
        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="menu-list" style="overflow: hidden; width: auto; height: 100%;">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">منو</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider text-right">
                                منو
                            </li>
                            <li class="nav-item rtl text-right ">


                                <ul class="nav flex-column">
                                    <li class="nav-item border-right border-3">
                                        <a class="nav-link" href="/admin/dashboard"> <i class="fa fa-fw fa-home m-l-10"></i>پیشخوان</a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="/admin/PageAddShowGharardad"> <i class=" fas fa-handshake m-l-10"></i>قرارداد ها (کارگاه) </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/PageShowSarparastPersenels"><i class="fas fa-chess m-l-10"></i>نظم دهی پرسنل</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/PageAlert"><i class=" fas fa-bell m-l-10"></i>تابلو اعلانات</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/admin/PageFirstConfig"> <i class="fas fa-sitemap m-l-10"></i>تنظیم قوانین پایه</a>
                                    </li>
                                </ul>

                            </li>




                            <li class="nav-divider text-right">
                                کاربران سیستم
                            </li>
                            <li class="nav-item rtl text-right ">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/admin/PageUsers"> <i class="fa fa-fw fa-users m-l-10"></i>کاربران سیستم</a>
                                    </li>

                                </ul>
                            </li>


                            <li class="nav-divider text-right">
                                پروفایل من
                            </li>
                            <li class="nav-item rtl text-right ">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/PageResetPassword"> <i class="fa fa-fw fa-key m-l-10"></i>تغییر رمز عبور</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/logout"> <i class="fa fa-fw fa-window-close m-l-10"></i>خروج از سیستم</a>
                                    </li>
                                </ul>
                            </li>



                        </ul>
                    </div>
                </nav>
            </div>


            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 68px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title text-right rtl">@yield('PageHeader') </h2>
                            <p class="text-right rtl">@yield('PageHeaderInfo')</p>

                            <div class="page-breadcrumb  rtl text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb ">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">پیشخوان</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">@yield('PageAddress') </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->

                <div class="container-fluid  dashboard-content rtl text-right">


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">@yield('PageCardName')</h5>
                                <p>@yield('PageCardInfo')</p>
                            </div>


                            <div class="card-body">

                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong> ناموفق : </strong> {{ $error }}
                                    </div>


                                @endforeach



                                @yield('PageCardData')



                            </div>
                        </div>
                    </div>





                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer rtl text-right">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        افسون گستر آذین طراح   <a  href="https://deyara.ir" class="text-center">گروه دیارا</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">درباره ما</a>
                            <a href="javascript: void(0);">راهنما</a>
                            <a href="javascript: void(0);">تماس با مدیریت</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="../assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->

<script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>



<script  src="../assets/libs/pcalender/js/jquery-1.10.1.min.js"></script>
<script  src="../assets/libs/pcalender/js/persianDatepicker.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script  src="../assets/libs/pcalender/js/persianDatepicker.min.js"></script>

<script src="../assets/libs/js/easy-number-separator.js"></script>

</body>

</html>

@yield('PageScript')


<script>

    $("#enddate").persianDatepicker({
        cellWidth: 40,
        cellHeight: 28,
        fontSize: 15
    });
    $("#date_start").persianDatepicker({
        cellWidth: 40,
        cellHeight: 28,
        fontSize: 15
    });
    $("#date_end").persianDatepicker({
        cellWidth: 40,
        cellHeight: 28,
        fontSize: 15
    });

</script>

<script>

    $(document).ready(function() {
        $('#sarparastid').select2();
    });
    $(document).ready(function() {
        $('#shiftkar').select2();
    });
    $(document).ready(function() {
        $('#gharardadid').select2();
    });
    $(document).ready(function() {
        $('#level').select2();
    });
    $(document).ready(function() {
        $('#state').select2();
    });
</script>
<script>
    $(document).ready(function(){
        $("#searchinputlist").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#listperseneltable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>







