@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (ثبت پاداش/جریمه پرسنل)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader')ثبت پاداش پرسنل/جریمه@stop
@section('PageHeaderInfo')@stop
@section('PageAddress') ثبت پاداش/جریمه پرسنل @stop
@section('PageCardName')ثبت پاداش/جریمه پرسنل@stop
@section('PageCardInfo')جهت ثبت پاداش/جریمه به پرسنل ابتدا یک پرسنل را انتخاب و روز ثبت پاداش/جریمه و مبلغ را وارد کرده و ذخیره نمایید.@stop

@section('PageCardData')


    <!-- --------------- -->




    <form id="myform1" action="/karmand/addpadashandjarime" method="post">
        @csrf


        <div class="form-group row">
            <label class="col-4 col-sm-3 col-form-label text-sm-right">انتخاب شخص</label>
            <div class="col-8 col-sm-4 col-lg-5">
                <select  id="selectpersenel"  required="" name="selectpersenel" class="custom-control col-12 col-sm-8 col-lg-6   ">


                    @foreach($persenellist  as $index=> $row)


                        <option value="{{$row->sh_persenel}}">{{$row->nam}} {{$row->family}}</option>


                    @endforeach




                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-sm-3 col-form-label text-sm-right">تاریخ ثبت</label>
            <div class="col-6 col-sm-4 col-lg-5">
                <input value="{{ old('tdate') }}" autocomplete="off" readonly name="tdate" id="tdate"   type="text" required  placeholder="" class="text-center">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-sm-3 col-form-label text-sm-right">پاداش / جریمه</label>
            <div class="col-8 col-sm-4 col-lg-5">
                <select  id="typerow"  required="" name="typerow" class="custom-control  ">

                    <option value="padash">پاداش</option>
                    <option value="jarime">جریمه</option>


                </select>

            </div>

        </div>
        <div class="form-group row">
            <label class="col-4 col-sm-3 col-form-label text-sm-right">مبلغ</label>
            <div class="col-8 col-sm-4 col-lg-5">
           <input class="text-left ltr "  type="number" required="" name="mablagh" autocomplete="off">

            </div>

        </div>
        <div class="form-group row">
            <label class="col-4 col-sm-3 col-form-label text-sm-right">شرح</label>
            <div class="col-8 col-sm-4 col-lg-5">
                <input class="form-control border-dark "  type="text" required="" name="des" autocomplete="off">

            </div>

        </div>
        <div class="form-group row">
            <label class="col-4 col-sm-3 col-form-label text-sm-left"> </label>
            <div class="col-8 col-sm-4 col-lg-5">
                <button type="submit"   class="m-t-10 btn btn-outline-primary  ">ذخیره</button>

            </div>
        </div>
    </form>




    <div class="table-responsive font-14  m-t-30" >

        <table id="listperseneltable" class="table table-striped table-bordered second" style="text-align: center; width:100%">
            <thead>
            <tr>
                <th width="50px">ردیف</th>
                <th>کد پرسنل</th>
                <th>نام پرسنل</th>
                <th>مبلغ</th>
                <th>شرح</th>
                <th>تاریخ ثبت</th>
                <th>جریمه / پاداش </th>
                <th style="width: 50px">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listpaja  as $index=> $row)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$row->shp}}</td>
                    <td>{{$row->namep}}</td>
                    <td>{{$row->mablagh}}</td>
                    <td>{{$row->des}}</td>
                    <td>{{$row->date_sabt}}</td>
                    @if($row->typerow =="padash")
                        <td class="text-success ">پاداش</td>
                    @endif
                    @if($row->typerow =="jarime")
                        <td class="text-danger ">جریمه</td>
                    @endif
                    <td>
                            <div class="row m-0">
                                <form  class="p-1 small" id="fomdelpaja[{{$index+1}}]"  action="/karmand/deletepaja"  method="Post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$row->id}}">
                                    <input type="hidden" name="tdate" value="{{$row->date_sabt}}">
                                    <input type="hidden" name="typerow" value="{{$row->typerow}}">
                                    <input type="hidden" name="shp" value="{{$row->shp}}">
                                    <input type="hidden"  name="mablagh" value="{{$row->mablagh}}">
                                    <button type="button" onclick="deletemessage('{{$index+1}}')"   class="rounded-bottom btn-danger"> حذف </button>
                                </form>

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
        function deletemessage($fid) {


            swal({title: "حذف", text: "آیا مایل به حذف ردیف موردنظر هستید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, تایید',]

            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('fomdelpaja['+$fid+']').submit();

                    } else {


                    }
                });

        }
    </script>

    @endsection
