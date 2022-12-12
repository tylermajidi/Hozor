@extends('panel_admin.layout_admin')



@section('PageTitle') میزکار مدیر (پیشخوان)  @stop
@section('NameUser') {{session('usernum') }}  @stop
@section('PageHeader') صفحه پیشخوان مدیر  @stop
@section('PageHeaderInfo')@stop
@section('PageAddress') پیشخوان مدیر  @stop
@section('PageCardName') لیست  چک هایی که سررسید انها نزدیک است@stop
@section('PageCardInfo') در اینجا لیستی چک ها که سررسید انها کمتر از 10 روز است نمایش داده میشود.@stop

@section('PageCardData')


    <div class="table-responsive font-12 " >

        <table id="listch" class="table table-striped table-bordered second" style="text-align: center; width:100%">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>شماره چک</th>
                <th>مبلغ</th>
                <th> صاحب چک</th>
                <th>دریافت کننده </th>
                <th>بانک</th>
                <th>تاریخ سرسید</th>
                <th>شرح</th>
                <th>...</th>


            </tr>
            </thead>
            <tbody>
            @foreach($listcheck  as $index=> $row)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$row->sh_check}}</td>
                    <td>{{$row->mablagh}}</td>
                    <td>{{$row->ownercheck}}</td>
                    <td>{{$row->daryaftkonande}}</td>
                    <td>{{$row->bank}}</td>
                    <td>{{$row->date_check}}</td>
                    <td>{{$row->des}}</td>
                    <td  class="center"  style="width: 80px">
                        @if($row->state !="passed")
                            <div >
                                <form  class="p-1 small"  id="formvosolmsg[{{$index+1}}]" action="/admin/PassCheck"  method="Post"> @csrf <input type="hidden" name="sh_check" value="{{$row->sh_check}}"><button type="button"  onclick="vosolmessage('{{$index+1}}')" class="rounded-bottom btn-success"> وصول </button> </form>
                            </div>
                        @endif
                    </td>


                </tr>
            @endforeach

            </tbody>

        </table>

    </div>




@stop


@section('PageScript')
    <script>
        function vosolmessage($fid) {


            swal({title: "وصول چک", text: "از ثبت وصولی چک انتخابی اطمینان دارید؟",
                icon: "warning",
                buttons: true,
                warningMode :true,
                buttons: [ 'cancel, انصراف ','ok, بله موافقم',]

            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('formvosolmsg['+$fid+']').submit();

                    } else {


                    }
                });

        }
    </script>
@endsection
