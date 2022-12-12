@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (تسویه حساب پرسنل)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader') صفحه تسویه حساب@stop
@section('PageHeaderInfo') ترک کار / تسویه حساب@stop
@section('PageAddress') لیست پرسنل -> تسویه حساب  @stop
@section('PageCardName')انتخاب سال کاری و انتخاب قانون پایه کار تعریف شده@stop
@section('PageCardInfo') @stop

@section('PageCardData')




<form action="/karmand/ShowPageTark" method="POST" >
    @csrf
    <div class="form-group row">
        <label class="p-l-25 p-r-20">انتخاب سال کاری</label>
        <select  id="sal"  required="" name="sal" class="custom-control col-2 ">

            <option value="1398">1398</option>
            <option value="1399">1399</option>
            <option value="1400">1400</option>
            <option value="1401">1401</option>
            <option value="1402">1402</option>
            <option value="1403">1403</option>
            <option value="1404">1404</option>
            <option value="1405">1405</option>
        </select>
        <label class="p-l-25 p-r-20">انتخاب قانون کار سال </label>
        <select  id="salkar"  required="" name="salkar" class="custom-control col-2  ">

            @foreach($Tc as $row)
                <option value="{{$row->sal}}">{{$row->sal}}</option>

            @endforeach


        </select>
        <input type="text" value="{{$id}}" hidden name="id">
        <button type="submit"  class="m-r-20  btn-outline-primary ">نمایش </button>

    </div>
</form>














@stop


