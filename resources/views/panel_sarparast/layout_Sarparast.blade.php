@if(session('userlevel')!="sarparast")
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
    <link rel="stylesheet" href="../assets/libs/pcalender/css/persianDatepicker-default.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <script src="../assets/libs/js/pace.min.js"></script>
    <link href="../assets/libs/css/pace-theme-loading-bar.css" rel="stylesheet" />

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
            <a class="navbar-brand " href="/sarparast/dashboard">میزکار سرپرست</a>
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
                                    <li class="nav-item border-right border-3 ">
                                        <a class="nav-link" href="/sarparast/dashboard"> <i class="fa fa-fw fa-home m-l-10"></i>پیشخوان</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link" href="/sarparast/PageShowMyEvent"><i class="fas fa-history m-l-10"></i>  تاریخچه فعالیت من</a>
                                    </li>

                                </ul>

                            </li>


                            <li class="nav-divider text-right">
                                کارکرد روزانه / اداری
                            </li>
                            <li class="nav-item rtl text-right ">
                                <ul class="nav flex-column">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/sarparast/PageShowListPersenel"> <i class="fas fa-users m-l-10"></i>حضور روزانه</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/sarparast/PageHozoorMahPersenel"> <i class="fas fa-users m-l-10"></i>حضور ماهانه(سنتی)</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/sarparast/PageListPersenelShercati"> <i class="fas fa-users m-l-10"></i>اضافه کار شرکتی</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/sarparast/PageListPersenelErja"> <i class="fas fa-users m-l-10"></i>اضافه کار ارجائی</a>
                                    </li>
                                    <li class="nav-item " hidden>
                                        <a class="nav-link" href="/sarparast/#"> <i class="fas fa-users m-l-10"></i>مرخصی ساعتی</a>
                                    </li>

                                    <li class="nav-item " hidden>
                                        <a class="nav-link" href="#"> <i class="fa fa-fw fa-home m-l-10"></i> ویرایش درخواست ها </a>
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
                                        <a class="nav-link" href="/logout"> <i class="fa fa-fw fa-window-close  m-l-10"></i>خروج از سیستم</a>
                                    </li>
                                </ul>
                            </li>



                        </ul>
                    </div>
                </nav>
            </div>


            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 657px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
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
                                                        <strong>عملیات ناموفق : </strong> {{ $error }}
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
                        {{session('nameshercat')}}   <a  href="https://deyara.ir" class="text-center">گروه دیارا</a>.
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
<script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="../assets/libs/js/dashboard-ecommerce.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>



<script  src="../assets/libs/pcalender/js/jquery-1.10.1.min.js"></script>
<script  src="../assets/libs/pcalender/js/persianDatepicker.min.js"></script>







</body>

</html>


@yield('PageScript')





<script>

    var p = new persianDate();
    $("#tgetdate").persianDatepicker({
        cellWidth: 40,
        cellHeight: 28,
        fontSize: 15,

        onSelect: function () {

            formSearch();
        }

    });

</script>
<script>
    function formSearch() {
        document.getElementById("formserchresualt").submit();
    }
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


