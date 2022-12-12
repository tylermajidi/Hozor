@extends('panel_admin.layout_admin')



@section('PageTitle') میزکار مدیر (قوانین پایه)  @stop
@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') صفحه پیشخوان مدیر  @stop
@section('PageHeaderInfo') در این صفحه سیستم برای شما آماری از درخواست ها و اعلانات مدیریت را نمایش میدهد.@stop
@section('PageAddress') پیشخوان مدیر  @stop
@section('PageCardName')
    لیست  چک هایی که سررسید انها نزدیک است
@stop
@section('PageCardInfo')@stop
@section('PageCardData')




    <form  method="POST" action="/admin/AddFirstConfig"   id="validationform" >
        @csrf
        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">سال کاری / ماه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('sal') }}" name="sal" type="text" maxlength="7"  required="" placeholder="example = 1373  or 1373/2"  class="form-control border-primary bg-dark-light text-center ltr">
                <span class="badge badge-danger font-10 p-1">(1370 یا 1370/2) ورودی فقط میتواند دو حالت باشد سال / سال و ماه</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">حقوق پایه روزانه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('hoghogh_paye_rozane') }}" name="hoghogh_paye_rozane" type="text" required="" data-parsley-maxlength="30" placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>


        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">حق مسکن</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('hagh_maskan') }}" name="hagh_maskan" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">حق خواروبار </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('hagh_kharobar') }}" name="hagh_kharobar"  type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr ">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> حق اولاد</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('hagh_olad') }}" name="hagh_olad" type="text" required=""  placeholder="" class="form-control border-primary  bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">پایه سنوات روزانه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('paye_sanavat_rozane') }}" name="paye_sanavat_rozane" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> سنوات روزانه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('sanavat_rozane') }}" name="sanavat_rozane" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> عیدی روزانه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('eydi_rozane') }}" name="eydi_rozane" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  درصد مالیات</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('darsad_maleyat')}}" name="darsad_maleyat" type="text" required=""  placeholder="مثال 0.35" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  مدت مرخصی سال</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('modat_morakhasi_sal') }}" name="modat_morakhasi_sal" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> تعداد روز هفته</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('tedad_roz_hafte') }}" name="tedad_roz_hafte" type="text" required=""  placeholder="" class="form-control border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  تعداد روز سال</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('tedad_roz_sal') }}" name="tedad_roz_sal" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  درصد بیمه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('darsad_bime') }}" name="darsad_bime" type="text" required=""  placeholder="مثال 0.35" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  حد محاسبه مالیات</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('maleyat_flag') }}" name="maleyat_flag" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> مبلغ ساعت اضافه کاری شرکت</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('ezafekar_shercat') }}" name="ezafekar_shercat" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> مبلغ ساعت اضافه کار ارجائی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('ezafekar_erjaei') }}" name="ezafekar_erjaei" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> درصد شیفت شب</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('hagh_shift') }}" name="hagh_shift" type="text" required=""  placeholder="مثال 0.35" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div  class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">  درصد شیفت نوبت کاری</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input  value="{{ old('hagh_shift2') }}" name="hagh_shift2" type="text"   placeholder="مثال 0.35" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> بن</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('bon') }}" name="bon" type="text" required=""  placeholder="" class="form-control  border-primary bg-brand-light text-center ltr">
            </div>
        </div>
        <div class="form-group row ">
            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                <button type="submit" class="btn btn-space btn-primary float-left ">ذخیره جدید </button>

            </div>
        </div>
    </form>


@stop


