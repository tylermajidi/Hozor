<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SarparastController extends Controller
{

/*    private function AddNewHeadHozoor($idpersenel,$month)
{
    DB::insert('insert into hozoor (`mdate`, `id_persenel`,  `morakhasi_saati`, `ezafekar_shercat`, `ezafekar_erjaei`, `padash_mazaya`, `jarime`) values(?,?,?,?,?,?,?)', [$month, $idpersenel, 0, 0, 0,  0,  0]);
}*/
    public function addevent($subject,$des)
    {
        DB::insert('insert into eventss (subject, des, date, userid ) values (?,?,?,?)',[$subject,$des,session('thisdate'),session('username')]);
    }

//pages
    public function dashboard()
    {

        $thisdate =session('thisdate');


        $listalert = DB::table('alerttable')->where('enddate','>=', $thisdate )->get();

        return view('panel_sarparast.Dashboard',compact('listalert'));

    }

    public function ShowMyEvent()
    {

        $listevent = DB::table('eventss')->where('userid', session('username') )->where('date',session('thisdate'))->orderBy('id','DESC')->get();

        return view('panel_sarparast.ListMyEvent',compact('listevent'));
    }

    public function ShowListPersenel()
    {
      $listu = DB::table('persenel')->where('id_gharardad', session('id_gharardad') )->get();
        foreach ($listu as $row)
        {
                 if (DB::table('hozoor_day')->where('id_persnel', $row->sh_persenel)->where('hdate', session('thisdate'))->doesntExist())
                 {
                     DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$row->sh_persenel, session('thisdate'), '-']);
                 }
        }





        $persenellist = DB::table('persenel')
            -> leftJoin('hozoor_day', 'persenel.sh_persenel', '=', 'hozoor_day.id_persnel')->where('state','active')->where('hdate',session('thisdate'))->where('id_gharardad',session('id_gharardad'))
            ->get();

        return view('panel_sarparast.ListPersenel',compact('persenellist'))->with('sdate', null);
    }
    public function ShowListPersenel2(Request $r)
    {

        $listu = DB::table('persenel')->where('id_gharardad', session('id_gharardad') )->get();
        foreach ($listu as $row)
        {
            if ( ! DB::table('hozoor_day')->where('id_persnel', $row->sh_persenel)->where('hdate', $r->tgetdate)->exists())
            {
                DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$row->sh_persenel, $r->tgetdate, '-']);
            }
        }

        $persenellist = DB::table('persenel')
            ->leftJoin('hozoor_day', 'persenel.sh_persenel', '=', 'hozoor_day.id_persnel')->where('state','active')->where('hdate',$r->tgetdate)->where('id_gharardad',session('id_gharardad'))
            ->get();

        return view('panel_sarparast.ListPersenel',compact('persenellist'))->with('sdate', $r->tgetdate);
    }

    public function PageListPersenelShercati()
    {
        $listu = DB::table('persenel')->where('id_gharardad', session('id_gharardad') )->get();
        foreach ($listu as $row)
        {
            if (DB::table('hozoor_day')->where('id_persnel', $row->sh_persenel)->where('hdate', session('thisdate'))->doesntExist())
            {
                DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$row->sh_persenel, session('thisdate'), '-']);
            }
        }


        $persenellist = DB::table('persenel')
            -> leftJoin('hozoor_day', 'persenel.sh_persenel', '=', 'hozoor_day.id_persnel')->where('persenel.state','active')->where('hozoor_day.hdate',session('thisdate'))->where('persenel.id_gharardad',session('id_gharardad'))
            ->get();

        return view('panel_sarparast.ListPersenelShercati',compact('persenellist'))->with('sdate', null);
    }
    public function PageListPersenelShercati2(Request $r)
    {

        $listu = DB::table('persenel')->where('id_gharardad', session('id_gharardad') )->get();
        foreach ($listu as $row)
        {
            if ( ! DB::table('hozoor_day')->where('id_persnel', $row->sh_persenel)->where('hdate', $r->tgetdate)->exists())
            {
                DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$row->sh_persenel, $r->tgetdate, '-']);
            }
        }

        $persenellist = DB::table('persenel')
            ->leftJoin('hozoor_day', 'persenel.sh_persenel', '=', 'hozoor_day.id_persnel')->where('state','active')->where('hdate',$r->tgetdate)->where('id_gharardad',session('id_gharardad'))
            ->get();

        return view('panel_sarparast.ListPersenelShercati',compact('persenellist'))->with('sdate', $r->tgetdate);
    }

    public function PageListPersenelErja()
    {
        $listu = DB::table('persenel')->where('id_gharardad', session('id_gharardad') )->get();
        foreach ($listu as $row)
        {
            if (DB::table('hozoor_day')->where('id_persnel', $row->sh_persenel)->where('hdate', session('thisdate'))->doesntExist())
            {
                DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$row->sh_persenel, session('thisdate'), '-']);
            }
        }


        $persenellist = DB::table('persenel')
            -> leftJoin('hozoor_day', 'persenel.sh_persenel', '=', 'hozoor_day.id_persnel')->where('persenel.state','active')->where('hozoor_day.hdate',session('thisdate'))->where('persenel.id_gharardad',session('id_gharardad'))
            ->get();

        return view('panel_sarparast.ListPersenelErjaei',compact('persenellist'))->with('sdate', null);
    }
    public function PageListPersenelErja2(Request $r)
    {

        $listu = DB::table('persenel')->where('id_gharardad', session('id_gharardad') )->get();
        foreach ($listu as $row)
        {
            if ( ! DB::table('hozoor_day')->where('id_persnel', $row->sh_persenel)->where('hdate', $r->tgetdate)->exists())
            {
                DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$row->sh_persenel, $r->tgetdate, '-']);
            }
        }

        $persenellist = DB::table('persenel')
            ->leftJoin('hozoor_day', 'persenel.sh_persenel', '=', 'hozoor_day.id_persnel')->where('state','active')->where('hdate',$r->tgetdate)->where('id_gharardad',session('id_gharardad'))
            ->get();

        return view('panel_sarparast.ListPersenelErjaei',compact('persenellist'))->with('sdate', $r->tgetdate);
    }

    public function PageHozoorMahPersenel()
    {
        $tsplit = explode("/", session('thisdate'));
        $sdate=$tsplit[0]."/".$tsplit[1];
        $moon=$tsplit[0]."/".$tsplit[1]."/"."1";
        $listu = DB::table('persenel')->where('id_gharardad', session('id_gharardad') )->get();
               foreach ($listu as $row)
               {
                   if (DB::table('hozoor_day_classic')->where('c_p', $row->sh_persenel)->where('mdate',$moon )->doesntExist())
                   {
                       DB::insert('insert into hozoor_day_classic (`mdate`, `p_name`, `c_p`) values(?,?,?)', [$moon, $row->nam .' '.$row->family, $row->sh_persenel]);
                   }
               }



        $persenellist = DB::table('persenel')
            -> leftJoin('hozoor_day_classic', 'persenel.sh_persenel', '=', 'hozoor_day_classic.c_p')->where('persenel.state','active')->where('hozoor_day_classic.mdate',$moon)->where('persenel.id_gharardad',session('id_gharardad'))
            ->get();


               return view('panel_sarparast.ListPersenelMahane',compact('persenellist'))->with('sdate', $sdate);
           }
    public function PageHozoorMahPersenel2(Request $r)
           {

                $sdate=$r->sal."/".$r->mah;
               $moon=$r->sal."/".$r->mah."/"."1";
               $listu = DB::table('persenel')->where('id_gharardad', session('id_gharardad'))->get();
               foreach ($listu as $row)
               {
                   if (DB::table('hozoor_day_classic')->where('c_p', $row->sh_persenel)->where('mdate',$moon )->doesntExist())
                   {
                       DB::insert('insert into hozoor_day_classic (`mdate`, `p_name`, `c_p`) values(?,?,?)', [$moon, $row->nam .' '.$row->family, $row->sh_persenel]);
                   }
               }



               $persenellist = DB::table('persenel')
                   -> leftJoin('hozoor_day_classic', 'persenel.sh_persenel', '=', 'hozoor_day_classic.c_p')->where('persenel.state','active')->where('hozoor_day_classic.mdate',$moon)->where('persenel.id_gharardad',session('id_gharardad'))
                   
                   
                   ->get();

//->where('persenel.sh_persenel' ,'>', 1090)

               return view('panel_sarparast.ListPersenelMahane',compact('persenellist'))->with('sdate', $sdate);
           }




    //DB

    public function SaveHozoorRozane(Request $r)
    {


        // تا زمانی که حقوق پرداخت نشده هر تاریخی قابل ویرایش باشد
        $data = json_decode($r->jsahozor1, true);
        $data2 = json_decode($r->jsahozor2, true);
        $tdate=$r->tdatehozor;
        $i=0;



        foreach ($data2 as  $d)
        {

            $idp=$data[$i];
            if ($d !="-")
            {
                    if(DB::table('hozoor_day')->where('id_persnel', $idp )->where('hdate',$tdate)->doesntExist())
                         DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$idp, $tdate, $d]);
                    else
                         DB::update('update hozoor_day set  hstate = ? where id_persnel = ? and hdate = ?', [$d, $idp, $tdate]);

                    $savehozor="";
                    if($d=="day")$savehozor="حضور روزانه";
                    if($d=="night")$savehozor="شیفت شب";
                     if($d=="Nobat")$savehozor="نوبت کاری";
                       if($d=="Absence")$savehozor="غیبت";
                        if($d=="Leave")$savehozor="مرخصی";
                    $this->addevent(" ثبت حضور غیاب پرسنل  " ,$idp. " در تاریخ ".$tdate. "نوع ثبت  " . $savehozor);
            }



            $i++;
        }
        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
        return redirect('/sarparast/PageShowListPersenel');

    }

    public function addMorakhasiSaati(Request $r)
    {
       //like  ezafe kar erjae
    }


    public function addٍٍEzafeKarSherkati(Request $r)
    {


        $datapersenel = json_decode($r->jsp, true);
        $datasaat = json_decode($r->jssat, true);
        $tdate=$r->tdate;


        $tsplit = explode("/", $tdate);

        $moon=$tsplit[0]."/".$tsplit[1]."/"."1";




        $i=0;
        foreach ($datapersenel as $dp)
        {
            if (is_numeric($datasaat[$i])==false) $datasaat[$i]=0;
            $x=0;
            $olddata=DB::table('hozoor_day')->where('id_persnel',$dp)->where('hdate',$tdate)->first('ezafekar_shercat');
            $oldvalue=$olddata->ezafekar_shercat;

            $x=$datasaat[$i]-$oldvalue;
            if (DB::table('hozoor')->where('id_persenel', $dp)->where('mdate',$moon)->doesntExist())
            {
                DB::insert('insert into hozoor (mdate, `id_persenel`) values(?,?)', [$moon,$dp]);
            }
            DB::table('hozoor')->where('id_persenel', $dp)->where('mdate',$moon)->increment('ezafekar_shercat', $x);



            DB::update('update hozoor_day set  ezafekar_shercat = ? where id_persnel = ? and hdate = ?', [$datasaat[$i], $dp, $tdate]);
            $this->addevent("ثبت اضافه کار شرکتی","کد پرسنلی :".$dp . "مقدار ساعت". $datasaat[$i] . "ثبت برای ماه" .$moon);
        $i++;
        }

        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
       return redirect('/sarparast/dashboard');

    }


    public function addٍٍEzafeKarٍerjaei(Request $r)
    {


        $datapersenel = json_decode($r->jsp, true);
        $datasaat = json_decode($r->jssat, true);
        $tdate=$r->tdate;


        $tsplit = explode("/", $tdate);

        $moon=$tsplit[0]."/".$tsplit[1]."/"."1";




        $i=0;
        foreach ($datapersenel as $dp)
        {
            if (is_numeric($datasaat[$i])==false) $datasaat[$i]=0;
            $x=0;
            $olddata=DB::table('hozoor_day')->where('id_persnel',$dp)->where('hdate',$tdate)->first('ezafekar_erjaei');
            $oldvalue=$olddata->ezafekar_erjaei;

            $x=$datasaat[$i]-$oldvalue;
            if (DB::table('hozoor')->where('id_persenel', $dp)->where('mdate',$moon)->doesntExist())
            {
                DB::insert('insert into hozoor (mdate, `id_persenel`) values(?,?)', [$moon,$dp]);
            }
            DB::table('hozoor')->where('id_persenel', $dp)->where('mdate',$moon)->increment('ezafekar_erjaei', $x);

            DB::update('update hozoor_day set  ezafekar_erjaei = ? where id_persnel = ? and hdate = ?', [$datasaat[$i], $dp, $tdate]);
            $this->addevent("ثبت اضافه کار ارجاعی","کد پرسنلی :".$dp . "مقدار ساعت". $datasaat[$i] . "ثبت برای ماه" .$moon);
            $i++;
        }

        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
        return redirect('/sarparast/dashboard');

    }

    public function addٍٍHoozorMahaneSonati(Request $r)
    {


        $dtp = json_decode($r->jsp, true);
        $dday = json_decode($r->jday, true);
        $dnight = json_decode($r->jnight, true);
        $dleave = json_decode($r->jleave, true);
        $dnobat = json_decode($r->jnobat, true);
        $tdate=$r->tdate;
        $moon=$tdate."/"."1";

        $i=0;
        foreach ($dtp as $dp)
        {
            if (is_numeric($dday[$i])==false) $dday[$i]=0;
            if (is_numeric($dnight[$i])==false) $dnight[$i]=0;
            if (is_numeric($dleave[$i])==false) $dleave[$i]=0;
            if (is_numeric($dnobat[$i])==false) $dnobat[$i]=0;
            //`day_day`, `night_day`, `leave_day`, `nobat_day` '

            DB::update('update hozoor_day_classic set  day_day=?,night_day=?,leave_day=?,nobat_day=? where c_p = ? and mdate = ?', [$dday[$i],$dnight[$i],$dleave[$i],$dnobat[$i] ,$dp, $moon]);


             /* $ii=1;
            for ($j=1;$j<=$dday[$i];$j++)
            {
                if(DB::table('hozoor_day')->where('id_persnel', $dp )->where('hdate',$tdate.'/'.$ii)->doesntExist())
                    DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$dp, $tdate.'/'.$ii, 'day']);
                else
                    DB::update('update hozoor_day set  hstate = ? where id_persnel = ? and hdate = ?', ['day', $dp, $tdate.'/'.$ii]);
           $ii++;
            }

            for ($j=1;$j<=$dnight[$i];$j++)
            {
                if(DB::table('hozoor_day')->where('id_persnel', $dp )->where('hdate',$tdate.'/'.$ii)->doesntExist())
                    DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$dp, $tdate.'/'.$ii, 'night']);
                else
                    DB::update('update hozoor_day set  hstate = ? where id_persnel = ? and hdate = ?', ['night', $dp, $tdate.'/'.$ii]);
                $ii++;
            }
            for ($j=1;$j<=$dleave[$i];$j++)
            {
                if(DB::table('hozoor_day')->where('id_persnel', $dp )->where('hdate',$tdate.'/'.$ii)->doesntExist())
                    DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$dp, $tdate.'/'.$ii, 'leave']);
                else
                    DB::update('update hozoor_day set  hstate = ? where id_persnel = ? and hdate = ?', ['leave', $dp, $tdate.'/'.$ii]);
                $ii++;
            }
            for ($j=1;$j<=$dnobat[$i];$j++)
            {
                if(DB::table('hozoor_day')->where('id_persnel', $dp )->where('hdate',$tdate.'/'.$ii)->doesntExist())
                    DB::insert('insert into hozoor_day (`id_persnel`, `hdate`, `hstate`) values(?,?,?)', [$dp, $tdate.'/'.$ii, 'nobat']);
                else
                    DB::update('update hozoor_day set  hstate = ? where id_persnel = ? and hdate = ?', ['nobat', $dp, $tdate.'/'.$ii]);
                $ii++;
            }




            */



            $i++;
        }


        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
        return redirect('/sarparast/dashboard');

    }


}
