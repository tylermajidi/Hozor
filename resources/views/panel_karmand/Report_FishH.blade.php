<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=windows-1256">
    <meta name=Generator content="Microsoft Word 15 (filtered)">
    <style>
        <!--
        /* Font Definitions */
        @media print {
            .article { page-break-before: always; }
        }
        @font-face
        {font-family:"Cambria Math";
            panose-1:0 0 0 0 0 0 0 0 0 0;}
        @font-face
        {font-family:Calibri;
            panose-1:2 15 5 2 2 2 4 3 2 4;}
        /* Style Definitions */
        p.MsoNormal, li.MsoNormal, div.MsoNormal
        {margin-top:0cm;
            margin-right:0cm;
            margin-bottom:8.0pt;
            margin-left:0cm;
            text-align:right;
            line-height:107%;
            direction:rtl;
            unicode-bidi:embed;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        .MsoChpDefault
        {font-family:"Calibri",sans-serif;}
        .MsoPapDefault
        {margin-bottom:8.0pt;
            line-height:107%;}
        /* Page Definitions */
        @page WordSection1
        {size:595.3pt 419.55pt;
            margin:14.2pt 28.3pt 7.1pt 21.3pt;}
        div.WordSection1
        {page:WordSection1;}
        -->
    </style>

</head>

<body lang=EN-US>
@foreach($fishlist  as $index=> $row)
    <div class="WordSection1 article" dir=RTL>

        <div align=center dir=rtl>

            <table class=MsoTableGrid dir=rtl border=1 cellspacing=0 cellpadding=0
                   style='border-collapse:collapse;border:none'>
                <tr style='height:49.55pt'>
                    <td width=727 colspan=6 style='width:545.2pt;border:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:49.55pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-size:16.0pt;font-family:"Arial",sans-serif'>{{session('nameshercat')}} </span></b></p>
                    </td>
                </tr>
                <tr style='height:25.25pt'>
                    <td width=242 colspan=2 style='width:181.7pt;border:solid windowtext 1.5pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:25.25pt'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span dir=LTR>{{$row->c_p}}</span></b></p>
                    </td>
                    <td width=242 colspan=2 style='width:181.75pt;border-top:none;border-left:
  solid windowtext 1.5pt;border-bottom:solid windowtext 1.5pt;border-right:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:25.25pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span dir=LTR
                                                         style='font-size:12.0pt'>{{$row->p_name}}</span></b></p>
                    </td>
                    <td width=242 colspan=2 style='width:181.75pt;border-top:none;border-left:
  solid windowtext 1.5pt;border-bottom:solid windowtext 1.5pt;border-right:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:25.25pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span dir=LTR>{{$row->mdate}}</span></b></p>
                    </td>
                </tr>
                <tr style='height:19.95pt'>
                    <td width=242 colspan=2 style='width:181.7pt;border:solid windowtext 1.5pt;
  border-top:none;background:#EDEDED;padding:0cm 5.4pt 0cm 5.4pt;height:19.95pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-size:14.0pt;font-family:"Arial",sans-serif;color:black'>حقوق
  پا&#1740;ه و کار کرد</span></b></p>
                    </td>
                    <td width=242 colspan=2 style='width:181.75pt;border-top:none;border-left:
  solid windowtext 1.5pt;border-bottom:solid windowtext 1.5pt;border-right:
  none;background:#EDEDED;padding:0cm 5.4pt 0cm 5.4pt;height:19.95pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-size:14.0pt;font-family:"Arial",sans-serif;color:black'>مزا&#1740;ـــــــــــــــــــــــــــــــــــا</span></b></p>
                    </td>
                    <td width=242 colspan=2 style='width:181.75pt;border-top:none;border-left:
  solid windowtext 1.5pt;border-bottom:solid windowtext 1.5pt;border-right:
  none;background:#EDEDED;padding:0cm 5.4pt 0cm 5.4pt;height:19.95pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-size:14.0pt;font-family:"Arial",sans-serif;color:black'>کســـــــــــورات</span></b></p>
                    </td>
                </tr>
                <tr style='height:1.0cm'>
                    <td width=126 style='width:94.5pt;border:none;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span lang=FA style='font-family:"Arial",sans-serif'>کارکرد
  عاد&#1740;(روز)</span></b></p>
                    </td>
                    <td width=116 style='width:87.2pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->all_day}}</span></p>
                    </td>
                    <td width=135 style='width:101.25pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>حق اولاد</span></b></p>
                    </td>
                    <td width=107 style='width:80.5pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->h_olad}}</span></p>
                    </td>
                    <td width=133 style='width:99.75pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>ب&#1740;مه سهم کارگر</span></b></p>
                    </td>
                    <td width=109 style='width:82.0pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->s_bime}}</span></p>
                    </td>
                </tr>
                <tr style='height:1.0cm'>
                    <td width=126 style='width:94.5pt;border:none;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span lang=FA style='font-family:"Arial",sans-serif'>حقوق
  ثابت روزانه</span></b></p>
                    </td>
                    <td width=116 style='width:87.2pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->hog_day}}</span></p>
                    </td>
                    <td width=135 style='width:101.25pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>حق مسکن</span></b></p>
                    </td>
                    <td width=107 style='width:80.5pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->mas_khar}}</span></p>
                    </td>
                    <td width=133 style='width:99.75pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>مساعده</span></b></p>
                    </td>
                    <td width=109 style='width:82.0pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->mosa}}</span></p>
                    </td>
                </tr>
                <tr style='height:1.0cm'>
                    <td width=126 style='width:94.5pt;border:none;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span lang=FA style='font-family:"Arial",sans-serif'>اضافه
  کار (ساعت)</span></b></p>
                    </td>
                    <td width=116 style='width:87.2pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->sat_ezafe}}</span></p>
                    </td>
                    <td width=135 style='width:101.25pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>بن و خواروبار</span></b></p>
                    </td>
                    <td width=107 style='width:80.5pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->bon}}</span></p>
                    </td>
                    <td width=133 style='width:99.75pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>جر&#1740;مه</span></b></p>
                    </td>
                    <td width=109 style='width:82.0pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->jarime}}</span></p>
                    </td>
                </tr>
                <tr style='height:1.0cm'>
                    <td width=126 style='width:94.5pt;border:none;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span lang=FA style='font-family:"Arial",sans-serif'>&nbsp;</span></p>
                    </td>
                    <td width=116 style='width:87.2pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>--</span></p>
                    </td>
                    <td width=135 style='width:101.25pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>مبلغ اضافه کار&#1740;</span></b></p>
                    </td>
                    <td width=107 style='width:80.5pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->mablagh_ezafe}}</span></p>
                    </td>
                    <td width=133 style='width:99.75pt;border:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>مال&#1740;ات</span></b></p>
                    </td>
                    <td width=109 style='width:82.0pt;border:none;border-left:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->maliyat}}</span></p>
                    </td>
                </tr>
                <tr style='height:1.0cm'>
                    <td width=126 style='width:94.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.5pt;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span lang=FA style='font-family:"Arial",sans-serif'>&nbsp;</span></p>
                    </td>
                    <td width=116 style='width:87.2pt;border-top:none;border-left:solid windowtext 1.5pt;
  border-bottom:solid windowtext 1.5pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR></span></p>
                    </td>
                    <td width=135 style='width:101.25pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>پاداش</span></b></p>
                    </td>
                    <td width=107 style='width:80.5pt;border-top:none;border-left:solid windowtext 1.5pt;
  border-bottom:solid windowtext 1.5pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->padash}}</span></p>
                    </td>
                    <td width=133 style='width:99.75pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>&nbsp;</span></b></p>
                    </td>
                    <td width=109 style='width:82.0pt;border-top:none;border-left:solid windowtext 1.5pt;
  border-bottom:solid windowtext 1.5pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:1.0cm'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>--</span></p>
                    </td>
                </tr>
            </table>

        </div>

        <p class=MsoNormal dir=RTL><span lang=FA style='font-family:"Arial",sans-serif'>&nbsp;</span></p>

        <div align=center dir=rtl>

            <table class=MsoTableGrid dir=rtl border=1 cellspacing=0 cellpadding=0
                   style='border-collapse:collapse;border:none'>
                <tr style='height:19.95pt'>
                    <td width=121 style='width:90.75pt;border-top:solid windowtext 1.5pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.95pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>حقوق پا&#1740;ه</span></b></p>
                    </td>
                    <td width=121 style='width:90.75pt;border:none;border-top:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.95pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->hog_moon}}</span></p>
                    </td>
                    <td width=121 style='width:90.65pt;border:none;border-top:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.95pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-size:9.0pt;font-family:"Arial",sans-serif'>حقوق و مزا&#1740;ا
  مشمول ب&#1740;مه</span></b></p>
                    </td>
                    <td width=121 style='width:90.65pt;border:none;border-top:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.95pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->bon + $row->hog_moon}}</span></p>
                    </td>
                    <td width=121 style='width:90.7pt;border:none;border-top:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.95pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>جمع کسورات</span></b></p>
                    </td>
                    <td width=121 style='width:90.7pt;border-top:solid windowtext 1.5pt;
  border-left:solid windowtext 1.5pt;border-bottom:none;border-right:none;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.95pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->jarime + $row->s_bime + $row->maliyat + $row->mosa}}</span></p>
                    </td>
                </tr>
                <tr style='height:28.15pt'>
                    <td width=121 style='width:90.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.5pt;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.15pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>جمع حقوق و مزا&#1740;ا</span></b></p>
                    </td>
                    <td width=121 style='width:90.75pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.15pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->jam_gh_mash}}</span></p>
                    </td>
                    <td width=121 style='width:90.65pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.15pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-size:9.0pt;font-family:"Arial",sans-serif'>حقوق و مزا&#1740;ا
  غ&#1740;رمشمول ب&#1740;مه</span></b></p>
                    </td>
                    <td width=121 style='width:90.65pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.15pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->jam_gh_mash -($row->bon + $row->hog_moon)}}</span></p>
                    </td>
                    <td width=121 style='width:90.7pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.15pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><b><span lang=FA
                                                         style='font-family:"Arial",sans-serif'>خالص حقوق پرداخت&#1740;</span></b></p>
                    </td>
                    <td width=121 style='width:90.7pt;border-top:none;border-left:solid windowtext 1.5pt;
  border-bottom:solid windowtext 1.5pt;border-right:none;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.15pt'>
                        <p class=MsoNormal align=center dir=RTL style='margin-bottom:0cm;margin-bottom:
  .0001pt;text-align:center;line-height:normal'><span dir=LTR>{{$row->jam_gh_mash-($row->jarime + $row->s_bime + $row->maliyat + $row->mosa)}}</span></p>
                    </td>
                </tr>
                <tr style='height:41.05pt'>
                    <td width=121 valign=top style='width:90.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.5pt;border-right:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:41.05pt'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span lang=FA style='font-family:"Arial",sans-serif'>تا&#1740;&#1740;د
  مد&#1740;ر عامل</span></b></p>
                    </td>
                    <td width=121 valign=top style='width:90.75pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:41.05pt'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span lang=FA style='font-family:"Arial",sans-serif'>&nbsp;</span></p>
                    </td>
                    <td width=121 valign=top style='width:90.65pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:41.05pt'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span lang=FA style='font-family:"Arial",sans-serif'>&nbsp;</span></p>
                    </td>
                    <td width=121 valign=top style='width:90.65pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:41.05pt'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span dir=LTR>&nbsp;</span></p>
                    </td>
                    <td width=121 valign=top style='width:90.7pt;border:none;border-bottom:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:41.05pt'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><span lang=FA style='font-family:"Arial",sans-serif'>&nbsp;</span></p>
                    </td>
                    <td width=121 valign=top style='width:90.7pt;border-top:none;border-left:
  solid windowtext 1.5pt;border-bottom:solid windowtext 1.5pt;border-right:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:41.05pt'>
                        <p class=MsoNormal dir=RTL style='margin-bottom:0cm;margin-bottom:.0001pt;
  line-height:normal'><b><span lang=FA style='font-family:"Arial",sans-serif'>تا&#1740;&#1740;د
  کارمند</span></b></p>
                    </td>
                </tr>
            </table>

        </div>


    </div>
@endforeach
</body>

</html>
