@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (تاریخچه پرداختی ها)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader')تاریخچه پرداختی ها@stop
@section('PageHeaderInfo') تاریخچه پرداختی ها (مساعده و حقوق های پرداختی)@stop
@section('PageAddress') تاریخچه پرداختی ها  @stop
@section('PageCardName')لیست پرداختی های شرکت به پرسنل  --- مساعده@stop
@section('PageCardInfo')شما میتوانید با استفاده از فیلتر توسط هر یک از ستون ها پرداختی مورد نظر را جستجو و با انتخاب هر یک اطلاعات کامل را مشاهده کنید.@stop

@section('PageCardData')


    <!-- --------------- -->

    <div class="dropdown text-md-left p-b-20">
        <div id="" class="top-search-bar col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <input id="searchinputlist" class="form-control" type="text" placeholder="فیلتر...">
        </div>
        </div>

    <div class="table-responsive">
        <table id="listperseneltable" class="table table-striped table-bordered second" style=" text-align: center; width:100%">
            <thead class=" ">
            <tr>
                <th style="width:40px">ردیف</th>
                <th>تاریخ ثبت</th>
                <th> ماه پرداختی</th>
                <th> شرح واریز</th>
                <th style="width:130px" >...</th>
            </tr>
            </thead>
            <tbody style="text-align: center">

            @foreach($listpay  as $index=> $row)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$row->datesabt}}</td>
                    <td>{{$row->date_pay}}</td>
                    <td>{{$row->des}}</td>
                    <td   class="center" >

                            <div class="row m-0">
                                <form  class="p-1 small" action="/karmand/PageListpayData" method="Post"> @csrf <input type="hidden" name="idmo" value="{{$row->id}}"><input type="hidden" name="datesabt" value="{{$row->datesabt}}"> <input type="hidden" name="date_pay" value="{{$row->date_pay}}"> <button type="submit"  class=" btn-brand active"> نـمـایـش </button> </form>
                                <form  class="p-1 small" id="formdeletemsg2[{{$index+1}}]"  action="/karmand/DeleteMosaedeh" method="Post"> @csrf <input type="hidden" name="id" value="{{$row->id}}"><button type="button" onclick="deletemessage2('{{$index+1}}')" class=" btn-danger active"> حذف </button> </form>
                            </div>

                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>

    </div>


    <!-- ---------------------------------------------------- -->


    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">لیست پرداختی های شرکت به پرسنل  ----  حقوق</h5>
            <p>شما میتوانید با استفاده از فیلتر توسط هر یک از ستون ها پرداختی مورد نظر را جستجو و با انتخاب هر یک اطلاعات کامل را مشاهده کنید.</p>
        </div>


        <div class="card-body">

            <div class="dropdown text-md-left p-b-20">
                <div id="" class="top-search-bar col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                    <input id="searchinputlist2" class="form-control" type="text" placeholder="جستجو طبق ماه پرداختی ...">
                </div>
            </div>

            <div class="table-responsive">
                <table id="listperseneltable2" class="table table-striped table-bordered second" style=" text-align: center; width:100%">
                    <thead class=" ">
                    <tr style="">
                        <th style="width:40px">ردیف</th>
                        <th>تاریخ ثبت</th>
                        <th> ماه پرداختی</th>
                        <th>تعداد پرداخت</th>
                        <th>کل پرداختی</th>
                        <th style="width:130px">...</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center">

                    @foreach($listh  as $index=> $row)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$row->sdate}}</td>
                            <td>{{$row->mdate}}</td>
                            <td>{{$row->jamtedad}}</td>
                            <td>{{$row->jammony}}</td>
                            <td   class="center" >

                                <div class="row m-0">
                                    <form  class="p-1 small" action="/karmand/PageListpayData2" method="Post"> @csrf <input type="hidden" name="sdate" value="{{$row->sdate}}"> <input type="hidden" name="mdate" value="{{$row->mdate}}"> <button type="submit"  class=" btn-brand active"> نـمـایـش </button> </form>
                                    <form  class="p-1 small" id="formdeletemsg[{{$index+1}}]"  action="/karmand/DeleteHoghogh" method="Post"> @csrf <input type="hidden" name="sdate" value="{{$row->sdate}}"> <input type="hidden" name="mdate" value="{{$row->mdate}}"><button type="button" onclick="deletemessage('{{$index+1}}')"  class=" btn-danger active"> حذف </button> </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>






        </div>
    </div>

@stop




@section('PageScript')

    <script>
        function deletemessage($fid) {


            swal({title: "حذف", text: "آیا مایل به حذف لیست حقوق پرداختی انتخابی هستید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, تایید',]

            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('formdeletemsg['+$fid+']').submit();

                    } else {


                    }
                });

        }
    </script>


    <script>
        function deletemessage2($fid) {


            swal({title: "حذف", text: "آیا مایل به حذف لیست مساعده پرداختی انتخابی هستید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, تایید',]

            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('formdeletemsg2['+$fid+']').submit();

                    } else {


                    }
                });

        }
    </script>


@endsection
