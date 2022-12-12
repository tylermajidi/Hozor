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
    <script src="../assets/libs/js/easy-number-separator.js"></script>
    <title> میز کار کارمند (لیست حقوق)  </title>



<body>
<div class=" navbakmain  "><span class="fa-lg fa fa-fw fa-home"></span> <a  href="/karmand/dashboard"  class="   "> < صفحه اصلی  </a></div>


    <!-- ============================================================== -->

    <div class="">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">


                <div class="container-fluid  dashboard-content rtl text-right">


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0 ">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">لیست حقوق </h5>
                                <p>شما میتوانید با استفاده از فیلتر توسط هر یک از ستون ها پرداختی مورد نظر را جستجو و با انتخاب هر یک اطلاعات کامل را مشاهده کنید.</p>
                                <span class="badge badge-info">ماه و سال : </span>
                                {{$sal}}/{{$mah}}

                                <span class="badge badge-info">جستجو و فیلتر :</span>
                                <input id="searchinputlist" class=" m-2  col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12" type="text" placeholder="فیلتر...">

                                <form action="#" method="POST" >
                                    @csrf
                                    <div class="form-group row">
                                        <label class="p-l-25 p-r-20">انتخاب ماه</label>
                                        <select  id="mah"  required="" name="mah" class="custom-control col-1 ">

                                            <option value="1">فروردین</option>
                                            <option value="2">اردیبهشت</option>
                                            <option value="3">خرداد</option>
                                            <option value="4">تیر</option>
                                            <option value="5">مرداد</option>
                                            <option value="6">شهریور</option>
                                            <option value="7">مهر</option>
                                            <option value="8">آبان</option>
                                            <option value="9">آذر</option>
                                            <option value="10">دی</option>
                                            <option value="11">بهمن</option>
                                            <option value="12">اسفند</option>

                                        </select>
                                        <label class="p-l-25 p-r-20">انتخاب سال</label>
                                        <select  id="sal"  required="" name="sal" class="custom-control col-1  ">

                                            <option value="1398">1398</option>
                                            <option value="1399">1399</option>
                                            <option value="1400">1400</option>
                                            <option value="1401">1401</option>
                                            <option value="1402">1402</option>
                                            <option value="1403">1403</option>
                                            <option value="1404">1404</option>
                                            <option value="1405">1405</option>


                                        </select>
                                        <label class="p-l-25 p-r-20">انتخاب قرارداد</label>
                                        <select   required="" name="gharardad" class="custom-control col-2  ">

                                            @foreach($listgharardad   as  $rowgh)
                                                <option value="{{$rowgh->id}}">{{$rowgh->namegharardad}}</option>
                                            @endforeach


                                        </select>
                                        <label class="p-l-25 p-r-20">نوع محاسبه</label>
                                        <select   required="" name="classic" class="custom-control col-2  ">

                                                <option value="classic">نسخه سنتی</option>
                                                <option value="normal">نسخه نرمال</option>


                                        </select>
                                        <button type="submit"  class="m-r-20  btn-outline-primary ">نمایش لیست </button>

                                    </div>
                                </form>



                            </div>


                            <div class="card-body">



                                <div class="table-responsive">
                                    <input type="checkbox" style="width:20px;height: 20px" onclick="selectall(this)" ><span> انتخاب همه </span>
                                    <table id="listperseneltable" class=" table table-bordered  font-10" style=" text-align: center; width:100%">
                                        <thead class="">
                                        <tr>
                                            <th style="width:20px">ردیف</th>
                                            <th style="width:20px">انتخاب</th>
                                            <th>نام پرسنل</th>
                                            <th> کد پرسنل</th>
                                            <th> روز کارکرد</th>
                                            <th>شیفت اول</th>
                                            <th> شیفت دوم</th>
                                            <th>نوبت کاری</th>
                                            <th> مرخصی روز</th>

                                            <th> حقوق روزانه</th>
                                            <th> حقوق ماهیانه</th>
                                            <th> بن</th>
                                            <th> مسکن/خواروبار</th>
                                            <th>حق اولاد </th>
                                            <th> پایه سنوات</th>
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
                                            <th> مانده قابل پرداخت</th>
                                            <th>خالص حقوق</th>
                                        </tr>
                                        </thead>
                                        <tbody style="text-align: center">

                                        @foreach($TLHS  as $index=> $row)
                                            <tr>
                                                 <td>{{$index+1}}</td>
                                                 <td>@if($row->mande !=0) <input onclick="chengesum()" type="checkbox" style="width:20px;height: 20px"> @endif</td>
                                                <td>{{$row->p_name}}</td>
                                                <td>{{$row->c_p}}</td>
                                                <td @if($row->all_day >31) class="bg-danger" @endif>{{$row->all_day}} </td>
                                                <td>{{$row->day_day}}</td>
                                                <td>{{$row->night_day}}</td>
                                                <td>{{$row->nobat_day}}</td>
                                                <td>{{$row->leave_day}}</td>
                                                <td>{{$row->hog_day}}</td>
                                                <td>{{$row->hog_moon}}</td>
                                                <td>{{$row->bon}}</td>
                                                <td>{{$row->mas_khar}}</td>
                                                <td>{{$row->h_olad}}</td>
                                                <td>{{$row->p_san}}</td>
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
                                                <td>{{$row->mande}}</td>
                                                <td>{{$row->jam_gh_mash - $row->s_bime- $row->maliyat}}</td>
                                            </tr>
                                        @endforeach


                                        </tbody>

                                    </table>
                                    <button type="button" onclick="GenerateTable()" class="  btn btn-outline-primary m-t-20 ">  پرینت گزارش/ آماده سازی برای اکسل</button>
                                </div>


                                <!-- ---------------------------------------------------- -->

                                <form   action="/karmand/pardakh_H" method="Post"> @csrf <input hidden name="sal" value="{{$sal}}"> <input hidden name="mah" value="{{$mah}}"> <input hidden type="text" id="jslist" name="jslist" value=""> <input hidden type="text" id="jspay" name="jspay" value=""><button  type="submit" onclick="GetSelectedhogogh()"  class="float-left btn-outline-primary m-t-10  ">ثبت پرداخت حقوق افراد انتخابی </button> </form>
                                <span class="p-b-10"> جمع کل  : </span> <input class="m-b-10 text-left ltr number-separator" type="text" readonly id="txtsum">






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

    <script src="../assets/libs/js/easy-number-separator.js"></script>

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
    $(document).ready(function(){
        $("#searchinputlist").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#listperseneltable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>



    <script>
        function GetSelectedhogogh() {
            //Reference the Table.

            var grid = document.getElementById("listperseneltable");

            //Reference the CheckBoxes in Table.
            var checkBoxes = grid.getElementsByTagName("INPUT");
            var jsarray = new Array();
            var jsarray2 = new Array();
            //Loop through the CheckBoxes.
            for (var i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                    var row = checkBoxes[i].parentNode.parentNode;
                    jsarray[i] =  row.cells[3].innerHTML;
                    jsarray2[i] =  row.cells[26].innerHTML;
                }
            }


            var myJSON = JSON.stringify(jsarray);
            document.getElementById('jslist').value = myJSON;
            var myJSON2 = JSON.stringify(jsarray2);
            document.getElementById('jspay').value = myJSON2;


        }
    </script>

    <script>
        function selectall($this) {
            //Reference the Table.

            var grid = document.getElementById("listperseneltable");
             $sum=0;

            //Reference the CheckBoxes in Table.
            var checkBoxes = grid.getElementsByTagName("INPUT");
            //Loop through the CheckBoxes.
            for (var i = 0; i < checkBoxes.length; i++) {
                if($this.checked==true)
                    checkBoxes[i].checked=true;
                else
                    checkBoxes[i].checked=false;
                var row = checkBoxes[i].parentNode.parentNode;
                 $sum=$sum + (row.cells[26].innerHTML*1);

            }
            if($this.checked==false)
                document.getElementById('txtsum').value = 0;
            else
            document.getElementById('txtsum').value = $sum;



        }
    </script>

<script>
    function chengesum() {
        //Reference the Table.

        var grid = document.getElementById("listperseneltable");
        $sum=0;

        //Reference the CheckBoxes in Table.
        var checkBoxes = grid.getElementsByTagName("INPUT");
        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {

            if(checkBoxes[i].checked==true) {
                                var row = checkBoxes[i].parentNode.parentNode;
                                $sum=$sum + (row.cells[26].innerHTML*1);
                                     }

        }

            document.getElementById('txtsum').value = $sum;



    }
</script>


</body>
</html>
