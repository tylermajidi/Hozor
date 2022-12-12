@extends('panel_sarparast.layout_Sarparast')



@section('PageTitle') میزکار سرپرست (اضافه کاری ارجاعی)  @stop
@section('NameUser'){{session('usernum')}}  @stop
@section('PageHeader') صفحه ثبت اضافه کاری ارجاعی  @stop
@section('PageHeaderInfo')@stop
@section('PageAddress') اضافه کاری ارجاعی  @stop
@section('PageCardName') لیست پرسنل @stop
@section('PageCardInfo')ثبت  اضافه کاری ارجاعی پرسنل@stop

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

                <form id="formserchresualt"  method="POST" action="/sarparast/PageListPersenelErja2"  class=" ">
                    @csrf
                    <span class="badge-brand" >انتخاب روز حضور</span>
                    <input type="text"  value="@if($sdate!=null) {{$sdate}}@else {{session('thisdate')}} @endif" name="tgetdate" readonly id="tgetdate" class="form-control p-t-10 p-b-10 text-center bg-brand-light col-12">
                </form>


            </div>



        </div>
    </div>








    <div class="table-responsive p-b-10">
        <table id="listperseneltable"   class="table table-striped table-bordered second sm-font-10" style=" text-align: center; ">
            <thead class=" ">
            <tr>
                <th hidden style="width:40px">ردیف</th>

                <th >شماره پرسنلی</th>
                <th > نام شخص</th>
                <th >ساعت</th>

            </tr>
            </thead>
            <tbody style="text-align: center">

            @foreach($persenellist  as $index=> $row)
                <tr >
                    <td hidden>{{$index+1}}</td>

                    <td>{{$row->sh_persenel}}</td>
                    <td>{{$row->nam}} {{$row->family}}</td>
                    @if($row->ezafekar_erjaei==0)
                        <td ><input  name="saat" id="saat" type="number" value="" style="width:75px;text-align: center " placeholder="ساعت" ></td>
                    @else
                        <td ><input  name="saat" id="saat" type="number" value="{{$row->ezafekar_erjaei}}" style="width:75px;text-align: center " placeholder="ساعت" ></td>

                    @endif
                </tr>
            @endforeach

            </tbody>

        </table>

    </div>

    <form id="formsaveerja" action="/sarparast/addٍٍEzafeKarٍerjaei"  method="POST">
        @csrf
        <input type="text" hidden id="jsp" name="jsp">
        <input type="text" hidden id="jssat" name="jssat">
        <input type="text" hidden id="tdate" name="tdate">

        <button  type="button" onclick="GetEzafeErja();saveerjamessage()" class="btn-outline-success float-left m-l-10 " style="padding: 10px" >ذخیره فرم</button>
    </form>



@stop


    @section('PageScript')

        <script>
            function saveerjamessage() {


                swal({title: "ذخیره اضافه کاری ارجاعی", text: "آیا مایل به ذخیره لیست اضافه کار ارجاعی هستید؟",
                    icon: "warning",
                    buttons: true,
                    warningMode :true,
                    buttons: [ 'cancel, انصراف ','ok, بله موافقم',]

                })
                    .then((willDelete) => {
                        if (willDelete) {

                            document.getElementById("formsaveerja").submit();

                        } else {


                        }
                    });

            }
        </script>

        <script>

            function GetEzafeErja() {

                var grid = document.getElementById("listperseneltable");
                var checkBoxes = grid.getElementsByTagName("INPUT");

                var jsarray = new Array();
                var jsarray2 = new Array();
                //Loop through the CheckBoxes.
                for (var i = 0; i < checkBoxes.length; i++) {

                    var row = checkBoxes[i].parentNode.parentNode;
                    jsarray[i] =  row.cells[1].innerHTML;
                    jsarray2[i]=row.cells[3].children[0].value

                }



                var myJSON = JSON.stringify(jsarray);
                var myJSON2 = JSON.stringify(jsarray2);
                document.getElementById('jsp').value = myJSON;
                document.getElementById('jssat').value = myJSON2;
                document.getElementById('tdate').value =document.getElementById("tgetdate").value;




            }

        </script>

    @endsection
