@extends('panel_admin.layout_admin')



@section('PageTitle') میزکار مدیر (قوانین پایه)  @stop
@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') تنظیمات پایه سیستم  @stop
@section('PageHeaderInfo') در این صفحه شما میتوانید تنظیمات پایه سالانه را وارد کرده تا سیستم بصورت خودکار محاسبات حقوق و دستمزد را انجام دهد.@stop
@section('PageAddress') تنظیمات پایه  @stop
@section('PageCardName')
    <div class="toolbar ml-auto float-left">
        <a href="/admin/PageAddFirstConfig" class="btn btn-outline-brand btn-sm ">ایجاد سال کاری جدید</a>

    </div>
    <div class="card-header bg-secondary-light border-brand border-3  col-7">
        <form method="post" action="/admin/PageFirstConfig">
            @csrf
        <label class="font-12">انتخاب جهت نمایش و یا ویرایش تنظیمات پایه</label>
        <select   id="state"  required="" name="selectsal" class="  col-3 ">
            @foreach($salitems  as  $row)
                <option value="{{$row->sal}}">{{$row->sal}}</option>
            @endforeach
        </select>
        <button type="submit"  class="btn btn-outline-primary btn-sm ">انتخاب و نمایش</button>
        </form>
    </div>
@stop
@section('PageCardInfo')@stop
@section('PageCardData')




    <form  method="POST" action="/admin/SaveFirstConfig"   id="validationform" >
        @csrf
        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">سال کاری / ماه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->sal }}" name="sal" type="text" readonly required=""   class="form-control border-primary bg-dark-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">حقوق پایه روزانه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->hoghogh_paye_rozane }}" name="hoghogh_paye_rozane" type="text" required="" data-parsley-maxlength="30" placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>


        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">حق مسکن</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->hagh_maskan }}" name="hagh_maskan" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">حق خواروبار </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->hagh_kharobar }}" name="hagh_kharobar"  type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr ">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> حق اولاد</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->hagh_olad }}" name="hagh_olad" type="text" required=""  placeholder="" class="form-control border-primary  bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">پایه سنوات روزانه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->paye_sanavat_rozane }}" name="paye_sanavat_rozane" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> سنوات روزانه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->sanavat_rozane }}" name="sanavat_rozane" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> عیدی روزانه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->eydi_rozane }}" name="eydi_rozane" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  درصد مالیات</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->darsad_maleyat}}" name="darsad_maleyat" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  مدت مرخصی سال</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->modat_morakhasi_sal }}" name="modat_morakhasi_sal" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> تعداد روز هفته</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->tedad_roz_hafte }}" name="tedad_roz_hafte" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  تعداد روز سال</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->tedad_roz_sal }}" name="tedad_roz_sal" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  درصد بیمه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->darsad_bime }}" name="darsad_bime" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  حد محاسبه مالیات</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->maleyat_flag }}" name="maleyat_flag" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> مبلغ ساعت اضافه کاری شرکت</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->ezafekar_shercat }}" name="ezafekar_shercat" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> مبلغ ساعت اضافه کار ارجائی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->ezafekar_erjaei }}" name="ezafekar_erjaei" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> درصد شیفت شب</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->hagh_shift }}" name="hagh_shift" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div  class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  درصد شیفت نوبت کاری</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input  value="{{ $salitem->hagh_shift2 }}" name="hagh_shift2" type="text"   placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> بن</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ $salitem->bon }}" name="bon" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row ">
            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                <button type="submit" class="btn btn-space btn-primary float-left ">ذخیره </button>

            </div>
        </div>
    </form>


@stop


