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




                                <div class="table-responsive font-10 form" >
                                    <table id="example" class="table table-striped table-bordered second p-b-10" style="text-align: center; width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th ><input type="text" style="border: none; text-align: center" value="نام و نام خانوادگی"></th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>6</th>
                                            <th>7</th>
                                            <th>8</th>
                                            <th>9</th>
                                            <th>10</th>
                                            <th>11</th>
                                            <th>12</th>
                                            <th>13</th>
                                            <th>14</th>
                                            <th>15</th>
                                            <th>16</th>
                                            <th>17</th>
                                            <th>18</th>
                                            <th>19</th>
                                            <th>20</th>
                                            <th>21</th>
                                            <th>22</th>
                                            <th>23</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                            <th>28</th>
                                            <th>29</th>
                                            <th>30</th>
                                            <th>31</th>
                                            <th>توضیحات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($persenellist  as $index=> $row)
                                            @php($day = ['0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                                '11',
                                '12',
                                '13',
                                '14',
                                '15',
                                '16',
                                '17',
                                '18',
                                '19',
                                '20',
                                '21',
                                '22',
                                '23',
                                '24',
                                '25',
                                '26',
                                '27',
                                '28',
                                '29',
                                '30',
                                '31'

                                ])
                                            @foreach($listhozoor  as $r)

                                                @if($r->hdate== ($moon."-"."01") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[1]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."02") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[2]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."03") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[3]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."04") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[4]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."05") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[5]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."06") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[6]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."07") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[7]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."08") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[8]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."09") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[9]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."10") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[10]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."11") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[11]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."12") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[12]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."13") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[13]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."14") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[14]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."15") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[15]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."16") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[16]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."17") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[17]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."18") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[18]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."19") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[19]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."20") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[20]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."21") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[21]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."22") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[22]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."23") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[23]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."24") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[24]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."25") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[25]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."26") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[26]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."27") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[27]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."28") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[28]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."29") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[29]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."30") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[30]="checked")
                                                @endif
                                                @if($r->hdate== ($moon."-"."31") && $r->id_persnel==$row->sh_persenel)
                                                    @php($day[31]="checked")
                                                @endif


                                            @endforeach

                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td >{{$row->nam}} {{$row->family}} </td>
                                                <td><input disabled type="checkbox" {{$day[1]}}></td>
                                                <td><input disabled type="checkbox" {{$day[2]}}></td>
                                                <td><input disabled type="checkbox" {{$day[3]}}></td>
                                                <td><input disabled type="checkbox" {{$day[4]}}></td>
                                                <td><input disabled type="checkbox" {{$day[5]}}></td>
                                                <td><input disabled type="checkbox" {{$day[6]}}></td>
                                                <td><input disabled type="checkbox" {{$day[7]}}></td>
                                                <td><input disabled type="checkbox" {{$day[8]}}></td>
                                                <td><input disabled type="checkbox" {{$day[9]}}></td>
                                                <td><input disabled type="checkbox" {{$day[10]}}></td>
                                                <td><input disabled type="checkbox" {{$day[11]}}></td>
                                                <td><input disabled type="checkbox" {{$day[12]}}></td>
                                                <td><input disabled type="checkbox" {{$day[13]}}></td>
                                                <td><input disabled type="checkbox" {{$day[14]}}></td>
                                                <td><input disabled type="checkbox" {{$day[15]}}></td>
                                                <td><input disabled type="checkbox" {{$day[16]}}></td>
                                                <td><input disabled type="checkbox" {{$day[17]}}></td>
                                                <td><input disabled type="checkbox" {{$day[18]}}></td>
                                                <td><input disabled type="checkbox" {{$day[19]}}></td>
                                                <td><input disabled type="checkbox" {{$day[20]}}></td>
                                                <td><input disabled type="checkbox" {{$day[21]}}></td>
                                                <td><input disabled type="checkbox" {{$day[22]}}></td>
                                                <td><input disabled type="checkbox" {{$day[23]}}></td>
                                                <td><input disabled type="checkbox" {{$day[24]}}></td>
                                                <td><input disabled type="checkbox" {{$day[25]}}></td>
                                                <td><input disabled type="checkbox" {{$day[26]}}></td>
                                                <td><input disabled type="checkbox" {{$day[27]}}></td>
                                                <td><input disabled type="checkbox" {{$day[28]}}></td>
                                                <td><input disabled type="checkbox" {{$day[29]}}></td>
                                                <td><input disabled type="checkbox" {{$day[30]}}></td>
                                                <td><input disabled type="checkbox" {{$day[31]}}></td>
                                                <td><input type="text" ></td>


                                            </tr>
                                        @endforeach


                                        </tbody>

                                    </table>


                                </div>








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
                        افسون گستر آذین طراح :    <a href="https://deyara.ir" class="text-center">پشتیبانی گروه دیارا</a>.
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
