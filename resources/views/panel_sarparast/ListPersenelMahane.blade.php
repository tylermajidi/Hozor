@extends('panel_sarparast.layout_Sarparast')



@section('PageTitle') میزکار سرپرست (حضور غیاب ماهانه)  @stop
@section('NameUser'){{session('usernum')}}  @stop
@section('PageHeader') صفحه ثبت حضور غیاب ماهانه  - سنتی  @stop
@section('PageHeaderInfo')@stop
@section('PageAddress') حضور غیاب ماهانه  - سنتی  @stop
@section('PageCardName') حضور غیاب ماهانه  - سنتی @stop
@section('PageCardInfo')ثبت حضور غیاب ماهانه پرسنل بصورت دستی@stop

@section('PageCardData')


    <!-- --------------- -->

    <div class="dropdown text-md-left p-b-20">
        <div id="" class="top-search-bar col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <input id="searchinputlist" class="form-control" type="text" placeholder="فیلتر...">
        </div>
    </div>



    <div class="container ">






                    <form id="formserchresualt"  method="POST" action="/sarparast/PageHozoorMahPersenel2"  >
                        @csrf
                        <div class="form-group row">
                            <label class="p-l-25 p-r-20">انتخاب ماه</label>
                            <select  id="mah"  required="" name="mah" class="custom-control col-2 ">

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
                            <select  id="sal"  required="" name="sal" class="custom-control  ">

                                <option value="1398">1398</option>
                                <option value="1399">1399</option>
                                <option value="1400">1400</option>
                                <option value="1401">1401</option>
                                <option value="1402">1402</option>
                                <option value="1403">1403</option>
                                <option value="1404">1404</option>
                                <option value="1405">1405</option>


                            </select>

                            <button type="submit"  class="m-r-20  btn-outline-primary ">نمایش لیست </button>

                        </div>
            </form>











        <span class="badge badge-info">ماه و سال : </span>
        <span class="badge badge-brand">{{$sdate}}</span>

    <div class="table-responsive p-b-10">
        <table id="listperseneltable"   class="table table-striped table-bordered second sm-font-10" style=" text-align: center; ">
            <thead class=" ">
            <tr>
                <th hidden style="width:40px">ردیف</th>

                <th >شماره پرسنلی</th>
                <th > نام شخص</th>
                <th >روز</th>
                <th >شب</th>
                <th >نوبت</th>
                <th >مرخصی</th>

            </tr>
            </thead>
            <tbody style="text-align: center">

            @foreach($persenellist  as $index=> $row)
                <tr >
                    <td hidden>{{$index+1}}</td>

                    <td>{{$row->c_p}}</td>
                    <td>{{$row->p_name}}</td>

                    <td ><input name="saat" id="saat" type="number" value="{{$row->day_day}}" style="width:75px;text-align: center " placeholder="روز" ></td>
                    <td ><input name="saat" id="saat" type="number" value="{{$row->night_day}}" style="width:75px;text-align: center " placeholder="شب" ></td>
                    <td ><input name="saat" id="saat" type="number" value="{{$row->nobat_day}}" style="width:75px;text-align: center " placeholder="نوبت" ></td>
                    <td ><input name="saat" id="saat" type="number" value="{{$row->leave_day}}" style="width:75px;text-align: center " placeholder="مرخصی" ></td>



                </tr>
            @endforeach

            </tbody>

        </table>

    </div>

    <form id="FormSaveMahane" action="/sarparast/addٍٍHoozorMahaneSonati"  method="POST">
        @csrf


        <input type="text" hidden id="jsp" name="jsp">

        <input type="text" hidden id="jday" name="jday">
        <input type="text" hidden id="jnight" name="jnight">
        <input type="text" hidden id="jleave" name="jleave">
        <input type="text" hidden id="jnobat" name="jnobat">

        <input type="text" value="{{$sdate}}" hidden id="tdate" name="tdate">

        <button  type="button" onclick="GetMahane();SaveMahaneMessage()" class="btn-outline-success float-left m-l-10 " style="padding: 10px" >ذخیره فرم</button>
    </form>



@stop


@section('PageScript')

    <script>
        function SaveMahaneMessage() {


            swal({title: "ذخیره  ", text: "آیا مایل به ذخیره لیست حضور غیاب ماهانه هستید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, بله موافقم',]

            })
                .then((willDelete) => {
                    if (willDelete) {

                        document.getElementById("FormSaveMahane").submit();

                    } else {


                    }
                });

        }
    </script>


    <script type="text/javascript">
        function GetMahane() {

            var grid = document.getElementById("listperseneltable");
            var checkBoxes = grid.getElementsByTagName("INPUT");
            var jsarray = new Array();
            var jsarray2 = new Array();
            var jsarray3 = new Array();
            var jsarray4 = new Array();
            var jsarray5 = new Array();

            //Loop through the CheckBoxes.
          //  alert('fgh');
            for (var i = 0; i < checkBoxes.length; i++) {

                var row = checkBoxes[i].parentNode.parentNode;
                jsarray[i] =  row.cells[1].innerHTML;
                jsarray2[i]=row.cells[3].children[0].value;
                jsarray3[i]=row.cells[4].children[0].value;
                jsarray4[i]=row.cells[5].children[0].value;
                jsarray5[i]=row.cells[6].children[0].value;


            }



            var myJSON = JSON.stringify(jsarray);
            var myJSON2 = JSON.stringify(jsarray2);
            var myJSON3 = JSON.stringify(jsarray3);
            var myJSON4 = JSON.stringify(jsarray4);
            var myJSON5 = JSON.stringify(jsarray5);

            document.getElementById('jsp').value = myJSON;
            document.getElementById('jday').value = myJSON2;
            document.getElementById('jnight').value = myJSON3;
            document.getElementById('jnobat').value = myJSON4;
            document.getElementById('jleave').value = myJSON5;







        }

    </script>
@endsection
