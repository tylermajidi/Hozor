@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (ویرایش پرسنل )  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader') صفحه ویرایش پرسنل @stop
@section('PageHeaderInfo') لطفا اطلاعات پرسنل بصورت دقیق وارد کنید سپس روی دکمه ذخیره کلیک کنید.@stop
@section('PageAddress')  ویرایش پرسنل @stop
@section('PageCardName') فرم ویرایش پرسنل@stop
@section('PageCardInfo') لطفا تمامی اطلاعات با دقت وارد کنید@stop

@section('PageCardData')


    <form  method="POST" action="/karmand/EditPersenel"   id="validationform" >
        @csrf
        <input name="id" value="{{$persenel->id}}" type="text"  hidden >
        <input name="sh_persenel2" value="{{$persenel->sh_persenel}}" type="text"  hidden >
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره پرسنلی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->sh_persenel}}" autocomplete="off" name="sh_persenel"  type="text" required="" placeholder="" class="form-control text-center ltr">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">نام</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->nam}}" autocomplete="off" name="nam" type="text" required="" placeholder="" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">نام خانوادگی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->family}}" autocomplete="off" name="family" type="text" required="" placeholder="" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">نام پدر </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->Father}}" autocomplete="off" name="Father" type="text" required="" placeholder="" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">کد ملی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->sh_meli}}" autocomplete="off" name="sh_meli" type="text" required="" placeholder="" class="form-control text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره شناسنامه </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->sh_sh}}" autocomplete="off" name="sh_sh" type="text" required="" placeholder="" class="form-control text-center ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">تعداد فرزند  </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->farzand}}" autocomplete="off" name="farzand" type="number" required="" placeholder="" class="form-control text-center ltr">
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره موبایل</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->sh_phone}}" autocomplete="off" name="sh_phone" type="text" required="" data-parsley-minlength="11" placeholder="0912" class="form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره بیمه</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->sh_bime}}" autocomplete="off" name="sh_bime" type="text" required="" data-parsley-minlength="11" placeholder="" class="form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شماره حساب</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->sh_hesab}}"  name="sh_hesab" type="text" required="" data-parsley-maxlength="30" placeholder="9007550020" class="form-control text-left ltr">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">شغل</label>

            <select value="{{$persenel->job}}" id="jobid" required="" name="job" class="col-12 col-sm-8 col-lg-6  ">
                <option value="{{$persenel->job}}">{{$persenel->job}}</option>
                @foreach($joblist  as  $row)
                    <option value="{{$row->jobname}}">{{$row->jobname}}</option>
                @endforeach
            </select>

        </div>


        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">تاریخ شروع کار  </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->date_start}}" autocomplete="off"  name="date_start" readonly type="text"  id="date_start" required=""  placeholder="" class="form-control text-left ltr bg-light">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-left">تاریخ پایان کار</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{$persenel->date_end}}" autocomplete="off" name="date_end" id="date_end" type="text" required=""  placeholder="" class="form-control text-left ltr">
            </div>
        </div>


        <div class="form-group row ">
            <div class="col-12 col-sm-8 col-lg-6 ">
                <button  type="submit" class="btn btn-space btn-primary">ذخیره اطلاعات</button>
                <a href="/karmand/dashboard" class="btn btn-space btn-secondary">انصراف</a>
            </div>
        </div>
    </form>




@stop






