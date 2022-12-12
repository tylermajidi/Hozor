@extends('panel_karmand.layout_Karmand')



@section('PageTitle') میز کار کارمند (لیست حضور غیاب)  @stop
@section('NameUser') {{session('usernum') }} @stop
@section('PageHeader') صفحه حضور غیاب@stop
@section('PageHeaderInfo') لیست حضورغیاب@stop
@section('PageAddress') لیست حضورغیاب  @stop
@section('PageCardName') لیست اعلاناتی ارسالی از سوی مدیریت.@stop
@section('PageCardInfo') لیست حضور غیاب @stop

@section('PageCardData')




<form action="/karmand/pagelisthozorgheyab2" method="POST" >
    @csrf
    <div class="form-group row">
        <label class="p-l-25 p-r-20">انتخاب ماه</label>
        <select  id="selectfasl"  required="" name="selectfasl" class="custom-control col-2 ">

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
        <label class="p-l-25 p-r-20">انتخاب سال</label>
        <select  id="selectsal"  required="" name="selectsal" class="custom-control col-2  ">

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
        <label class="p-l-25 p-r-20">انتخاب قرارداد</label>
        <select  id="selectgharardad"  required="" name="selectgharardad" class="custom-control col-2  ">

                    <option value="-">-</option>

                    @foreach($gharardadlist  as $index=> $row)


                        <option value="{{$row->id}}">{{$row->namegharardad}}</option>


                    @endforeach



                </select>



        <button type="submit"  class="m-r-20  btn-outline-primary ">نمایش لیست </button>

    </div>
</form>







    <div class="card p-b-10 p-t-10">

            <div class="card-body p-0">


                <div class="table-responsive font-10 form " >
                   <label class="badge badge-info"> گزارش از ماه کاری   </label><label class=" badge badge-brand">  {{ $moon }}  </label>
                    <table id="example" class="table table-striped table-bordered second p-b-10 " style="text-align: center; width:100%">
                        <caption style="font-size: 20px"> گزارش از ماه کاری {{$moon}}  </caption>
                        <thead class="font-10">
                        <tr>
                            <th>#</th>
                            <th ><input type="text" style="border: none; text-align: center" value="نام و نام خانوادگی"></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                            <th>توضیحات</th>

                        </tr>
                        </thead>
                        <tbody class="font-10">


                        @foreach($persenellist  as $index=> $row)
                            @php($day = ['0',
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12',
                '13',
                '14',
                '15',
                '16',
                '17',
                '18',
                '19',
                '20',
                '21',
                '22',
                '23',
                '24',
                '25',
                '26',
                '27',
                '28',
                '29',
                '30',
                '31'

                ])
                            @foreach($listhozoor   as $r)

                                        @if($r->hdate== ($moon.'/'.'1') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[1]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'2') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[2]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'3') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[3]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'4') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[4]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'5') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[5]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'6') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[6]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'7') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[7]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'8') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[8]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'9') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[9]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'10') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[10]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'11') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[11]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'12') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[12]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'13') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[13]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'14') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[14]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'15') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[15]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'16') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[16]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'17') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[17]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'18') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[18]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'19') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[19]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'20') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[20]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'21') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[21]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'22') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[22]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'23') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[23]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'24') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[24]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'25') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[25]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'26') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[26]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'27') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[27]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'28') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[28]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'29') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[29]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'30') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[30]="checked")
                                        @endif
                                        @if($r->hdate== ($moon.'/'.'31') && $r->id_persnel==$row->sh_persenel)
                                            @php($day[31]="checked")
                                        @endif


                            @endforeach
                        <tr>
                            <td>{{$index+1}}</td>
                            <td >{{$row->nam}} {{$row->family}} </td>
                            <td><input disabled type="checkbox" {{$day[1]}}></td>
                            <td><input disabled type="checkbox" {{$day[2]}}></td>
                            <td><input disabled type="checkbox" {{$day[3]}}></td>
                            <td><input disabled type="checkbox" {{$day[4]}}></td>
                            <td><input disabled type="checkbox" {{$day[5]}}></td>
                            <td><input disabled type="checkbox" {{$day[6]}}></td>
                            <td><input disabled type="checkbox" {{$day[7]}}></td>
                            <td><input disabled type="checkbox" {{$day[8]}}></td>
                            <td><input disabled type="checkbox" {{$day[9]}}></td>
                            <td><input disabled type="checkbox" {{$day[10]}}></td>
                            <td><input disabled type="checkbox" {{$day[11]}}></td>
                            <td><input disabled type="checkbox" {{$day[12]}}></td>
                            <td><input disabled type="checkbox" {{$day[13]}}></td>
                            <td><input disabled type="checkbox" {{$day[14]}}></td>
                            <td><input disabled type="checkbox" {{$day[15]}}></td>
                            <td><input disabled type="checkbox" {{$day[16]}}></td>
                            <td><input disabled type="checkbox" {{$day[17]}}></td>
                            <td><input disabled type="checkbox" {{$day[18]}}></td>
                            <td><input disabled type="checkbox" {{$day[19]}}></td>
                            <td><input disabled type="checkbox" {{$day[20]}}></td>
                            <td><input disabled type="checkbox" {{$day[21]}}></td>
                            <td><input disabled type="checkbox" {{$day[22]}}></td>
                            <td><input disabled type="checkbox" {{$day[23]}}></td>
                            <td><input disabled type="checkbox" {{$day[24]}}></td>
                            <td><input disabled type="checkbox" {{$day[25]}}></td>
                            <td><input disabled type="checkbox" {{$day[26]}}></td>
                            <td><input disabled type="checkbox" {{$day[27]}}></td>
                            <td><input disabled type="checkbox" {{$day[28]}}></td>
                            <td><input disabled type="checkbox" {{$day[29]}}></td>
                            <td><input disabled type="checkbox" {{$day[30]}}></td>
                            <td><input disabled type="checkbox" {{$day[31]}}></td>
                            <td><input type="text" ></td>


                        </tr>
                       @endforeach




                        </tbody>

                    </table>


                </div>
                <button type="button" onclick="GenerateTable()" class=" btn btn-outline-primary m-t-20 ">پرینت گزارش</button>

            </div>
        </div>







@stop


