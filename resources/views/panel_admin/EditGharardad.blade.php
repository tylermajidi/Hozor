@extends('panel_admin.layout_admin')



@section('PageTitle') میزکار مدیر (ویرایش قرارداد)  @stop
@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') صفحه ویرایش قرارداد  @stop
@section('PageHeaderInfo') @stop
@section('PageAddress') ویرایش قرارداد  @stop
@section('PageCardName') ویرایش قرارداد ثبت شده@stop
@section('PageCardInfo') @stop

@section('PageCardData')

    <form  method="POST" action="/admin/EditGharardad"   id="validationform" >
        @csrf
        <input name="id" value="{{$listgharadad->id}}" type="text"  hidden >
        <input name="numberkargah2" value="{{$listgharadad->numberkargah}}" type="text"  hidden >

        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">شرح (نام) قرارداد</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $listgharadad->namegharardad }}" autocomplete="off" name="namegharardad" type="text" required="" data-parsley-minlength="30"  class="form-control text-right rtl">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">شماره کارگاه </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $listgharadad->numberkargah }}" autocomplete="off"  name="numberkargah" type="text" required="" data-parsley-maxlength="30" placeholder="" class="form-control text-left ltr">
            </div>
        </div>


        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">ردیف پیمان</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $listgharadad->radifpeman}}" autocomplete="off" name="radifpeman" type="text" required=""  placeholder="" class="form-control  text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">نام کارفرما</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $listgharadad->karfamaname }}" autocomplete="off" name="karfamaname"  type="text" required=""  placeholder="" class="form-control ">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> نشانی کارگاه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $listgharadad->addressname }}"  name="addressname" type="text" required=""  placeholder="" class="form-control ">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">تاریخ شروع</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $listgharadad->date_start }}" autocomplete="off" name="date_start" id="date_start" readonly type="text" required=""  placeholder="" class="form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">تاریخ اتمام</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $listgharadad->date_end }}" autocomplete="off" name="date_end" id="date_end" readonly type="text" required  placeholder="" class="form-control text-left ltr">
            </div>
        </div>


        <div class="form-group row ">
            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                <button type="submit" class="btn btn-space btn-primary ">ذخیره ویرایش</button>

            </div>
        </div>
    </form>









@stop


