@extends('panel_sarparast.layout_Sarparast')



@section('PageTitle') میزکار سرپرست (لیست پرسنل)  @stop
@section('NameUser'){{session('usernum')}}  @stop
@section('PageHeader') صفحه پیشخوان سرپرست  @stop
@section('PageHeaderInfo') در این صفحه سیستم برای شما لیست کامل افراد فعال در قراردادکاری شما را نمایش میدهد@stop
@section('PageAddress') لیست پرسنل  @stop
@section('PageCardName') لیست پرسنل @stop
@section('PageCardInfo') شما میتوانید در این صفحه حضور غیاب مربوط به بخش خود را ذخیره و ویرایش کنید و با تیک زدن یک یا چند پرسنل میتوانید برای آنها اضافه کاری و مرخصی ساعتی وارد کنید.@stop

@section('PageCardData')


    <!-- --------------- -->

    <div class="dropdown text-md-left p-b-20">
        <div id="" class="top-search-bar col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <input id="searchinputlist" class="form-control" type="text" placeholder="فیلتر...">
        </div>
    </div>



    <div class="container ">

        <div class="d-flex justify-content-around  ">



                <div class="input-group  float-right  col-md-8 col-sm-12 ">

                    <form id="formserchresualt"  method="POST" action="/sarparast/PageShowListPersenel2"  class=" ">
                        @csrf
                        <span class="badge-brand" >انتخاب روز حضور</span>
                    <input type="text"  value="@if($sdate!=null) {{$sdate}}@else {{session('thisdate')}} @endif" name="tgetdate" readonly id="tgetdate" class="form-control p-t-10 p-b-10 text-center bg-brand-light col-12">
                    </form>
                    <input  hidden type="number" placeholder="ساعت" name="tgettedad"  id="tgettedad" class="form-control col-3 text-center bg-brand-light">

                    <div class="input-group-append be-addon " hidden>
                        <button type="button" data-toggle="dropdown" class="btn btn-secondary  dropdown-toggle" aria-expanded="false">لیست عملیات</button>
                        <div class="dropdown-menu text-center" x-placement="bottom-start" style="position: absolute; transform: translate3d(162px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">



                            <form action="/sarparast/addMorakhasiSaati" onsubmit="GetSelected()" method="POST" >
                                @csrf
                                <input hidden name="jsa2" id="jsa2" >
                                <input hidden  name="tdate2" id="tdate2" >
                                <input hidden  name="ttedad2" id="ttedad2" >
                                <button type="submit"  class="dropdown-item">مرخصی ساعتی</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <form action="/sarparast/addٍٍEzafeKarSherkati" onsubmit="GetSelected()" method="POST" >
                                @csrf
                                <input hidden name="jsa3" id="jsa3" >
                                <input hidden  name="tdate3" id="tdate3" >
                                <input hidden  name="ttedad3" id="ttedad3" >
                                <button type="submit"  class="dropdown-item">اضافه کار شرکتی (ساعت)</button>
                            </form>
                            <form action="/sarparast/addٍٍEzafeKarٍerjaei" onsubmit="GetSelected()" method="POST" >
                                @csrf
                                <input hidden name="jsa4" id="jsa4" >
                                <input hidden  name="tdate4" id="tdate4" >
                                <input hidden  name="ttedad4" id="ttedad4" >
                                <button type="submit"  class="dropdown-item">اضافه کاری ارجاعی (ساعت)</button>
                            </form>


                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" hidden>ارسال درخواست صدور نامه اداری</a>



                        </div>
                    </div>
                </div>



        </div>
    </div>








    <div class="table-responsive p-b-10">
        <table id="listperseneltable"   class="table table-striped table-bordered second sm-font-10" style=" text-align: center; ">
            <thead class=" ">
            <tr>
                <th style="width:40px">ردیف</th>
                <th hidden style="width:40px">انتخاب</th>
                <th >شماره پرسنلی</th>
                <th > نام شخص</th>
                <th >وضعیت حضور </th>
                <th hidden>وضعیت حضور2</th>
                <th>...</th>
            </tr>
            </thead>
            <tbody style="text-align: center">

            @foreach($persenellist  as $index=> $row)
                <tr >
                    <td>{{$index+1}}</td>
                    <td hidden> <input type="checkbox" style="width:25px;height: 25px"></td>
                    <td>{{$row->sh_persenel}}</td>
                    <td>{{$row->nam}} {{$row->family}}</td>
                    <td>
                        @if($row->hstate=="day")
                             <span class="badge badge-primary font-12">حضور </span>
                        @endif
                        @if($row->hstate=="night")
                                <span class="badge badge-dark font-12"> شب</span>
                        @endif
                            @if($row->hstate=="Nobat")
                                <span class="badge btn-outline-primary  font-12">نوبت کاری</span>
                            @endif
                        @if($row->hstate=="Absence")
                            <span class="badge badge-danger font-12">غیبت</span>
                        @endif
                            @if($row->hstate=="Leave")
                                <span class="badge badge-warning  font-12 ">مرخصی</span>
                            @endif
                    </td>
                    <td hidden>{{$row->hstate}}</td>
                    <td  class="center"  style="">
                        @if(true)
                            <div class="" >
                                <button onclick="hozorsobhe(this)"  name="btnsobh" class=" btn-primary   rounded-bottom m-1 "> حضور </button>
                                <button onclick="hozorshab(this)"  name="btnshab" class=" btn-dark    rounded-bottom m-1"> شب </button>
                                <button onclick="hozornobat(this)"  name="btnshab" class=" btn-outline-primary     rounded-bottom  m-1"> نوبت </button>
                                <button onclick="hozormorakhas(this)"  name="btnshab" class=" btn-warning    rounded-bottom m-1"> مرخصی</button>
                                <button onclick="hozorno(this)"    name="btnghayeb" class="btn-danger rounded-bottom m-1"> غیبت </button>

                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>

    </div>

    <form id="formsavehozoor"   action="/sarparast/SaveHozoorRozane"  method="POST">
        @csrf
        <input type="text" hidden id="jsahozor1" name="jsahozor1">
        <input type="text" hidden id="jsahozor2" name="jsahozor2">
        <input type="text" hidden id="tdatehozor" name="tdatehozor">

        <button   type="button" onclick="GetSelectedhozorroz();savehozoormessage();" class="btn-outline-success float-left m-l-10 " style="padding: 10px" >ذخیره فرم حضور غیاب</button>
    </form>



