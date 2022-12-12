<html lang="en"><head>
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

    <link rel="stylesheet" href="../assets/libs/css/select2.min.css">
    <script src="../assets/libs/js/select2.min.js"></script>

    <title> میز کار کارمند (تاریخچه پرداختی ها)  </title>



<body>

<div class="">
    <!-- ============================================================== -->

    <div class="">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">


                <div class="container-fluid  dashboard-content rtl text-right">


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">لیست پرداختی های شرکت به پرسنل  --- مساعده</h5>
                                <p>شما میتوانید با استفاده از فیلتر توسط هر یک از ستون ها پرداختی مورد نظر را جستجو و با انتخاب هر یک اطلاعات کامل را مشاهده کنید.</p>
                                <span class="badge badge-info">ماه و سال : </span>
                                {{$date_pay}}

                                <span class="badge badge-info">تاریخ ثبت در سیستم : </span>
                                {{$datesabt}}
                                <span class="badge badge-info">جستجو و فیلتر :</span>
                                <input id="searchinputlist" class=" m-2  col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12" type="text" placeholder="فیلتر...">
                                <form  class=""  action="/karmand/GetListpayDataFile" method="Post"> @csrf <input type="hidden" name="idmo" value="{{$idmo}}"><button type="submit"  class=" btn-brand active"> دریافت تمامی شماره حساب ها </button> </form>

                            </div>


                            <div class="card-body">



                                <div class="table-responsive">
                                    <table id="listperseneltable" class="table table-striped table-bordered second font-14" style=" text-align: center; width:100%">
                                        <thead class=" ">
                                        <tr>
                                            <th style="width:40px">ردیف</th>
                                            <th>نام پرسنل</th>
                                            <th> کد پرسنل</th>
                                            <th> کد ملی</th>
                                            <th>حساب بانکی</th>
                                            <th> مبلغ</th>


                                        </tr>
                                        </thead>
                                        <tbody style="text-align: center">

                                        @foreach($datalistofpa  as $index=> $row)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$row->nam}}   {{$row->family}}</td>
                                                <td>{{$row->sh_persenel}}</td>
                                                <td>{{$row->sh_meli}}</td>
                                                <td>{{$row->sh_hesab}}</td>
                                                <td>{{$row->mony}}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="bg-secondary-light">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="bg-secondary-light">جمع کل پرداختی</td>
                                            <td class="bg-secondary-light">{{$summony}}</td>
                                        </tr>
                                        </tbody>

                                    </table>

                                </div>


                                <!-- ---------------------------------------------------- -->







                            </div>
                        </div>
                    </div>





                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->

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

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>







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







</body>
</html>
