@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (افزودن پرسنل جدید)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader') صفحه ثبت پرسنل جدید@stop
@section('PageHeaderInfo') لطفا اطلاعات پرسنل بصورت دقیق وارد کنید سپس روی دکمه ذخیره کلیک کنید.@stop
@section('PageAddress')  ثبت پرسنل جدید@stop
@section('PageCardName') فرم ثبت نام@stop
@section('PageCardInfo') لطفا تمامی اطلاعات با دقت وارد کنید@stop

@section('PageCardData')


    <form  method="POST" action="/karmand/AddPersenel"   id="validationform" >
        @csrf
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره پرسنلی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input name="sh_persenel" type="text" value="{{ old('sh_persenel') }}" autocomplete="off" required="" placeholder="" class="form-control text-center ltr">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">نام</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input name="nam" type="text" required="" value="{{ old('nam') }}" autocomplete="off" placeholder="" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">نام خانوادگی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input name="family" value="{{ old('family') }}" type="text" autocomplete="off" required="" placeholder="" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">نام پدر </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input name="Father" value="{{ old('Father') }}" type="text" autocomplete="off" required="" placeholder="" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">کد ملی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input name="sh_meli" value="{{ old('sh_meli') }}" type="text" autocomplete="off" required="" placeholder="" class="form-control text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره شناسنامه </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input name="sh_sh" value="{{ old('sh_sh') }}" type="number" autocomplete="off" required="" placeholder="" class="form-control text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">تعداد فرزند </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input name="farzand" value="{{ old('farzand') }}" type="number" autocomplete="off" required="" placeholder="" class="form-control text-center ltr">
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره موبایل</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input name="sh_phone" value="{{ old('sh_phone') }}" type="text" autocomplete="off" required="" data-parsley-minlength="11" placeholder="0912" class="form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره بیمه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input name="sh_bime" value="{{ old('sh_bime') }}" type="text" autocomplete="off" required="" data-parsley-minlength="11" placeholder="" class="form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره حساب</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input  name="sh_hesab" value="{{ old('sh_hesab') }}" type="number" autocomplete="off" required="" data-parsley-maxlength="30" placeholder="9007550020" class="form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شغل</label>

            <select id="jobid" value="{{ old('jobname') }}" required="" name="job" class="col-12 col-sm-8 col-lg-6  ">
                @foreach($joblist  as  $row)
                    <option value="{{$row->jobname}}">{{$row->jobname}}</option>
                @endforeach
            </select>

        </div>


        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">تاریخ شروع کار  </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('date_start') }}" readonly name="date_start" id="date_start" autocomplete="off" type="text" required=""  placeholder="" class="form-control text-left bg-light ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">تاریخ پایان کار</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('date_end') }}"  name="date_end" id="date_end" type="text" autocomplete="off" required   placeholder="" class="form-control text-left ltr">
            </div>
        </div>


        <div class="form-group row ">
            <div class="col-12 col-sm-8 col-lg-6 ">
                <button type="submit" class="btn btn-space btn-primary">ذخیره اطلاعات</button>
                <a href="/karmand/dashboard" class="btn btn-space btn-secondary">انصراف</a>
            </div>
        </div>
    </form>




@stop