@stop





@section('PageScript')

    <script>
            function GetSelectedhozorroz() {
                //Reference the Table.

                var grid = document.getElementById("listperseneltable");

                //Reference the CheckBoxes in Table.
                var checkBoxes = grid.getElementsByTagName("INPUT");
                var jsarray = new Array();
                var jsarray2 = new Array();
                //Loop through the CheckBoxes.
                for (var i = 0; i < checkBoxes.length; i++) {

                    var row = checkBoxes[i].parentNode.parentNode;
                    jsarray[i] =  row.cells[2].innerHTML;
                    jsarray2[i] =  row.cells[5].innerHTML;
                }



                var myJSON = JSON.stringify(jsarray);
                var myJSON2 = JSON.stringify(jsarray2);
                document.getElementById('jsahozor1').value = myJSON;
                document.getElementById('jsahozor2').value = myJSON2;
                document.getElementById('tdatehozor').value =document.getElementById("tgetdate").value;




            }
    </script>


<script>
        function savehozoormessage() {


            swal({title: "ذخیره حضورغیاب", text: "آیا مایل به ذخیره لیست حضور غیاب هستید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, بله موافقم',]

            })
                .then((willDelete) => {
                    if (willDelete) {

                        document.getElementById("formsavehozoor").submit();

                    } else {


                    }
                });

        }
    </script>


    <script>
        function hozorsobhe(ctl) {
            $row=  $(ctl).closest('tr').index();
            var x = document.getElementById("listperseneltable").rows[$row+1].cells;
            x[4].innerHTML = (' <span class=" badge badge-primary  font-12">حضور</span>');
            x[5].innerHTML="day";
        }
    </script>
    <script>
        function hozorshab(ctl) {
            $row=  $(ctl).closest('tr').index();
            var x = document.getElementById("listperseneltable").rows[$row+1].cells;
            x[4].innerHTML = (' <span class="badge badge-dark font-12">شب</span>');
            x[5].innerHTML="night";
        }
    </script>
    <script>
        function hozorno(ctl) {
            $row=  $(ctl).closest('tr').index();
            var x = document.getElementById("listperseneltable").rows[$row+1].cells;
            x[4].innerHTML = (' <span class="badge badge-danger font-12"> غیبت</span>');
            x[5].innerHTML="Absence";
        }
    </script>
    <script>
        function hozormorakhas(ctl) {
            $row=  $(ctl).closest('tr').index();
            var x = document.getElementById("listperseneltable").rows[$row+1].cells;
            x[4].innerHTML = (' <span class="badge badge-warning font-12">مرخصی</span>');
            x[5].innerHTML="Leave";
        }
    </script>
    <script>
        function hozornobat(ctl) {
            $row=  $(ctl).closest('tr').index();
            var x = document.getElementById("listperseneltable").rows[$row+1].cells;
            x[4].innerHTML = (' <span class=" btn-outline-primary font-12">نوبت کاری</span>');
            x[5].innerHTML="Nobat";
        }
    </script>


@endsection
