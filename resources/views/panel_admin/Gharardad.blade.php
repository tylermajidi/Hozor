@extends('panel_admin.layout_admin')


@section('PageTitle') میزکار مدیر (افزودن قرارداد)  @stop

@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') افزودن قرارداد های کاری  @stop
@section('PageHeaderInfo') @stop
@section('PageAddress') افزودن قرارداد @stop
@section('PageCardName')افزودن و ویرایش قرارداد های کاری @stop
@section('PageCardInfo') در این بخش شما میتوانید قرارداد های جدید را ثبت و اطلاعات قبلی را ویرایش کنید.@stop

@section('PageCardData')

    <form  method="POST" action="/admin/AddGharardad"   id="validationform" >
        @csrf
        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">شرح (نام) قرارداد</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('namegharardad') }}" autocomplete="off" name="namegharardad" type="text" required="" data-parsley-minlength="30"  class="form-control text-right rtl">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">شماره کارگاه </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('numberkargah') }}" autocomplete="off" name="numberkargah" type="text" required="" data-parsley-maxlength="30" placeholder="" class="form-control text-left ltr">
            </div>
        </div>


        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">ردیف پیمان</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('radifpeman') }}" autocomplete="off" name="radifpeman" type="text" required=""  placeholder="" class="form-control  text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">نام کارفرما</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('karfamaname') }}" autocomplete="off" name="karfamaname"  type="text" required=""  placeholder="" class="form-control ">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> نشانی کارگاه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('addressname') }}" name="addressname" type="text" required=""  placeholder="" class="form-control ">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">تاریخ شروع</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('date_start') }}" autocomplete="off" name="date_start" id="date_start" readonly type="text" required placeholder="" class="form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">تاریخ اتمام</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('date_end') }}" autocomplete="off" name="date_end" id="date_end" readonly type="text" required  placeholder="" class="form-control text-left ltr">
            </div>
        </div>


        <div class="form-group row ">
            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                <button type="submit" class="btn btn-space btn-primary ">ثبت قرار داد جدید</button>

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
                <th>نام کارگاه</th>
                <th>شماره کارگاه</th>
                <th>ردیف پیمان</th>
                <th>کارفرما</th>
                <th> نشانی کارگاه</th>
                <th>تاریخ شروع</th>
                <th>تاریخ اتمام</th>
                <th>عملیات</th>


            </tr>
            </thead>
            <tbody>

             @foreach($listgharadad  as $index=> $row)
                 <tr>
                     <td>{{$index+1}}</td>
                     <td>{{$row->namegharardad}}</td>
                     <td>{{$row->numberkargah}}</td>
                     <td>{{$row->radifpeman}}</td>
                     <td>{{$row->karfamaname}}</td>
                     <td>{{$row->addressname}}</td>
                     <td>{{$row->date_start}}</td>
                     <td>{{$row->date_end}}</td>
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
                         @if($row->state =="active")
                             <div class="row m-0">
                                 <form  class="p-1 small" action="/admin/PageEditGharardad" method="Post"> @csrf <input type="hidden" name="id" value="{{$row->id}}"><button type="submit"  class=" rounded-bottom  btn-warning"> ویرایش </button> </form>
                                 <form hidden  class="p-1 small" class="p-1"  action="#" onsubmit="return deletemessage()" method="Post"> @csrf <input type="hidden" name="id" value="{{$row->id}}"><button type="button"  class="rounded-bottom btn-danger"> حذف </button> </form>
                                 <form hidden class="p-1 small"               action="#"  method="Post"> @csrf <input type="hidden" name="id" value="{{$row->id}}"><button type="button"  class="rounded-bottom btn-info"> پایان </button> </form>
                             </div>
                         @endif
                     </td>

                 </tr>
             @endforeach

            </tbody>

        </table>

    </div>




@stop


