@extends('panel_admin.layout_admin')



@section('PageTitle') میزکار مدیر (ساماندهی پرسنل)  @stop
@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') صفحه نظم دهی پرسنل  @stop
@section('PageHeaderInfo') @stop
@section('PageAddress') نظم دهی پرسنل  @stop
@section('PageCardName')ساماندهی پرسنل و تعریف هر یک برای فعالیت در قرارداد ها@stop
@section('PageCardInfo') ثبت و ویرایش فعالیت پرسنل در قرارداد های مختلف و جهت دسترسی آسان تر سرپرست به لیست حضور و ...@stop

@section('PageCardData')


    <!-- --------------- -->

    <div class="dropdown text-md-left p-b-20">
        <div id="" class="top-search-bar col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <input id="searchinputlist" class="form-control" type="text" placeholder="فیلتر...">
        </div>
    </div>

    <div class="table-responsive">
        <table id="listperseneltable" class="table table-striped table-bordered second font-12" style=" text-align: center; width:100%">
            <thead class=" ">
            <tr>
                <th style="width:40px">ردیف</th>
                <th style="width:40px">انتخاب</th>
                <th>ش پ</th>
                <th> نام پرسنل</th>

                <th > قرارداد</th>




            </tr>
            </thead>
            <tbody style="text-align: center">

            @foreach($ListPersenel  as $index=> $row)
                <tr >
                    <td>{{$index+1}}</td>
                    <td><input type="checkbox" style="width:25px;height: 25px"></td>
                    <td>{{$row->sh_persenel}}</td>
                    <td>{{$row->nam}}  {{$row->family}}</td>


                    <td >{{$row->namegharardad}}</td>




                </tr>
            @endforeach

            </tbody>

        </table>

    </div>


    <form id="myform1" action="/admin/SetSarparast" method="post">
        @csrf


                    <input hidden name="jsa" id="jsa" type="text" >
        <div class="form-group row">
            <label class="p-l-25 p-r-20">انتخاب قرارداد</label>

            <select  id="gharardadid"  required="" name="gharardadid" class="custom-control col-2 ">

                @foreach($listgharardad   as  $row)
                    <option value="{{$row->id}}">{{$row->namegharardad}}</option>
                @endforeach

            </select>

            <label class="p-l-25 p-r-20">انتخاب شیفت</label>

            <select disabled id="shiftkar"  required="" name="shiftkar" class="custom-control col-2  ">

                <option value="sobh">صبح</option>
                <option value="asr">عصر</option>
                <option value="shab">شب</option>


            </select>

            <label class="p-l-25 p-r-20">انتخاب سرپرست</label>

            <select disabled id="sarparastid"  required="" name="sarparastid" class="custom-control col-2 ">

              {{--   @foreach($listsarparast  as  $row)
                     <option value="{{$row->username}}">{{$row->name}}</option>
                 @endforeach--}}
                <option value="-">-</option>
            </select>





            <button type="button"  onclick="GetSelected();ptos_message()" class="m-r-20  btn-outline-primary ">ثبت و اعمال </button>

        </div>

    </form>



@stop




@section('PageScript')


        <script type="text/javascript">
            function GetSelected() {
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
                        jsarray[i] =  row.cells[2].innerHTML;
                        //jsarray2[i] =  row.cells[2].innerHTML;
                    }
                }


                var myJSON = JSON.stringify(jsarray);
                document.getElementById('jsa').value = myJSON;
                // var myJSON2 = JSON.stringify(jsarray2);
                // document.getElementById('jsa2').value = myJSON2;


            }
    </script>

        <script>
        function ptos_message() {


            swal({title: "نظم دهی پرسنل", text: "آیا مایل به ثبت فرم هستید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, بله ',]

            })
                .then((willDelete) => {
                    if (willDelete) {

                        document.getElementById("myform1").submit();

                    } else {


                    }
                });

        }
    </script>
@endsection
