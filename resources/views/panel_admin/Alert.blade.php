@extends('panel_admin.layout_admin')



@section('PageTitle') میزکار مدیر (تابلو اعلانات)  @stop
@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') صفحه تابلو اعلانات @stop
@section('PageHeaderInfo') @stop
@section('PageAddress') تابلو اعلانات @stop
@section('PageCardName') لیست اعلانات ثبت شده شما@stop
@section('PageCardInfo') شما (مدیریت محترم سیستم) می توانید پیام های خود را بصورت گروهی ارسال کنید و ارسال پیام از سوی شما برای همه افراد متصل به سیستم نمایش داده میشود@stop

@section('PageCardData')

    <!-------------------------------------------->
    <form  method="POST" action="/admin/AddAlert"   id="validationform" >
        @csrf

        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">نوع پیام</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <select  id="state"  required="" name="state" class="custom-control col-4 ">

                    <option value="info">اطلاع</option>
                    <option value="warning">اخطار</option>
                    <option value="danger">خیلی فوری</option>


                </select>
            </div>
        </div>


            <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">تاریخ پایان</label>
            <div class="col-6 ">
                <input value="{{ old('enddate') }}" autocomplete="off" name="enddate" readonly  id="enddate" type="text" required=""  placeholder="" class="col-6 form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> شرح</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <textarea  id="message" name="message" class="form-control"></textarea>
            </div>
        </div>


        <div class="form-group row ">
            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                <button type="submit" class="btn btn-space btn-primary ">ذخیره اعلان</button>

            </div>
        </div>
    </form>






    <div class="table-responsive font-14 " >

        <table id="listperseneltable" class="table table-striped table-bordered second" style="text-align: center; width:100%">
            <thead>
            <tr>
                <th>پیام</th>
                <th>تاریخ انقضاء</th>
                <th>وضعیت</th>
                <th> عملیات</th>

            </tr>
            </thead>
            <tbody>

            @foreach($listalert  as $index=> $row)
                <tr>

                    <td>{{$row->message}}</td>

                    <td>{{$row->enddate}}</td>

                        @if($row->state=="danger")
                        <td class="bg-danger">خیلی فوری</td>
                        @endif
                        @if($row->state=="info")
                            <td class="bg-info">اطلاع</td>
                        @endif
                        @if($row->state=="warning")
                            <td class="bg-warning">اخطار</td>
                        @endif

                    <td  class="center"  style="
                            width: 130px;
                            padding-top: 1px;
                            padding-right: 1px;
                            padding-left: 1px;
                            padding-bottom: 1px;
                            border-left-width: 0px;
                            border-right-width: 0px;
                            border-top-width: 0px;
                            border-bottom-width: 0px;
                    ">

                            <div class="row m-0">
                                <form  class="p-1 small" action="/admin/PageEditAlert" method="Post"> @csrf <input type="hidden" name="id" value="{{$row->id}}"><button type="submit"  class=" rounded-bottom  btn-warning"> ویرایش </button> </form>
                                <form id="FormDeleteAlert[{{$row->id}}]"   class="p-1 small" class="p-1"  action="/admin/DeleteAlert"  method="Post"> @csrf <input type="hidden" name="id" value="{{$row->id}}"><button type="button" onclick="deletealanmessage({{$row->id}})"  class="rounded-bottom btn-danger"> حذف </button> </form>

                            </div>

                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>

    </div>





@stop


@section('PageScript')
    <script>
        function deletealanmessage($formid) {

         //   alert($formid);

            swal({title: "حذف کاربر", text: "آیا مایل به حذف کاربر انتخابی هستید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, بله موافقم',]

            })
                .then((willDelete) => {
                    if (willDelete) {


                        document.getElementById('FormDeleteAlert['+ $formid +']').submit();

                    } else {


                    }
                });

        }
    </script>
@endsection
