@extends('panel_sarparast.layout_Sarparast')



@section('PageTitle') میزکار سرپرست (پیشخوان)  @stop
@section('NameUser'){{session('usernum')}}  @stop
@section('PageHeader') صفحه پیشخوان سرپرست  @stop
@section('PageHeaderInfo') در این صفحه سیستم برای شما آماری از درخواست ها و اعلانات مدیریت را نمایش میدهد.@stop
@section('PageAddress') پیشخوان سرپرست  @stop
@section('PageCardName') لیست اعلاناتی ارسالی از سوی مدیریت.@stop
@section('PageCardInfo') در اینجا لیستی از اعلانات ارسالی از سوی مدیریت نمایش داده میشود که اعتبار اعلان را میتوان مشاهده کرد.@stop

@section('PageCardData')

    @foreach($listalert  as $row)
        @if($row->state=="info")
            <div class="alert alert-info">
                <strong>  اطلاعات!  -->  </strong> پیام ارسالی از سوی مدیر--> <a href="javascript:void(0)" class="alert-link">{{$row->message}}</a>.
            </div>
        @endif
        @if($row->state=="warning")
            <div class="alert alert-warning">
                <strong>اخطار!  -->  </strong> پیام ارسالی از سوی مدیر--> <a href="javascript:void(0)" class="alert-link">{{$row->message}}</a>.
            </div>

        @endif
        @if($row->state=="danger")
            <div class="alert alert-danger">
                <strong>خیلی فوری!  -->  </strong> پیام ارسالی از سوی مدیر --> <a href="javascript:void(0)" class="alert-link">{{$row->message}}</a>.
            </div>
        @endif
    @endforeach


@stop


