@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (چک)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader') لیست چک های صادر شده@stop
@section('PageHeaderInfo')نمایش و برررسی و کنترل چک های صادر شده یا تحویل داده شده.@stop
@section('PageAddress') چک  @stop
@section('PageCardName')لیست چک های ثبت شده@stop
@section('PageCardInfo') در این بخش شما میتوانید لیست چک ها در هر وضعیتی را مشاهده و جسنجو کنید.@stop
@section('PageCardData')


    <!-------------------------------------------->
    <form  method="POST" action="/karmand/AddCheck"   id="validationform" >
        @csrf
    <div class="form-group row ">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">شماره چک</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ old('sh_check') }}" autocomplete="off" name="sh_check" type="number" required="" data-parsley-minlength="30"  class="form-control text-left ltr">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">مبلغ </label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ old('mablagh') }}" autocomplete="off" name="mablagh" type="text" required="" data-parsley-maxlength="30" placeholder="" class="form-control text-left ltr number-separator">
        </div>
    </div>


    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">صاحب چک  </label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ old('ownercheck') }}" name="ownercheck" type="text" required=""  placeholder="" class="form-control ">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">دریافت کننده</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ old('daryaftkonande') }}" autocomplete="off" name="daryaftkonande"  type="text" required=""  placeholder="" class="form-control ">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"> بانک</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ old('bank') }}" name="bank" type="text" required=""  placeholder="" class="form-control ">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">تاریخ سررسید</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ old('date_check') }}" autocomplete="off" readonly name="date_check" id="date_check"   type="text" required  placeholder="" class="form-control text-left ltr bg-light">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"> شرح</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{ old('des') }}" name="des" required type="text"   placeholder="" class="form-control">
        </div>
    </div>


    <div class="form-group row ">
        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
            <button type="submit" class="btn btn-space btn-primary ">افزودن چک</button>

        </div>
    </div>
    </form>





    <div class="dropdown text-md-left p-b-20">
        <div id="" class="top-search-bar col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <input id="searchinputlist" class="form-control" type="text" placeholder="فیلتر...">
        </div>
    </div>
        <div class="table-responsive font-14 " >

            <table id="listperseneltable" class="table table-striped table-bordered second" style="text-align: center; width:100%">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>شماره چک</th>
                    <th>مبلغ</th>
                    <th> صاحب چک</th>
                    <th>دریافت کننده </th>
                    <th>بانک</th>
                    <th>تاریخ سرسید</th>
                    <th>شرح</th>
                    <th>-</th>
                    <th>عملیات</th>


                </tr>
                </thead>
                <tbody>
                    @foreach($listcheck  as $index=> $row)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$row->sh_check}}</td>
                    <td>{{$row->mablagh}}</td>
                    <td>{{$row->ownercheck}}</td>
                    <td>{{$row->daryaftkonande}}</td>
                    <td>{{$row->bank}}</td>
                    <td>{{$row->date_check}}</td>
                    <td>{{$row->des}}</td>
                    @if($row->state =="new")
                    <td class="text-danger ">...</td>
                        @endif
                    @if($row->state =="passed")
                        <td class="text-success ">پاس</td>
                    @endif

                    <td  class="center"  style="
                            width: 160px;
                            padding-top: 1px;
                            padding-right: 1px;
                            padding-left: 1px;
                            padding-bottom: 1px;
                            border-left-width: 0px;
                            border-right-width: 0px;
                            border-top-width: 0px;
                            border-bottom-width: 0px;
                    ">
                        @if($row->state !="passed")
                            <div class="row m-0">
                            <form  class="p-1 small" action="/karmand/PageEditCheck" method="Post"> @csrf <input type="hidden" name="sh_check" value="{{$row->sh_check}}"><button type="submit"  class=" rounded-bottom  btn-warning"> ویرایش </button> </form>
                            <form  class="p-1 small" class="p-1"  action="/karmand/DeleteCheck" id="formdeletemsg[{{$index+1}}]"  method="Post"> @csrf <input type="hidden" name="sh_check" value="{{$row->sh_check}}"><button type="button" onclick="deletemessage('{{$index+1}}')" class="rounded-bottom btn-danger"> حذف </button> </form>
                            <form  class="p-1 small"  action="/karmand/PassCheck"  id="formvosolmsg[{{$index+1}}]" method="Post"> @csrf <input type="hidden" name="sh_check" value="{{$row->sh_check}}"><button type="button" onclick="vosolmessage('{{$index+1}}')"  class="rounded-bottom btn-success"> وصول </button> </form>
                            </div>
                        @endif
                    </td>

                </tr>
                    @endforeach

                </tbody>

            </table>

        </div>



@stop




@section('PageScript')

    <script>
        function deletemessage($fid) {


            swal({title: "حذف", text: "آیا مایل به حذف چک موردنظر هستید؟",
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
        function vosolmessage($fid) {


            swal({title: "وصول چک", text: "از ثبت وصولی چک انتخابی اطمینان دارید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, بله موافقم',]

            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('formvosolmsg['+$fid+']').submit();

                    } else {


                    }
                });

        }
    </script>



@endsection
