<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ورود به میز کاربری</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html


        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            color: white;
                background-image: url("{{asset('assets/bgimg')}}/{{date("s")*1}}.jpg");
                background-repeat: no-repeat;
             background-size: cover;




        }




    </style>
</head>

<body >
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div   class="splash-container " id="ffff"   >
    <div class="card " style="background-color : rgba(255, 255, 255, 0.33); border: 1px solid rgba(0, 0, 0, 0.22);">
        <div class="card-header text-center" style="background-color : rgba(0, 0, 0, 0.6); border: 1px solid rgba(0, 0, 0, 0.22);">
            <a class="navbar-brand-login " href="/karmand/dashboard">{{session('nameshercat')}} </a>
            </a><span class="splash-description minicolors-with-opacity  text-right rtl font-12">جهت ورود به پنل کاربری نام کاربری و رمز عبور خود را وارد کنید</span>
        </div>

        <div class="card-body " >

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

            <form id="flogin" action="/login" method="POST" style="background-color : rgba(255,255,255,0.5)" >
                @csrf
                <div class="form-group" >
                    <input name="username"  class="form-control form-control-lg text-center"   type="text" placeholder="نام کاربری " autocomplete="off">
                </div>
                <div class="form-group">
                    <input name="password" class="form-control form-control-lg text-center"  type="password" placeholder="رمز عبور">
                </div>
                @if(session('try') >5)
                @php

                   echo captcha_img('flat');

                @endphp
                <div class="form-group">
                    <input name="captcha" autocomplete="off" class="form-control form-control-lg text-center"  type="text" placeholder="کد امنیتی ">
                </div>
                @endif
                <div class="form-group pt-1"><button type="submit" class="btn btn-block btn-primary btn-xl" >ورود به سیستم</button></div>

            </form>
        </div>
        <div class="card-footer p-0 m-0 text-center" style="background-color : rgba(0, 0, 0, 0.6); border: 1px solid rgba(0, 0, 0, 0.22);">
            <a style="color: #a4adb8; text-align: left" class=" " href="http://deyara.ir">deyara.ir  پشتیبانی</a>
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



<?php
include('jdf.php');
$timenow = time();
@session(['thisdate' => jdate('Y/m/d', '','','','en') ]);

$dateago =  date("Y-m-d", strtotime("10 day"));

$dateago2=explode('-',$dateago);

@session(['thisdate10ago' => gregorian_to_jalali($dateago2[0],$dateago2[1],$dateago2[2],'/') ]);

$timeiran = jdate("زمان بارگزاری صفحه : H:i:s - تاریخ: Y/m/d",$timenow);

?>

