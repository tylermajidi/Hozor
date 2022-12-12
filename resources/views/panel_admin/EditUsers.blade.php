@extends('panel_admin.layout_admin')



@section('PageTitle') میزکار مدیر (مدیریت کاربران)  @stop
@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') صفحه ویرایش اطلاعات کاربر  @stop
@section('PageHeaderInfo') @stop
@section('PageAddress') کاربران سیستم  @stop
@section('PageCardName') ثبت و ویرایش کاربران سیستم@stop
@section('PageCardInfo') لطفا اطلاعات کاربری با دقت وارد کنید@stop

@section('PageCardData')

    <form  method="POST" action="/admin/EditUser"   id="validationform" >
        @csrf
        <div class="form-group row ">
            <label class="col-6 col-sm-3 col-form-label text-sm-right "> نام کاربری <span class="badge badge-info font-10 p-1">(برای سرپرست از حروف لاتین استفاده شود)</span> </label>
            <div class="col-12 col-sm-8 col-lg-6 ">
                <input  value="{{ $datausers->username }}" readonly name="username" type="text" placeholder="مثال : برای عارف چگینی  A.chegini" required="" data-parsley-minlength="30"  class="form-control  text-center ltr">
                 <span class="badge badge-brand font-10 p-1"> حروف فارسی استفاده نشود</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">رمز عبور </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{  $datausers->password }}" name="password" type="password" required="" data-parsley-maxlength="30" placeholder="" class="form-control text-left ltr">
                <span class="badge badge-brand font-10 p-1"> حروف فارسی استفاده نشود</span>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">نام و نام خانوادگی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{  $datausers->name }}" name="name" type="text" required=""  placeholder="" class="form-control  rtl">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">سطح دسترسی</label>
            <div class="col-12 col-sm-8 col-lg-6">
            <select  id="level"  required="" name="level" class="custom-control  ">
                <option value="{{$datausers->level}}">@if($datausers->level=="admin") مدیر @endif  @if($datausers->level=="sarparast") سرپرست @endif @if($datausers->level=="karmand") کارمند @endif</option>
                <option value="admin">مدیر</option>
                <option value="sarparast">سرپرست</option>
                <option value="karmand">کارمند</option>
            </select>
            </div>
        </div>




        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> تعریف قرارداد برای سرپرست</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <select  id="gharardadid"   required="" name="gharardadid" class="custom-control  ">

                    <option value="{{$datausers->id_gharardad}}">{{$datausers->namegharardad}}</option>
                      @foreach($listgharadad   as  $row)
                        <option value="{{$row->id}}">{{$row->namegharardad}}</option>
                     @endforeach

                </select>
                <span class="badge badge-info font-10 p-1"> فقط برای سرپرست کاربرد دارد</span>
            </div>
        </div>


        <div class="form-group row ">
            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                <button type="submit" class="btn btn-space btn-primary ">ذخیره ویرایش</button>

            </div>
        </div>
    </form>





@stop



