@extends('panel_karmand.layout_Karmand')

@section('PageTitle') میز کار کارمند (چک)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader')ویرایش چک@stop
@section('PageHeaderInfo')ویرایش چک انتخابی@stop
@section('PageAddress') چک  @stop
@section('PageCardName')ویرایش چک@stop
@section('PageCardInfo') لطفا اطلاعات مربوط به چک را با دقت وارد کنید مهم ترین فیلد شمار چک میباشد.@stop
@section('PageCardData')




    <!-------------------------------------------->
    <form  method="POST" action="/karmand/EditCheck"   id="validationform" >
        @csrf
        <input name="sh_check2" value="{{$checkitem->sh_check}}" type="text"  hidden >

    <div class="form-group row ">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">شماره چک</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{$checkitem->sh_check}}" autocomplete="off" name="sh_check" type="text" required="" data-parsley-minlength="30"  class="form-control text-left ltr">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">مبلغ </label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{$checkitem->mablagh}}" autocomplete="off" name="mablagh" type="text" required="" data-parsley-maxlength="30" placeholder="" class="form-control text-left ltr number-separator">
        </div>
    </div>


    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">صاحب چک  </label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{$checkitem->ownercheck}}"  name="ownercheck" type="text" required=""  placeholder="" class="form-control ">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">دریافت کننده</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{$checkitem->daryaftkonande}}" autocomplete="off" name="daryaftkonande"  type="text" required=""  placeholder="" class="form-control ">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"> بانک</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{$checkitem->bank}}" name="bank" type="text" required=""  placeholder="" class="form-control ">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right">تاریخ سررسید</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{$checkitem->date_check}}" autocomplete="off" readonly name="date_check" id="date_check" type="text" required=""  placeholder="" class="form-control text-left ltr bg-light">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-sm-3 col-form-label text-sm-right"> شرح</label>
        <div class="col-12 col-sm-8 col-lg-6">
            <input value="{{$checkitem->des}}" name="des" required type="text"   placeholder="" class="form-control">
        </div>
    </div>


    <div class="form-group row ">
        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
            <button type="submit" class="btn btn-space btn-primary ">ذخیره ویرایش</button>

        </div>
    </div>
    </form>









@stop




