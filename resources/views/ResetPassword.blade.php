<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>تغییر رمز عبور</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center">
            <a href="login"><img class="logo-img m-b-10 loginimg" src="assets/images/logo.png" alt="logo">
            </a><span class="splash-description  text-right rtl font-14">لطفا نام کاربری و رمز عبور فعلی و جدید را وارد کنید.</span>
        </div>

        <div class="card-body">

            @if(session('msg_state')=="Success")
                {{session(['msg_state' => 'nomsg'])}}
                <div class="alert alert-success alert-dismissible font-12">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>موفقیت آمیز : </strong> {{session('msg')}}
                </div>
            @endif
            @if(session('msg_state')=="warning")
                {{session(['msg_state' => 'nomsg'])}}
                <div class="alert alert-warning alert-dismissible font-12">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>عملیات ناموفق : </strong> {{session('msg')}}
                </div>
            @endif
            @if(session('msg_state')=="danger")
                {{session(['msg_state' => 'nomsg'])}}
                <div class="alert alert-danger alert-dismissible font-12">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>عملیات ناموفق : </strong> {{session('msg')}}
                </div>
            @endif


            <form id="fResetpass" action="/ResetPassword" method="POST" >
                @csrf
                <div class="form-group">
                    <input value="{{session("username")}}" name="username" readonly  class="form-control form-control-lg text-center"   type="text" placeholder="نام کاربری کد ملی" autocomplete="off">
                </div>
                <div class="form-group">
                    <input name="password" class="form-control form-control-lg text-center"  type="password" placeholder="رمز عبور فعلی">
                </div>
                <div class="form-group">
                    <input name="newpassword" class="form-control form-control-lg text-center"  type="password" placeholder="رمز عبور جدید">
                </div>
                @php

                    echo captcha_img('flat');

                @endphp
                <div class="form-group">
                    <input name="captcha" autocomplete="off" class="form-control form-control-lg text-center"  type="text" placeholder="کد امنیتی ">
                </div>

                <div class="form-group pt-1"><button type="submit" class="btn btn-block btn-primary btn-xl" > ذخیره </button></div>
            </form>
        </div>

    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>

<script>
    $(".flogin").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>

<?php
include('jdf.php');
$timenow = time();
@session(['thisdate' => jdate('Y/m/d', '','','','en') ]);
$timeiran = jdate("زمان بارگزاری صفحه : H:i:s - تاریخ: Y/m/d",$timenow);

?>
