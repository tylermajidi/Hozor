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

    <title> میز کار کارمند (فرم تسویه و ترک کار)  </title>



<body>


    <!-- ============================================================== -->

    <div class="">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">


                <div class="container-fluid  dashboard-content rtl text-right">


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0 ">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 text-center">فرم تسویه حساب شرکت افسون گستر آذین طراح</h5>
                                <p> فرم تسویه حساب پرسنل در تاریخ : {{session('thisdate')}}</p>

                                <span class="badge badge-info">کد پرسنل : </span>
                            <b>    {{$persenel->sh_persenel}}  </b>

                                <span class="badge badge-info">نام و نام خانوادگی :</span>
                                <b>    {{$persenel->nam}}  {{ $persenel->family}} </b>

                                <span class="badge badge-info">کد ملی : </span>
                                <b>    {{$persenel->sh_meli}} </b>
                                <span class="badge badge-info">شماره بیمه : </span>
                                <b>  {{$persenel->sh_bime}} </b>

                            </div>


                            <div class="card-body">



                                <div class="table-responsive">
                                    <table id="listperseneltable" class=" table table-bordered  font-10" style=" text-align: center; width:100%">
                                        <thead class="">
                                        <tr>
                                            <th style="width:20px">ردیف</th>
                                            <th>ماه کارکرد</th>
                                            <th> روز کارکرد</th>
                                            <th> مرخصی روز</th>
                                            <th> حقوق ماهیانه</th>
                                            <th> بن</th>
                                            <th> مسکن/خواروبار</th>
                                            <th>حق اولاد </th>

                                            <th> اضافه کاری </th>
                                            <th>مبلغ اضافه کاری</th>
                                            <th>جریمه/کسورات </th>
                                            <th>ساعت مرخصی</th>
                                            <th> جمع مشمول بیمه</th>
                                            <th> مشمول و غیر مشمول</th>
                                            <th>سهم بیمه شده </th>
                                            <th> مالیات</th>
                                            <th> مساعده</th>
                                            <th>نوبت کاری / حق شیفت </th>
                                            <th> پاداش /مزایا</th>
                                            <th> کل حقوق</th>
                                            <th> مانده قابل پرداخت</th>
                                        </tr>
                                        </thead>
                                        <tbody style="text-align: center">

                                        @foreach($TLHS  as $index=> $row)
                                            <tr>
                                                 <td>{{$index+1}}</td>
                                                <td>{{$row->mdate}}</td>
                                                <td>{{$row->all_day}}</td>

                                                <td>{{$row->leave_day}}</td>

                                                <td>{{$row->hog_moon}}</td>
                                                <td>{{$row->bon}}</td>
                                                <td>{{$row->mas_khar}}</td>
                                                <td>{{$row->h_olad}}</td>

                                                <td>{{$row->sat_ezafe}}</td>
                                                <td>{{$row->mablagh_ezafe}}</td>
                                                <td>{{$row->jarime}}</td>
                                                <td>{{$row->sat_moakhasi}}</td>
                                                <td>{{$row->jam_mash}}</td>
                                                <td>{{$row->jam_gh_mash}}</td>
                                                <td>{{$row->s_bime}}</td>
                                                <td>{{$row->maliyat}}</td>
                                                <td>{{$row->mosa}}</td>

                                                <td>{{$row->hagh_shift}}</td>
                                                <td>{{$row->padash}}</td>
                                                <td>{{$row->kolnotpay}}</td>
                                                <td>{{$row->mande}}</td>
                                            </tr>
                                        @endforeach


                                        </tbody>

                                    </table>
                                </div>

                                <span class="badge badge-info">عیدی : </span>
                                <span class="badge badge-brand number-separator"> {{$eydi}} </span>

                                <span class="badge badge-info">حق سنوات :</span>
                                <span class="badge badge-brand number-separator">  {{$haghsanavat}}</span>

                                <span class="badge badge-info">حق مرخصي :</span>
                                <span class="badge badge-brand number-separator">  {{$bazkharidmorakhasi}}</span>

                                <span class="badge badge-info">جمع کل حقوق : </span>
                                <span class="badge badge-brand number-separator"> {{$jamkol}}</span>

                                <span class="badge badge-info">قابل پرداخت : </span>
                                <span class="badge badge-brand number-separator" > {{$khaless}}</span>


                            </br>
                                اینجانب     {{$persenel->nam}}  {{ $persenel->family}}  فرزند  {{$persenel->Father}} دارای شناسنامه {{$persenel->sh_sh}}  کد ملی {{$persenel->sh_meli}} کارگر شرکت افسون گستر آذین طراح تایید می نمایم که تمامی مطالبات خود اعم از حقوق پایه و حق مسکن و حق سنوات و عیدی و پاداش و مرخصی و تمام موارد قانونی را تا تاریخ {{session('thisdate')}}  دریافت نموده ام و هم چنین مبالغ مندرج در جدول بالای همین صفحه را دریافت نموده و هیچگونه ادعایی در حال یا آینده علیه شرکت افسون گستر آذین طراح  ندارم و نخواهم داشت .
</br>
                                نام و امضاء

                                <!-- ---------------------------------------------------- -->
                                <form   action="/karmand/SetTark" onsubmit="return tarkmessage()" method="Post"> @csrf  <input hidden name="id" value="{{$id}}">  <button  type="submit"  class="float-left btn-outline-success m-t-10  ">فرم را پرینت گرفته و تایید میکنم.</button> </form>







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

    function GenerateTable(){



        var featureTable = document.getElementById("listperseneltable");
        var tablePopup = window.open("", "", "");
        tablePopup.document.write('<!DOCTYPE html><meta charset="utf-8"> <style type="text/css">#listperseneltable{direction: rtl}</style>');
        tablePopup.document.write('<html><head><link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/><script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"><\/script></head><body></body></html>');
        tablePopup.document.write(featureTable.outerHTML);
        tablePopup.document.close();
        map.addControl(sidebar);
        sidebar.setContent(featureTable);
        sidebar.toggle();
    }
</script>


    <script>
        function tarkmessage() {

            var r = confirm("آیا مایل به ترک کار  و  تسویه پرسنل هستید پس از تایید دیگر قابل تغییر نیست انجام شود ؟");
            if (r == true) {

                //deleted

            } else {

                return false;
            }

        }
    </script>









</body>
</html>
