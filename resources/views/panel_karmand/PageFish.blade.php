@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (فیش حقوقی و ...)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader')@stop
@section('PageHeaderInfo') دریافت انواع موارد چاپ مورد نیاز مانند فیش حقوقی و ...@stop
@section('PageAddress') فیش حقوقی و ...  @stop
@section('PageCardName')دریافت انواع برگه های کاربردی@stop
@section('PageCardInfo')@stop

@section('PageCardData')


    <!-- --------------- -->







    <div class="simple-outline-card">
        <ul class="nav nav-tabs" id="myTab6" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show border-left-0" id="home-tab-simple-outline" data-toggle="tab" href="#home-simple-outline" role="tab" aria-controls="home" aria-selected="false">فیش حقوقی و قرارداد</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple-outline" data-toggle="tab" href="#profile-simple-outline" role="tab" aria-controls="profile" aria-selected="false">تعهد حقوقی و گواهی اشتغال</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="contact-tab-simple-outline" data-toggle="tab" href="#contact-simple-outline" role="tab" aria-controls="contact" aria-selected="true">عدم نیاز</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent6">
            <div class="tab-pane active show fade" id="home-simple-outline" role="tabpanel" aria-labelledby="home-tab-simple-outline">
                <p class="lead"> توجه کنید برای اینکه فیش حقوقی دریافتی طبق آخرین تغییرات مشاهده شود ابتدا یک بار فرم پرداخت حقوق را طبق ماه انتخابی و سال انتخابی را بارگزاری کنید سپس از دریافت فیش حقوقی استفاده کنید.</p>
                <form id="myform1" action="/karmand/showreport" method="post">
                    @csrf

                    <input id="jsa" name="jsa" hidden type="text">
                    <input id="jsa2" hidden name="jsa2" type="text">


                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">انتخاب قرارداد</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="selectgharardad"  required="" name="selectgharardad" class="custom-control col-12 col-sm-8 col-lg-6   ">

                                <option value="-">-</option>
                                @foreach($gharardadlist  as $index=> $row)


                                    <option value="{{$row->id}}">{{$row->namegharardad}}</option>


                                @endforeach




                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">انتخاب شخص</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="selectpersenel"  required="" name="selectpersenel" class="custom-control col-12 col-sm-8 col-lg-6   ">

                                <option value="all">همه افراد</option>
                                @foreach($persenellist  as $index=> $row)


                                    <option value="{{$row->sh_persenel}}">{{$row->nam}} {{$row->family}}</option>


                                @endforeach




                            </select>
                        </div>
                    </div>




                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">ماه پرداخت</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="mah"  required="" name="mah" class="custom-control  ">

                                <option value="1">فروردین</option>
                                <option value="2">اردیبهشت</option>
                                <option value="3">خرداد</option>
                                <option value="4">تیر</option>
                                <option value="5">مرداد</option>
                                <option value="6">شهریور</option>
                                <option value="7">مهر</option>
                                <option value="8">آبان</option>
                                <option value="9">آذر</option>
                                <option value="10">دی</option>
                                <option value="11">بهمن</option>
                                <option value="12">اسفند</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">سال پرداخت</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="sal"  required="" name="sal" class="custom-control  ">

                                <option value="1398">1398</option>
                                <option value="1399">1399</option>
                                <option value="1400">1400</option>
                                <option value="1401">1401</option>
                                <option value="1402">1402</option>
                                <option value="1403">1403</option>
                                <option value="1404">1404</option>
                                <option value="1405">1405</option>
                                <option value="1406">1406</option>
                                <option value="1407">1407</option>
                                <option value="1408">1408</option>
                                <option value="1409">1409</option>
                                <option value="1410">1410</option>

                            </select>

                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">انتخاب مورد چاپ</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="printselect"  required="" name="printselect" class="custom-control  ">

                                <option value="fish">فیش حقوقی</option>
                                <option value="gharardad">قرارداد سالانه</option>


                            </select>

                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left"> </label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <button type="submit"   class="m-t-20 btn btn-outline-primary  ">آماده سازی برای چاپ گزارش </button>

                        </div>
                    </div>
                </form>

            </div>
            <div class="tab-pane fade" id="profile-simple-outline" role="tabpanel" aria-labelledby="profile-tab-simple-outline">

                <form id="myform2" action="/karmand/showreport" method="post">
                    @csrf

                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">انتخاب قرارداد</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="selectgharardad"  required="" name="selectgharardad" class="custom-control col-12 col-sm-8 col-lg-6   ">

                                <option value="-">-</option>
                                @foreach($gharardadlist  as $index=> $row)


                                    <option value="{{$row->id}}">{{$row->namegharardad}}</option>


                                @endforeach




                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">انتخاب شخص</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="selectpersenel"  required="" name="selectpersenel" class="custom-control col-12 col-sm-8 col-lg-6   ">


                                @foreach($persenellist  as $index=> $row)


                                    <option value="{{$row->sh_persenel}}">{{$row->nam}} {{$row->family}}</option>


                                @endforeach




                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">نام گیرنده پیام </label>
                        <div class="col-8 col-sm-4 col-lg-5">
                           <input name="girande" type="text" class="form-control rtl" placeholder="مثال : بانک ملی شعبه ولیعصر (عج)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">حقوق پرسنل</label>
                        <div class="col-8 col-sm-4 col-lg-5">

                            <input name="hogogh" type="text" class="form-control ltr">

                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">ضمانت شخص</label>
                        <div class="col-8 col-sm-4 col-lg-5">

                            <input name="namezemanat" type="text" class="form-control rtl">

                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">مبلغ ضمانت</label>
                        <div class="col-8 col-sm-4 col-lg-5">

                            <input name="mablaghzemanat" type="text" class="form-control ltr">

                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">انتخاب مورد چاپ</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="printselect"  required="" name="printselect" class="custom-control  ">

                                <option value="taahod"> تعهد حقوقی</option>
                                <option value="eshteghal">گواهی اشتغال</option>


                            </select>

                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left"> </label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <button type="submit"   class="m-t-20 btn btn-outline-primary  ">آماده سازی برای چاپ گزارش </button>

                        </div>
                    </div>
                </form>


            </div>
            <div class="tab-pane fade " id="contact-simple-outline" role="tabpanel" aria-labelledby="contact-tab-simple-outline">

                <form id="myform3" action="/karmand/showreport" method="post">
                    @csrf

                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">انتخاب قرارداد</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="selectgharardad"  required="" name="selectgharardad" class="custom-control col-12 col-sm-8 col-lg-6   ">

                                <option value="-">-</option>
                                @foreach($gharardadlist  as $index=> $row)


                                    <option value="{{$row->id}}">{{$row->namegharardad}}</option>


                                @endforeach




                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">انتخاب شخص</label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <select  id="selectpersenel"  required="" name="selectpersenel" class="custom-control col-12 col-sm-8 col-lg-6   ">


                                @foreach($persenellist  as $index=> $row)


                                    <option value="{{$row->sh_persenel}}">{{$row->nam}} {{$row->family}}</option>


                                @endforeach




                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">اداره تعاون کار و رفاه اجتماعی-></label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <input name="edare" type="text" class="form-control rtl" placeholder="مثال : استان قزوین">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">تاریخ پایان قرارداد</label>
                        <div class="col-8 col-sm-4 col-lg-5">

                            <input name="datepayan" type="text" class="form-control ltr">

                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left">عدم نیاز از تاریخ</label>
                        <div class="col-8 col-sm-4 col-lg-5">

                            <input name="dateadam" type="text" class="form-control ltr">

                        </div>

                    </div>

                    <input type="text" hidden name="printselect" value="adam">

                    <div class="form-group row">
                        <label class="col-4 col-sm-3 col-form-label text-sm-left"> </label>
                        <div class="col-8 col-sm-4 col-lg-5">
                            <button type="submit"   class="m-t-20 btn btn-outline-primary  ">آماده سازی برای چاپ گزارش </button>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>



@stop



@section('PageScript')
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="selectgharardad"]').on('change',function(){
                var ghrardadid = jQuery(this).val();
                if(ghrardadid)
                {
                    jQuery.ajax({
                        url : '/karmand/getjespersenel/' +ghrardadid,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            console.log(data);
                            jQuery('select[name="selectpersenel"]').empty();

                            $('select[name="selectpersenel"]').append('<option value="all">همه افراد</option>');
                            jQuery.each(data, function(key,value){
                                $('select[name="selectpersenel"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="selectpersenel"]').empty();
                }
            });
        });
    </script>
@stop
