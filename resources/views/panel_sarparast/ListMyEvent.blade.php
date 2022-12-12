@extends('panel_sarparast.layout_Sarparast')



@section('PageTitle') میزکار سرپرست (لیست فعالیت ها)  @stop
@section('NameUser'){{session('usernum')}}  @stop
@section('PageHeader') صفحه لیست فعالیت ها  @stop
@section('PageHeaderInfo') در این صفحه سیستم برای شما لیست فعالیت ها را نمایش میدهد.@stop
@section('PageAddress') لیست پرسنل  @stop
@section('PageCardName') لیست فعالیت ها سرپرست.@stop
@section('PageCardInfo') در اینجا لیستی از  فعالیت ها خود را میتوان مشاهده کرد.@stop

@section('PageCardData')


<!-- --------------- -->

<div class="dropdown text-md-left p-b-20">
    <div id="" class="top-search-bar col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
        <input id="searchinputlist" class="form-control" type="text" placeholder="فیلتر...">
    </div>
</div>

<div class="table-responsive p-b-10">
    <table id="listperseneltable" class="table table-striped table-bordered second" style=" text-align: center; width:100%">
        <thead class=" ">
        <tr>
            <th style="width:40px">ردیف</th>
            <th>تاریخ ثبت</th>
            <th>عنوان فعالیت</th>
            <th> شرح فعالیت</th>
        </tr>
        </thead>
        <tbody style="text-align: center">

        @foreach($listevent  as $index=> $row)
        <tr >
            <td>{{$index+1}}</td>
            <td>{{$row->date}}</td>
            <td> {{$row->subject}}</td>
            <td>{{$row->des}}</td>

        </tr>
        @endforeach

        </tbody>

    </table>

</div>










@stop


