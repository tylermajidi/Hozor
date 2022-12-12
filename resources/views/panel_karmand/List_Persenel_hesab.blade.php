@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (دریافت شماره حساب)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader')لیست پرسنل /شماره حساب@stop
@section('PageHeaderInfo') نمایش لیست پرسنل جهت  پرداخت مساعده و دریافت شماره حساب@stop
@section('PageAddress')  پرداخت مساعده و دریافت شماره حساب  @stop
@section('PageCardName')لیست کامل افراد جهت پرداخت مساعده و دریافت شماره حساب بانکی.@stop
@section('PageCardInfo')@stop

@section('PageCardData')


    <!-- --------------- -->

    <div class="dropdown text-md-left p-b-20">
        <div id="" class="top-search-bar col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            <input id="searchinputlist" class="form-control" type="text" placeholder="فیلتر...">
        </div>
        </div>

    <div class="table-responsive">
        <table id="listperseneltable" class="table table-striped table-bordered second" style=" text-align: center; width:100%">
            <thead class=" ">
            <tr>
                <th style="width:40px">ردیف</th>
                <th style="width:40px">انتخاب</th>
                <th>ش پ</th>
                <th> نام</th>
                <th>خانوادگی </th>
                <th>نام پدر</th>
                <th>ش حساب </th>
            </tr>
            </thead>
            <tbody style="text-align: center">

            @foreach($persenellist  as $index=> $row)
                <tr >
                    <td>{{$index+1}}</td>
                    <td><input type="checkbox" style="width:25px;height: 25px"></td>
                    <td>{{$row->sh_persenel}}</td>
                    <td>{{$row->nam}}</td>
                    <td>{{$row->family}}</td>
                    <td>{{$row->Father}}</td>
                    <td>{{$row->sh_hesab}}</td>
                </tr>
            @endforeach

            </tbody>

        </table>

    </div>


<form id="myform1" action="/karmand/AddMosaedeh" method="post">
@csrf

<input id="jsa" name="jsa" hidden type="text">
    <input id="jsa2" hidden name="jsa2" type="text">









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
        <label class="col-4 col-sm-3 col-form-label text-sm-left">مبلغ پرداختی</label>
        <div class="col-8 col-sm-4 col-lg-5">
            <input id="mony" name="mony" type="number"  required="" placeholder="" class="form-control text-center ltr">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-4 col-sm-3 col-form-label text-sm-left">شرح پرداخت</label>
        <div class="col-8 col-sm-4 col-lg-5">
            <input id="des" name="des" type="text" required="" placeholder="" class="form-control text-center rtl">
            <button type="submit"  onclick="GetSelected()" class="m-t-20 btn btn-outline-primary  ">ثبت مساعده</button>

        </div>
    </div>

    </form>








@stop




