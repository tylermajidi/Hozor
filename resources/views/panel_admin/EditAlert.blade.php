@extends('panel_admin.layout_admin')



@section('PageTitle') میزکار مدیر (ویرایش تابلو اعلانات)  @stop
@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') صفحه ویرایش تابلو اعلانات @stop
@section('PageHeaderInfo') @stop
@section('PageAddress')ویرایش تابلو اعلانات @stop
@section('PageCardName') لیست اعلانات ثبت شده شما@stop
@section('PageCardInfo') شما (مدیریت محترم سیستم) می توانید پیام های خود را بصورت گروهی ارسال کنید و ارسال پیام از سوی شما برای همه افراد متصل به سیستم نمایش داده میشود@stop

@section('PageCardData')

    <!-------------------------------------------->
    <form  method="post" action="/admin/EditAlert"   id="validationform" >
        @csrf
        <input hidden="" value="{{$alertitem->id}}" name="id" id="id">
        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">نوع پیام</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <select  id="state"   required="" name="state" class="custom-control col-4 ">
                    <option value="info">اطلاع</option>
                    <option value="warning">اخطار</option>
                    <option value="danger">خیلی فوری</option>
                </select>
            </div>
        </div>


            <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">تاریخ پایان</label>
            <div class="col-6 ">
                <input value="{{$alertitem->enddate }}" autocomplete="off" name="enddate" readonly id="enddate" type="text" required=""  placeholder="" class="col-6 form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> شرح</label>
            <div class="col-12 col-sm-8 col-lg-6">
            <textarea  id="message" name="message" required="" class="form-control">{{$alertitem->message }}</textarea>
            </div>
        </div>


        <div class="form-group row ">
            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                <button type="submit" class="btn btn-space btn-primary ">ذخیره </button>

            </div>
        </div>
    </form>











@stop


