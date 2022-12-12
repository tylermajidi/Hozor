@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (لیست پرسنل)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader') لیست پرسنل@stop
@section('PageHeaderInfo') در این صفحه سیستم برای شما لیست تمام پرسنل را نمایش میدهد@stop
@section('PageAddress') لیست پرسنل  @stop
@section('PageCardName') لیست پرسنل@stop
@section('PageCardInfo') شما میتوانید با استفاده از فیلتر طبق هر فیلد لیست پرسنل را  تغییر دهید .@stop

@section('PageCardData')


    <!-- --------------- -->

    <div class="dropdown text-md-left p-b-20">
        <div id="" class="top-search-bar col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <input id="searchinputlist" class="form-control" type="text" placeholder="فیلتر...">
        </div>
    </div>

    <div class="table-responsive">
        <table id="listperseneltable" class="table table-hover" style="text-align: center;">
            <thead class=" ">
            <tr>
                <th>#</th>
                <th id="bt1"></th>
                <th id="bt2"></th>
                <th id="bt3"></th>
                <th>کد پرسنلی</th>
                <th> نام</th>
                <th>خانوادگی </th>
                <th> پدر</th>
                <th>کد ملی</th>
                <th>شماره شناسنامه </th>
                <th>شغل</th>
                <th>موبایل </th>



            </tr>
            </thead>
            <tbody>

            @foreach($persenellist  as $index=> $row)
                <tr >
                    <td  class="">{{$index+1}}</td>
                    <td  class="small"><form  action="/karmand/PageEditPersenel" method="Post"> @csrf <input type="hidden" name="id" value="{{$row->id}}"><button type="submit"  class=" btn-account "><li class="fa fa-edit  "> ویرایش </li></button> </form></td>
                    <td   class="small"><form  id="formdeletemsg[{{$row->id}}]" name="formdeletemsg" action="/karmand/DeletePersenel" method="Post"> @csrf <input type="hidden" name="id" value="{{$row->id}}"><input type="hidden" name="sh_persenel" value="{{$row->sh_persenel}}"><button type="button" onclick="deletemessage('{{$row->id}}')"  class="btn-account"><li class="fa fa-trash "> حذف </li></button> </form></td>
                    <td  class="small"><form id="formtarkmsg[{{$row->id}}]"  name="formtarkmsg"  action="/karmand/PageShowTasv"  method="Post"> @csrf <input type="hidden" name="id" value="{{$row->id}}"><button type="button"  onclick="tarkmessage('{{$row->id}}')" class=" btn-account "><li class="fa fa-save  "> ترک / تسویه </li></button> </form></td>


                    <td>{{$row->sh_persenel}}</td>
                    <td>{{$row->nam}}</td>
                    <td>{{$row->family}}</td>
                    <td>{{$row->Father}}</td>
                    <td>{{$row->sh_meli}}</td>
                    <td>{{$row->sh_sh}}</td>
                    <td>{{$row->job}}</td>
                    <td>{{$row->sh_phone}}</td>


                </tr>
            @endforeach

            </tbody>

        </table>

    </div>

    <div class="row p-r-10 p-t-10">
            <button type="button" onclick="GenerateTable2()"  class=" btn btn-outline-primary ">چاپ لیست</button>
        </div>


@stop




@section('PageScript')

    <script>
        function deletemessage($formid) {


            swal({title: "حذف", text: "آیا مایل به حذف اطلاعات انتخابی  هستید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, تایید',]

            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('formdeletemsg['+$formid+']').submit();

                    } else {


                    }
                });

        }
    </script>
    <script>
        function tarkmessage($formid) {


            swal({title: "ترک کار / تسویه", text: "آیا مایل به ترک کار و تسویه پرسنل هستید؟",
                icon: "warning",
                buttons: true,

                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, تایید',]

            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('formtarkmsg['+$formid+']').submit();

                    } else {


                    }
                });



        }
    </script>
@endsection
