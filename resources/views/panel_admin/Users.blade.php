@extends('panel_admin.layout_admin')



@section('PageTitle') میزکار مدیر (مدیریت کاربران)  @stop
@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') صفحه مدیریت کاربران  @stop
@section('PageHeaderInfo') @stop
@section('PageAddress') کاربران سیستم  @stop
@section('PageCardName') ثبت و ویرایش کاربران سیستم@stop
@section('PageCardInfo') لطفا اطلاعات کاربری با دقت وارد کنید@stop

@section('PageCardData')

    <form  method="POST" action="/admin/AddUser"   id="validationform" >
        @csrf
        <div class="form-group row ">
            <label class="col-6 col-sm-3 col-form-label text-sm-right "> نام کاربری <span class="badge badge-info font-10 p-1">(برای سرپرست از حروف لاتین استفاده شود)</span> </label>
            <div class="col-12 col-sm-8 col-lg-6 ">
                <input  value="{{ old('username') }}" name="username" type="text" placeholder="مثال : برای عارف چگینی  A.chegini" required="" data-parsley-minlength="30"  class="form-control  text-center ltr">
                 <span class="badge badge-brand font-10 p-1"> حروف فارسی استفاده نشود</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">رمز عبور </label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('password') }}" name="password" type="password" required="" data-parsley-maxlength="30" placeholder="" class="form-control text-left ltr">
                <span class="badge badge-brand font-10 p-1"> حروف فارسی استفاده نشود</span>
            </div>
        </div>


        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">نام و نام خانوادگی</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input value="{{ old('name') }}" name="name" type="text" required=""  placeholder="" class="form-control  rtl">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">سطح دسترسی</label>
            <div class="col-12 col-sm-8 col-lg-6">
            <select  id="level"  required="" name="level" class="custom-control  ">
                <option value="admin">مدیر</option>
                <option value="sarparast">سرپرست</option>
                <option value="karmand">کارمند</option>
            </select>
            </div>
        </div>




        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right"> تعریف قرارداد برای سرپرست</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <select  id="gharardadid"  required="" name="gharardadid" class="custom-control  ">

                    @foreach($listgharardad   as  $row)
                        <option value="{{$row->id}}">{{$row->namegharardad}}</option>
                    @endforeach

                </select>
                <span class="badge badge-info font-10 p-1"> فقط برای سرپرست کاربرد دارد</span>
            </div>
        </div>


        <div class="form-group row ">
            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                <button type="submit" class="btn btn-space btn-primary ">ذخیره کاربر</button>

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
                <th>نام کاربری</th>
                <th>نام</th>
                <th>سطح دسترسی</th>
                <th>قرارداد</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>

            @foreach($ListUsers  as $index=> $row)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$row->username}}</td>
                    <td>{{$row->name}}</td>
                    @if($row->level=="admin")
                        <td>مدیر</td>
                    @endif
                    @if($row->level=="sarparast")
                        <td>سرپرست</td>
                    @endif
                    @if($row->level=="karmand")
                        <td>کارمند</td>
                    @endif


                    <td> @if($row->level=="sarparast") {{$row->namegharardad}} @endif</td>
                    <td  class="center"  style="
                             width: 120px;
                             padding-top: 1px;
                             padding-right: 1px;
                             padding-left: 1px;
                             padding-bottom: 1px;
                             border-left-width: 0px;
                             border-right-width: 0px;
                             border-top-width: 0px;
                             border-bottom-width: 0px;
                     ">

                            <div class="row m-0">
                                <form id="FormDeleteUser[{{$row->username}}]" class="p-1 small" action="/admin/DeleteUser"  method="Post"> @csrf <input type="hidden" name="username" value="{{$row->username}}"><button type="button"  onclick="deleteusermessage('{{$row->username}}')" class=" rounded-bottom  btn-danger"> حذف </button> </form>
                                <form  class="p-1 small" class="p-1"  action="/admin/PageEditUser"  method="Post"> @csrf <input type="hidden" name="username" value="{{$row->username}}"><button type="submit"  class="rounded-bottom btn-warning"> ویرایش </button> </form>
                            </div>

                    </td>

                </tr>
            @endforeach

            </tbody>

        </table>

    </div>




@stop



@section('PageScript')
    <script>
        function deleteusermessage($formid) {

            //   alert($formid);

            swal({title: "حذف اعلان", text: "آیا مایل به حذف اعلان انتخابی هستید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, بله موافقم',]

            })
                .then((willDelete) => {
                    if (willDelete) {


                        document.getElementById('FormDeleteUser['+ $formid +']').submit();

                    } else {


                    }
                });

        }
    </script>
@endsection
