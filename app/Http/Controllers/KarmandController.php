<?php

namespace App\Http\Controllers;

use http\Exception\UnexpectedValueException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class KarmandController extends Controller
{

        //---------------------------------------------------------page navigate
        public function     dashboard()
    {

       $thisdate =session('thisdate');




      $listalert = DB::table('alerttable')->where('enddate','>=', $thisdate )->get();

        return view('panel_karmand.Dashboard',compact('listalert'));

    }
        public function     PageAddPersenel()
        {
            $joblist=DB::table('job')->get();

            return view('panel_karmand.AddPersenel',compact('joblist'));

        }
        public function     PageListPersenel()
        {
            $persenellist=DB::table('persenel')->where('state','active')->get();
            //echo $persenellist;
            return view('panel_karmand.List_Persenel',compact('persenellist'));
        }
        public function     PageEditPersenel(Request $r)
        {


            $joblist=DB::table('job')->get();
            $persenel=DB::table('persenel')->where('id',$r->id)->first();
            //echo $persenellist;
            return view('panel_karmand.EditPersenel',compact('persenel'),compact('joblist'));
        }
        public function     PageEditCheck(Request $r)
        {
            $checkitem=DB::table('checkbanki')->where('sh_check',$r->sh_check)->first();
          //  echo  $checkitem->sh_check;
            return view('panel_karmand.PageCheckEdit',compact('checkitem'));
        }
        public function     PageListPersenelHesab()
        {
            $persenellist=DB::table('persenel')->where('state','active')->get();
            //echo $persenellist;
            return view('panel_karmand.List_Persenel_hesab',compact('persenellist'));
        }
        public function     PageCheck()
         {
             $listcheck=DB::table('checkbanki')->get();
             return view('panel_karmand.PageCheck',compact('listcheck'));
         }
        public function     PageListPay()
        {
            $listpay=DB::table('daryaft_mosaedeh')->orderBy('id', 'desc')->get();
            $listh=DB::select('SELECT SUM(mony) as jammony, mdate,sdate,count(id)as jamtedad FROM pardakht_hogogh GROUP BY mdate,sdate');
            return view('panel_karmand.List_pay',compact('listpay'),compact('listh'));
        }
        public function     PageListpayData(Request $r)
        {
           /* $this->validate(\request(),[
                'date_pay' => 'required',
                'datesabt'=>'required',
                'mony' => 'required'

            ]);*/
           $datalistofpa= DB::table('daryaft_mosaedeh_data')
                ->select('daryaft_mosaedeh_data.*','persenel.*')
                ->join('persenel','persenel.sh_persenel','=','daryaft_mosaedeh_data.sh_persenel')
                ->where(['daryaft_mosaedeh_data.id_mo' => $r->idmo])
                ->get();

            $date_pay=$r->date_pay;
            $datesabt=$r->datesabt;
            $idmo=$r->idmo;
            $summony=0;
            foreach ($datalistofpa as $row)
            {
                $summony+=$row->mony;
            }
           return view('panel_karmand.PageListPayShow',compact('datalistofpa'))->with('date_pay',$date_pay)->with('datesabt',$datesabt)->with('idmo',$idmo)->with('summony',$summony);

        }
        public function     PageListpayData2(Request $r)
        {
           /* $this->validate(\request(),[
                'date_pay' => 'required',
                'datesabt'=>'required',
                'mony' => 'required'

            ]);*/


            $datalistofpa= DB::table('persenel')
                ->select('persenel.*','pardakht_hogogh.*')
                ->join('pardakht_hogogh','pardakht_hogogh.sh_persenel','=','persenel.sh_persenel')
                ->where('pardakht_hogogh.mdate',$r->mdate)
                ->where('pardakht_hogogh.sdate',$r->sdate)
                ->get();



            $date_pay=$r->date_pay;
            $datesabt=$r->datesabt;

            $summony=0;
            foreach ($datalistofpa as $row)
            {

                $summony+=$row->mony;
            }

            return view('panel_karmand.PageListPayShow2',compact('datalistofpa'))->with('date_pay',$r->mdate)->with('datesabt',$r->sdate)->with('summony',$summony);

        }
        public function     listhozorgheyab()
        {
            $tsplit = explode("/", session('thisdate'));
            $moon=$tsplit[0]."/".$tsplit[1];
            $day = ['0',
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

                ];
            $persenellist=DB::table('persenel')->where('state','active')->get();
            $gharardadlist=DB::table('gharardad')->get();
            $listhozoor=DB::select('SELECT * FROM `hozoor_day` WHERE `hdate` like ? AND(`hstate`="day" OR `hstate`="night" OR `hstate`="nobat" OR `hstate`="leave")',[$moon.'/%']);


            return view('panel_karmand.ListHozor',compact('persenellist','gharardadlist','listhozoor'))->with('moon',$moon)->with('day',$day);
        }
        public function     listhozorgheyab2(Request $r)
        {

            $this->validate(\request(),[
                'selectsal' => 'required',
                'selectfasl'=>'required'
            ]);

        $moon= $r->selectsal .'/'. $r->selectfasl ;
        $day = ['0',
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

        ];
       // echo $moon;
        $persenellist=DB::table('persenel')->where('id_gharardad',$r->selectgharardad)->where('state','active')->get();
        $gharardadlist=DB::table('gharardad')->get();

        $listhozoor=DB::select('SELECT * FROM `hozoor_day` WHERE `hdate` like ? AND(`hstate`="day" OR `hstate`="night" OR `hstate`="nobat" OR `hstate`="leave" )',[$moon.'/%']);

        return view('panel_karmand.ListHozor',compact('persenellist','gharardadlist','listhozoor'))->with('moon',$moon)->with('day',$day);
    }
        public function     Pagefish()
        {
            $gharardadlist=DB::table('gharardad')->get();

            $persenellist=DB::table('persenel')->where('state','active')->where("id_gharardad", $gharardadlist[0]->id)->get();
            return view('panel_karmand.PageFish',compact('persenellist'),compact('gharardadlist'));
        }

        public function     PagePadash()
        {
            $persenellist=DB::table('persenel')->where('state','active')->get();
            $listpaja=DB::table('tpaja')->get();

            return view('panel_karmand.PagePadash',compact('persenellist'),compact('listpaja'));
        }


        public function     Pagelisthogogh(Request $r)
        {
            /*$this->validate(\request(),[
                '$sal' => 'required',
                '$mah'=>'required'
            ]);*/


            /*$tsplit = explode("/", session('thisdate'));
            $moon=$tsplit[0]."/".$tsplit[1];
            $sal=$tsplit[0];
            $mah=$tsplit[1] * 1;*/

            if($r->sal==null && $r->mah==null)
            {
                $TLHS=DB::table('tablelisthogogh')->where('mdate',"1373")->get();
                $listgharardad=DB::table('gharardad')->where('state','active')->get();
                return view('panel_karmand.PageListHoghoghShow',compact('TLHS'),compact('listgharardad') )->with('sal',"")->with('mah',"");
            }

            $sal=$r->sal ;
            $mah=$r->mah;
            $moon=$sal . '/' . $mah;

            $actionkar="add";

           /* $moon2=$sal . '/' . $mah;*/

            /*if($mah<10) {$moon=$sal . '/' . $mah; $moon2=$sal . '/' . $mah;}*/
            $moonfake=$sal . '/' . $mah;
            $mahf=$mah;
            $salf=$sal;
            $moonbase="";
            $Tp=DB::table('persenel')->where('state','active')->where('id_gharardad',$r->gharardad)->get();
            while (true)
            {
                if(DB::table('baseconfig')->where('sal',$moonfake)->exists())
                {
                    $moonbase=$moonfake;
                    break;
                }else {
                        $mahf--;
                        if ($mahf == 0) $moonfake = $salf; else $moonfake = $salf . '/' . $mahf;
                        if ($mahf < 0) {


                            alert()->error('عملیات ناموفق', 'اطلاعات پایه سالانه برای تاریخ انتخاب تعریف نشده است.');
                            return redirect('/karmand/PageListPay');

                            break;
                    }
                }
            }

            $Tc = DB::table('baseconfig')->where('sal', $moonbase)->first();

            foreach ($Tp as $Tprow)
            {

                //hozor head
                if(DB::table('hozoor')->where('id_persenel', $Tprow->sh_persenel )->where('mdate',$moon.'/'."1")->doesntExist())
                    DB::insert('insert into hozoor (`mdate`, `id_persenel`, `morakhasi_saati`, `ezafekar_shercat`, `ezafekar_erjaei`, `padash_mazaya`,  `jarime`) values(?,?,?,?,?,?,?)', [$moon.'/'."1", $Tprow->sh_persenel,  0, 0, 0,  0, 0]);


                //


                if(DB::table('tablelisthogogh')->where('c_p', $Tprow->sh_persenel )->where('mdate',$moon.'/'.'1')->exists()) $actionkar="edit";  else{$actionkar="add";}


                if($r->classic != null && $r->classic=="classic")
                {
                    $days=DB::table('hozoor_day_classic')->where('mdate' ,$moon."/1")->where('c_p',$Tprow->sh_persenel)->first();
                   if($days != null){
                       $day_day=$days->day_day;
                       $night_day=$days->night_day;
                       $leave_day=$days->leave_day;
                       $nobat_day=$days->nobat_day;
                   }else
                   {
                       $day_day=0;
                       $night_day=0;
                       $leave_day=0;
                       $nobat_day=0;
                   }



                }else if($r->classic != null && $r->classic=="normal")
                {
                    $day_day=DB::table('hozoor_day')->where('hdate' ,'LIKE',$moon."/%")->where('hstate','day')->where('id_persnel',$Tprow->sh_persenel)->count('id');
                    $night_day=DB::table('hozoor_day')->where('hdate' ,'LIKE',$moon."/%")->where('hstate','night')->where('id_persnel',$Tprow->sh_persenel)->count('id');
                    $leave_day=DB::table('hozoor_day')->where('hdate' ,'LIKE',$moon."/%")->where('hstate','Leave')->where('id_persnel',$Tprow->sh_persenel)->count('id');
                    $nobat_day=DB::table('hozoor_day')->where('hdate' ,'LIKE',$moon."/%")->where('hstate','nobat')->where('id_persnel',$Tprow->sh_persenel)->count('id');

                }


                 $all_day= $day_day + $night_day + $nobat_day+$leave_day;

                    $thozoor=DB::table('hozoor')->where('mdate',$moon.'/'.'1')->where('id_persenel',$Tprow->sh_persenel)->first();

                    if($thozoor==null) continue;


                    $mosa= DB::table('daryaft_mosaedeh_data')
                        ->select('daryaft_mosaedeh_data.*','daryaft_mosaedeh.*')
                        ->join('daryaft_mosaedeh','daryaft_mosaedeh.id','=','daryaft_mosaedeh_data.id_mo')
                        ->where(['daryaft_mosaedeh_data.sh_persenel' => $Tprow->sh_persenel])
                        ->where('daryaft_mosaedeh.date_pay',$moon)
                        ->sum('daryaft_mosaedeh_data.mony');




                    $bon=0;
                    $maskan=0;
                    $paysanavat=0;
                    $maliyat=0;
                    $hagh_shift=0;
                    $hagh_shift2=0;
                    $hagh_olad=0;

                        $hagh_shift=$night_day * $Tc->hoghogh_paye_rozane * $Tc->hagh_shift;
                        $hagh_shift2=$nobat_day * $Tc->hoghogh_paye_rozane * $Tc->hagh_shift2;
                        $hagh_shift=$hagh_shift+$hagh_shift2;

                    $mablagh_ezafe=($thozoor->ezafekar_shercat * $Tc->ezafekar_shercat) + ($thozoor->ezafekar_erjaei*$Tc->ezafekar_erjaei);

                    if($mah <=6)
                    {
                        $bon=$Tc->bon * ($all_day/31);
                        $maskan=($Tc->hagh_maskan + $Tc->hagh_kharobar) *($all_day/31);
                        $hagh_olad=($Tprow->farzand * $Tc->hagh_olad) *($all_day/31);
                    }elseif($mah >=7 &&  $mah<12)
                    {
                        $bon=$Tc->bon * ($all_day/30);
                        $maskan=($Tc->hagh_maskan + $Tc->hagh_kharobar) *($all_day/30);
                        $hagh_olad=($Tprow->farzand * $Tc->hagh_olad) *($all_day/30);
                    }else{
                        //12
                        $bon=$Tc->bon * ($all_day/29);
                        $maskan=($Tc->hagh_maskan + $Tc->hagh_kharobar) *($all_day/29);
                        $hagh_olad=($Tprow->farzand * $Tc->hagh_olad) *($all_day/29);
                    }

                    $mash_namash=($Tc->hoghogh_paye_rozane * $all_day)+$bon+$maskan+$hagh_olad;

                    $mash_namash=$mash_namash+$paysanavat+$mablagh_ezafe+$hagh_shift+$thozoor->padash_mazaya;



                    if($mash_namash > $Tc->maleyat_flag)
                    {
                        $maliyat= $mash_namash-$Tc->maleyat_flag;
                        $maliyat=$maliyat*$Tc->darsad_maleyat;
                    }else $maliyat=0;


                    $mashmool=($Tc->hoghogh_paye_rozane * $all_day)+$bon;
                    $mande=$mash_namash-$mosa-$maliyat-($mashmool * $Tc->darsad_bime) - $thozoor->jarime;
                    $kolnotpay=$mande;

                    //chceck hoggh va agar pardakht shode kam shavad
                        $payold=DB::select('SELECT  SUM(mony) as jammony FROM pardakht_hogogh WHERE sh_persenel=? and mdate=? GROUP BY mdate',[$Tprow->sh_persenel,$sal .'/' . $mah .'/'.'1']);
                        if ($payold !=null)
                        {
                        if( $mande==$payold[0]->jammony) $mande=0; else $mande=$mande-$payold[0]->jammony;
                        }


                    if($actionkar=="add")
                    {
                    DB::insert(
                        'insert into tablelisthogogh (`mdate`, `p_name`, `c_p`, `all_day`, `day_day`,
                        `night_day`, `leave_day`, `hog_day`, `hog_moon`, `bon`, `mas_khar`, `h_olad`, `p_san`,
                         `sat_ezafe`, `mablagh_ezafe`, `jarime`, `sat_moakhasi`, `jam_mash`, `jam_gh_mash`, `s_bime`,
                          `maliyat`, `mosa`, `hagh_shift`, `padash`, `mande`,nobat_day,kolnotpay)
                        values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                        [
                            $moon.'/'.'1',
                            $Tprow->nam . ' ' . $Tprow->family,
                            $Tprow->sh_persenel,
                            $all_day,
                            $day_day,
                            $night_day,
                            $leave_day,
                            $Tc->hoghogh_paye_rozane,
                            $Tc->hoghogh_paye_rozane * $all_day,
                            $bon,
                            $maskan,
                            $hagh_olad ,
                            0,
                            $thozoor->ezafekar_shercat + $thozoor->ezafekar_erjaei,
                            $mablagh_ezafe,
                            $thozoor->jarime,
                            $thozoor->morakhasi_saati,
                            $mashmool,
                            $mash_namash,
                            $mashmool * $Tc->darsad_bime,
                            $maliyat,
                            $mosa,
                            $hagh_shift,
                            $thozoor->padash_mazaya,
                            $mande,
                            $nobat_day,
                            $kolnotpay

                            ]);
                    }else
                         {
                             //UPDATE `tablelisthogogh` SET `sat_moakhasi` = '2' WHERE `tablelisthogogh`.`id` = 13;
                             DB::update(
                                 'UPDATE tablelisthogogh SET `mdate`=?, `p_name`=?, `c_p`=?, `all_day`=?, `day_day`=?,
                        `night_day`=?, `leave_day`=?, `hog_day`=?, `hog_moon`=?, `bon`=?, `mas_khar`=?, `h_olad`=?, `p_san`=?,
                         `sat_ezafe`=?, `mablagh_ezafe`=?, `jarime`=?, `sat_moakhasi`=?, `jam_mash`=?, `jam_gh_mash`=?, `s_bime`=?,
                          `maliyat`=?, `mosa`=?, `hagh_shift`=?, `padash`=?, `mande`=?,nobat_day=?,kolnotpay=? WHERE  `c_p`=? and `mdate`=?',

                                    [
                                     $moon.'/'.'1',
                                     $Tprow->nam . ' ' . $Tprow->family,
                                     $Tprow->sh_persenel,
                                     $all_day,
                                     $day_day,
                                     $night_day,
                                     $leave_day,
                                     $Tc->hoghogh_paye_rozane,
                                     $Tc->hoghogh_paye_rozane * $all_day,
                                     $bon,
                                     $maskan,
                                        $hagh_olad,
                                     0,
                                     $thozoor->ezafekar_shercat + $thozoor->ezafekar_erjaei,
                                     $mablagh_ezafe,
                                     $thozoor->jarime,
                                     $thozoor->morakhasi_saati,
                                     $mashmool,
                                     $mash_namash,
                                     $mashmool * $Tc->darsad_bime,
                                     $maliyat,
                                     $mosa,
                                     $hagh_shift,
                                     $thozoor->padash_mazaya,
                                     $mande,
                                        $nobat_day,
                                        $kolnotpay,
                                        $Tprow->sh_persenel,
                                        $moon.'/'.'1'


                                 ]);

                         }


            }



            $showdate=$moon.'/'.'1';
            $TLHS= DB::table('tablelisthogogh')
                ->select('tablelisthogogh.*')
                ->join('persenel','persenel.sh_persenel','=','tablelisthogogh.c_p')
                ->where('tablelisthogogh.mdate','LIKE',$showdate)
                ->where('persenel.id_gharardad',$r->gharardad)->get();

            $listgharardad=DB::table('gharardad')->where('state','active')->get();

             return view('panel_karmand.PageListHoghoghShow',compact('TLHS'),compact('listgharardad') )->with('sal',$sal)->with('mah',$mah);
        }

        public function     PageShowTasv(Request $r)
             {
                 $id=$r->id;
                 $Tc = DB::table('baseconfig')->get();

                 return view('panel_karmand.PageTasvei',compact('Tc'))->with('id',$id);
             }
        public function     ShowPageTark(Request $r)
        {

            $all_day=0;
            $jammorakhasi=0;
            $jampay=0;
            $khaless=0;
            $jamkol=0;
            $eydi=0;

            $bazkharidmorakhasi=0;
            $haghsanavat=0;







            $persenel=DB::table('persenel')->where('id',$r->id)->first();
            $TLHS= DB::table('tablelisthogogh')
                ->select('tablelisthogogh.*')
                ->join('persenel','persenel.sh_persenel','=','tablelisthogogh.c_p')
                ->where('persenel.id',$r->id)
                ->where('tablelisthogogh.mdate','like',$r->sal.'%')
                ->where('tablelisthogogh.kolnotpay', '>' ,0)->get();
            foreach ($TLHS as $row)
            {
                //-------------------------------------------------

                $tsplit = explode("/", $row->mdate);
                $sal=$tsplit[0];
                $mah=$tsplit[1] * 1;

                $moonfake=$sal . '/' . $mah;
                $mahf=$mah;
                $salf=$sal;
                $moonbase="";

                while (true) {
                    if (DB::table('baseconfig')->where('sal', $moonfake)->exists()) {
                        $moonbase = $moonfake;
                        break;
                    } else {
                        $mahf--;
                        if ($mahf == 0) $moonfake = $salf; else $moonfake = $salf . '/' . $mahf;
                        if ($mahf < 0) {


                            alert()->error('عملیات ناموفق', 'اطلاعات پایه سالانه برای تاریخ انتخاب تعریف نشده است.');
                            return redirect('/karmand/PageShowTasv');

                            break;
                        }
                    }
                }

                $Tc = DB::table('baseconfig')->where('sal', $moonbase)->first();
                //---------------------------------------------

                $all_day=$all_day+ $row->all_day;
                $jamkol=$jamkol+$row->kolnotpay;
                $jammorakhasi=$jammorakhasi+$row->leave_day;
                $jampay=$jampay+ ($row->kolnotpay - $row->mande);

                //-----------
                $eydi= $eydi + ($row->all_day * $Tc->eydi_rozane);
                $haghsanavat= $haghsanavat+ ($row->all_day * $Tc->sanavat_rozane);
                //---------
                $morakhasi_mah=$Tc->modat_morakhasi_sal/12;
                $morakhasi_mah=$morakhasi_mah * $Tc->hoghogh_paye_rozane;
                $bazkharidmorakhasi=$bazkharidmorakhasi+$morakhasi_mah;

                //--------

            }

// tc طبق هر ماه جدا محاسبه شود
           /* $eydi=$all_day * $Tc->eydi_rozane;
            $haghsanavat=$all_day * $Tc->sanavat_rozane;*/
            $jamkol=$jamkol+$eydi;
            $jamkol=$jamkol+$haghsanavat;
            //----------bazkharid morakhasi
           /* $x=$Tc->modat_morakhasi_sal / $Tc->tedad_roz_sal;
            $x=$x*$all_day;
            if($x >$jammorakhasi)
            {
                $bazkharidmorakhasi= ($x-$jammorakhasi) * $Tc->hoghogh_paye_rozane;
                $jamkol =$jamkol-$bazkharidmorakhasi;
            }
            else
            {
                $bazkharidmorakhasi= ($jammorakhasi-$x) * $Tc->hoghogh_paye_rozane;
                $jamkol =$jamkol+$bazkharidmorakhasi;
            }*/
            $jamkol =$jamkol+$bazkharidmorakhasi;

            $khaless= $jamkol-$jampay;
            return view('panel_karmand.PageTark',compact('TLHS'),compact('persenel'))->with('eydi',round($eydi))->with('haghsanavat',round($haghsanavat))->with('jamkol',round($jamkol))->with('id',$r->id)->with('bazkharidmorakhasi',round($bazkharidmorakhasi))->with('khaless',round($khaless));

        }

        public function     Report_taahod()
        {
            return view('panel_karmand.Report_taahod');
        }

    //------------------------------------------------------------action db
        public function     AddPersenel(Request $r)
        {
            $this->validate(\request(),[
                'sh_persenel' => 'required',
                'nam'=>'required',
                'family'=>'required',
                'Father'=>'required',
                'sh_meli'=>'required',
                'sh_sh'=>'required',
                'sh_phone'=>'required',
                'sh_bime'=>'required',
                'sh_hesab'=>'required',
                'date_start'=>'required',
                'date_end'=>'required',
                'farzand'=>'required'


            ]);

            if(DB::table('persenel')->where('sh_persenel', $r->sh_persenel )->exists())
            {

                alert()->error('عملیات ناموفق', 'خطا در ذخیره اطلاعات کد پرسنلی صحیح نیست');
                $r->flash();
                return redirect('/karmand/PageAddPersenel');

            }else
            {
                DB::insert('insert into persenel (sh_persenel, nam, family, Father,sh_meli, sh_sh, sh_phone,sh_bime, sh_hesab, job, state, date_start, date_end,farzand) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$r->sh_persenel, $r->nam, $r->family, $r->Father, $r->sh_meli, $r->sh_sh, $r->sh_phone,$r->sh_bime, $r->sh_hesab, $r->job, "active", $r->date_start, $r->date_end,$r->farzand]);
                alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
                return redirect('/karmand/PageAddPersenel');
            }


        }
        public function     AddCheck(Request $r)
         {
             $this->validate(\request(),[
                 'sh_check' => 'required',
                 'mablagh'=>'required',
                 'ownercheck' => 'required',
                 'daryaftkonande' => 'required',
                 'bank' =>'required',
                 'date_check' => 'required',
                 'des' => 'required'

             ]);

          if(DB::table('checkbanki')->where('sh_check', $r->sh_check )->exists())
        {

            alert()->error('عملیات ناموفق', 'خطا در ذخیره اطلاعات شماره چک صحیح نیست');
            $r->flash();
            return redirect('/karmand/PageCheck');

        }else
        {

           DB::insert('insert into checkbanki (sh_check, mablagh, ownercheck, daryaftkonande,bank, date_check, des, state) values(?,?,?,?,?,?,?,?)', [$r->sh_check, $r->mablagh, $r->ownercheck, $r->daryaftkonande,$r->bank, $r->date_check, $r->des, 'new']);
            alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
               return redirect('/karmand/PageCheck');

        }
         }
        public function     DeletePersenel(Request $r)
        {

            if(DB::table('tablelisthogogh')->where('c_p', $r->sh_persenel)->doesntExist()) {
                DB::table('persenel')->where('id', $r->id)->delete();

                alert()->success('عملیات موفق', 'حذف با موفقیت انجام شد');
                return redirect('/karmand/PageListPersenel');
            }else
            {

                alert()->warning('عملیات ناموفق', 'حذف امکان پذیر نیست شخص انتخابی دارای اطلاعات میباشد.');

                return redirect('/karmand/PageListPersenel');
            }
        }
        public function     SetTark(Request $r)
        {

            DB::update('update persenel set state = ?  where id = ?', ['tark',  $r->id]);

            alert()->success('عملیات موفق', 'ترک کار با موفقیت انجام شد.');
                return redirect('/karmand/PageListPersenel');

        }

        public function     EditPersenel(Request $r)
        {
            $this->validate(\request(),[
                'sh_persenel' => 'required',
                'nam'=>'required',
                'family'=>'required',
                'Father'=>'required',
                'sh_meli'=>'required',
                'sh_sh'=>'required',
                'sh_phone'=>'required',
                'sh_bime'=>'required',
                'sh_hesab'=>'required',
                'date_start'=>'required',
                'date_end'=>'required',
                'farzand'=>'required'


            ]);

            if(DB::table('persenel')->where('sh_persenel', $r->sh_persenel )->exists() && $r->sh_persenel2 != $r->sh_persenel)
            {


                alert()->error('عملیات ناموفق', 'خطا در ویرایش اطلاعات کد پرسنلی صحیح نیست');
                return  Redirect::back();

            }else
            {
                if($r->date_end =="0000-00-00")  $r->date_end ="";
                DB::update('update persenel set sh_persenel = ? ,nam = ?, family = ?, Father = ?,sh_meli = ?, sh_sh = ?, sh_bime = ?, sh_hesab = ?, job = ?, state = ?, date_start = ?, date_end = ?,farzand = ?,sh_phone=? where id = ?', [$r->sh_persenel, $r->nam, $r->family, $r->Father, $r->sh_meli, $r->sh_sh, $r->sh_bime, $r->sh_hesab, $r->job, "active", $r->date_start, $r->date_end ,$r->farzand,$r->sh_phone, $r->id]);
                alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
                return redirect('/karmand/PageListPersenel');
            }
        }
        public function     EditCheck(Request $r)
    {
        $this->validate(\request(),[
            'sh_check' => 'required',
            'mablagh'=>'required',
            'ownercheck' => 'required',
            'daryaftkonande' => 'required',
            'bank' =>'required',
            'date_check' => 'required',
            'des' => 'required'

        ]);
        if(DB::table('checkbanki')->where('sh_check', $r->sh_check )->exists() && $r->sh_check2 != $r->sh_check)
        {


            alert()->error('عملیات ناموفق', 'خطا در ویرایش اطلاعات شماره چک صحیح نیست');
            return  Redirect::back();

        }else
        {
            DB::update('update checkbanki set sh_check = ? ,mablagh = ?, ownercheck = ?, daryaftkonande = ?,bank = ?, date_check = ?, des = ? where sh_check = ?', [$r->sh_check, $r->mablagh, $r->ownercheck, $r->daryaftkonande, $r->bank, $r->date_check, $r->des, $r->sh_check2]);
            alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
            return redirect('/karmand/PageCheck');
        }
    }
        public function     AddMosaedeh(Request $r)
        {
            $this->validate(\request(),[
                'jsa' => 'required',
                'jsa2'=>'required',
                'mony' => 'required',
                'sal' => 'required',
                'mah'=>'required'


            ]);

           $data = json_decode($r->jsa, true);
           $data2 = json_decode($r->jsa2, true);
           if( DB::insert('insert into daryaft_mosaedeh (datesabt, des, date_pay) values(?,?,?)',
               [session('thisdate'),$r->des, $r->sal . '/'.$r->mah]))
           {
               $lastrecord=DB::table('daryaft_mosaedeh')->get()->last()->id;

                $ii=0;
               foreach ($data as $d)
               {
                   if($d !=null) {
                                    DB::insert('insert into daryaft_mosaedeh_data (id_mo, sh_persenel, sh_hesab,mony) values(?,?,?,?)', [$lastrecord,$data2[$ii],$d, $r->mony]);
                                }
                   $ii++;
               }


               alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
               return redirect('/karmand/PageListPay');


           }else
           {

               alert()->error('عملیات ناموفق', 'خطا در ذخیره اطلاعات صحیح نیست');
               return  Redirect::back();
           }







        }
        public function     DeleteCheck(Request $r)
          {
                DB::table('checkbanki')->where('sh_check', $r->sh_check)->delete();

              alert()->success('عملیات موفق', 'حذف با موفقیت انجام شد');
                return redirect('/karmand/PageCheck');
          }
        public function     PassCheck(Request $r)
            {
               // echo $r->sh_check();
                DB::update('update checkbanki set state = ? where sh_check = ?', ['passed', $r->sh_check]);
                alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
               return redirect('/karmand/PageCheck');
            }
        public function     DeleteMosaedeh(Request $r)
        {
            DB::table('daryaft_mosaedeh')->where('id', $r->id)->delete();
            DB::table('daryaft_mosaedeh_data')->where('id_mo', $r->id)->delete();
            alert()->success('عملیات موفق', 'حذف با موفقیت انجام شد');
            return redirect('/karmand/PageListPay');
        }
        public function     GetListpayDataFile(Request $r)
            {

                $datalistofpa= DB::table('daryaft_mosaedeh_data')
                    ->select('daryaft_mosaedeh_data.*','persenel.*')
                    ->join('persenel','persenel.sh_persenel','=','daryaft_mosaedeh_data.sh_persenel')
                    ->where(['daryaft_mosaedeh_data.id_mo' => $r->idmo])
                    ->get();


                $date_pay=$r->date_pay;
                $datesabt=$r->datesabt;
                $txt="00000000000000000000000"."\r\n";
                foreach ($datalistofpa as $row)
                {
                    $hesab=$row->sh_hesab;
                    $mony=$row->mony;
                    if(strlen($hesab) + strlen($mony) < 23)
                    {
                        $o=23- (strlen($hesab) + strlen($mony) );

                        for ($i=1;$i<=$o;$i++)
                        {
                            $hesab=$hesab."0";

                        }

                        $txt .= $hesab . $mony ."\r\n" ;



                    }
        }



        return response("$txt")
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="shomarehesab_mosaedeh.txt',
            ]);



    }
        public function     GetListpayDataFile2(Request $r)
    {

        $datalistofpa= DB::table('persenel')
            ->select('persenel.*','pardakht_hogogh.*')
            ->join('pardakht_hogogh','pardakht_hogogh.sh_persenel','=','persenel.sh_persenel')
            ->where('pardakht_hogogh.mdate',$r->mdate)
            ->where('pardakht_hogogh.sdate',$r->sdate)
            ->get();


        $date_pay=$r->mdate;
        $datesabt=$r->sdate;
        $txt="00000000000000000000000"."\r\n";
        foreach ($datalistofpa as $row)
        {
            $hesab=$row->sh_hesab;
            $mony=$row->mony;
            if(strlen($hesab) + strlen($mony) < 23)
            {
                $o=23- (strlen($hesab) + strlen($mony) );

                for ($i=1;$i<=$o;$i++)
                {
                    $hesab=$hesab."0";

                }

                $txt .= $hesab . $mony ."\r\n" ;



            }
        }



        return response("$txt")
            ->withHeaders([
                'Content-Type' => 'text/plain',
                'Cache-Control' => 'no-store, no-cache',
                'Content-Disposition' => 'attachment; filename="shomarehesab_hoghogh.txt',
            ]);



    }
        public function     pardakh_H(Request $r)
        {
            $this->validate(\request(),[
                'jslist' => 'required',
                'jspay'=>'required',
                'sal' => 'required',
                'mah'=>'required'


            ]);

        $data_list_persenel = json_decode($r->jslist, true);
        $data_list_pay = json_decode($r->jspay, true);
        $i=0;



        foreach ($data_list_persenel as $d)
            {
                if($d !=null) {

                    $tp=DB::table('persenel')->where('sh_persenel',$d)->first();
                    if($tp==null)
                    {


                        alert()->error('عملیات ناموفق', 'خطا یکی از پرسنل قبلا حذف شده است در صورتی که پرداخت برای افرادی که شما انتخاب کرده اید انجام شده میتوانید آن را از لیست پرداخت حقوق حذف کرده');
                        return redirect('/karmand/PageListPay');
                    }
                     //check agar mosa bishtar az hogogh shod be mah baad ezafe shavad
                    if($data_list_pay[$i] <0)
                    {
                        // کم کردن مساعده از ماه انتخابی و انتقال به ماه جدید
                        $oldmoon=$r->mdate;
                        $mony=$data_list_pay[$i];
                        $shh=$tp->sh_hesab;
                        $shp=$tp->sh_persenel;
                        $nextmoon="";
                      //  $tt[]=explode("-",$r->mdate);
                $mah=$r->mah;
                $sal=$r->sal;
                        if($mah <12)
                        {
                            if ($mah < 10) $mah=$mah;
                            $oldmoon=$sal.'/'.$mah;

                            $mah=$mah+1;
                            if ($mah < 10) $mah=$mah;
                            $nextmoon=$sal.'/'.$mah;

                        }
                        else {
                            $oldmoon=$sal.'/'.('12');
                            $nextmoon = ($sal + 1) . '/' . ('1');
                             }

                        $this->solvemosa($nextmoon,$shp,$shh,$mony,$oldmoon);

                    }else{
                    DB::insert('insert into pardakht_hogogh (sh_persenel, mony, sh_hesab,mdate,sdate,des)
                             values(?,?,?,?,?,?)', [$d,$data_list_pay[$i],$tp->sh_hesab,$r->sal.'/'.$r->mah.'/'.'1',session('thisdate'),""]);
                        }
                }
                $i++;

            }

            alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');

            return redirect('/karmand/PageListPay');



         }
        public function     solvemosa($nextmoon,$shp,$shh,$mony,$oldmoon)
         {

             if( DB::insert('insert into daryaft_mosaedeh (datesabt, des, date_pay) values(?,?,?)',[session('thisdate'),'مساعده انتقالی از ماه قبل', $nextmoon]))
             {
                 $lastrecord=DB::table('daryaft_mosaedeh')->get()->last()->id;
                 DB::insert('insert into daryaft_mosaedeh_data (id_mo, sh_persenel, sh_hesab,mony) values(?,?,?,?)', [$lastrecord,$shp,$shh, ($mony*-1)]);

                 //edit mosa
                 $oldmosarecord= DB::table('daryaft_mosaedeh_data')
                     ->select('daryaft_mosaedeh_data.id as idid','daryaft_mosaedeh_data.*','daryaft_mosaedeh.*')
                     ->join('daryaft_mosaedeh','daryaft_mosaedeh.id','=','daryaft_mosaedeh_data.id_mo')
                     ->where('daryaft_mosaedeh_data.sh_persenel' , $shp)
                     ->where('daryaft_mosaedeh.date_pay',$oldmoon)
                     ->first();



                 DB::insert('insert into daryaft_mosaedeh_data (id_mo, sh_persenel, sh_hesab,mony) values(?,?,?,?)', [$oldmosarecord->id_mo,$shp,$shh, $mony]);

               //  DB::update('update daryaft_mosaedeh_data set mony = ?  where  id= ?', [ $newmony, $oldmosarecord->idid]);

             }



         }
        public function     DeleteHoghogh(Request $r)
          {
            DB::table('pardakht_hogogh')->where('mdate', $r->mdate)->where('sdate',$r->sdate)->delete();
              alert()->success('عملیات موفق', 'حذف با موفقیت انجام شد');
            return redirect('/karmand/PageListPay');
          }

        public function     showreport(Request $r)
         {
            if($r->printselect == "fish")
            {
                if ($r->selectpersenel=="all")
                {


                    $fishlist= DB::table('tablelisthogogh')
                        ->select('tablelisthogogh.*','persenel.*')
                        ->join('persenel','persenel.sh_persenel','=','tablelisthogogh.c_p')
                        ->where('tablelisthogogh.mdate',$r->sal. '/'. $r->mah . '/' . "1")
                        ->where("persenel.id_gharardad",$r->selectgharardad)
                        ->get();

                   // $fishlist=DB::table('tablelisthogogh')->where('mdate',$r->sal. '/'. $r->mah . '/' . "1")->get();

                    return view('panel_karmand.Report_FishH',compact('fishlist'));
                }else
                {
                    $fishlist=DB::table('tablelisthogogh')->where('c_p',$r->selectpersenel) ->where('mdate',$r->sal. '/'. $r->mah . '/' . "1")->get();
                    return view('panel_karmand.Report_FishH',compact('fishlist'));
                }


            }else if($r->printselect == "gharardad")
            {
                if($r->selectpersenel=="all") {
                    $base=DB::table('baseconfig')->where('sal',$r->sal.'/'.$r->mah)->first();
                    $mm=$r->mah;
                    while($base==null && $mm>0)
                    {
                        $mm--;
                        $base=DB::table('baseconfig')->where('sal',$r->sal.'/'.$mm)->first();
                    }
                    if ($base==null) $base=DB::table('baseconfig')->where('sal',$r->sal)->first();

                    if ($base==null) $base=DB::table('baseconfig')->where('sal',$r->sal)->first();
                    $ghlist = DB::table('persenel')->where("id_gharardad",$r->selectgharardad)->get();

                    $selectgharardad=DB::table('gharardad')->where('id',$r->selectgharardad)->first();

                    return view('panel_karmand.Report_gharardad', compact('ghlist'),compact('base'))->with('selectgharardad' ,$selectgharardad->namegharardad);
                }else
                {
                    $base=DB::table('baseconfig')->where('sal',$r->sal.'/'.$r->mah)->first();
                    $mm=$r->mah;
                    while($base==null && $mm>0)
                    {
                        $mm--;
                        $base=DB::table('baseconfig')->where('sal',$r->sal.'/'.$mm)->first();
                    }
                    if ($base==null) $base=DB::table('baseconfig')->where('sal',$r->sal)->first();
                    $ghlist = DB::table('persenel')->where('sh_persenel',$r->selectpersenel) ->get();

                    $selectgharardad=DB::table('gharardad')->where('id',$r->selectgharardad)->first();

                    return view('panel_karmand.Report_gharardad', compact('ghlist'),compact('base'))->with('selectgharardad' ,$selectgharardad->namegharardad);
                }
            }else
                if($r->printselect == "eshteghal")
            {

                    $person = DB::table('persenel')->where('sh_persenel',$r->selectpersenel)->first();
                    $girande=$r->girande;
                    $hogogh=$r->hogogh;
                    $namezemanat=$r->namezemanat;
                    $mablaghzemanat=$r->mablaghzemanat;
                    if($person !=null)
                    return view('panel_karmand.Report_govahieshteghal', compact('person'))->with('girande',$girande)->with('hogogh',$hogogh);
                    else
                    {
                        alert()->warning('در این بخش شما میتوانید فقط یک شخص را انتخاب کنید', 'خطا');
                        return  redirect()->back();
                    }




            }else if($r->printselect == "taahod")
            {

                $person = DB::table('persenel')->where('sh_persenel',$r->selectpersenel)->first();
                $girande=$r->girande;
                $hogogh=$r->hogogh;
                $namezemanat=$r->namezemanat;
                $mablaghzemanat=$r->mablaghzemanat;
              if($person!=null)
                return view('panel_karmand.Report_taahod', compact('person'))->with('girande',$girande)->with('hogogh',$hogogh)->with('namezemanat',$namezemanat)->with('mablaghzemanat',$mablaghzemanat);
              else
                {
                    alert()->warning('در این بخش شما میتوانید فقط یک شخص را انتخاب کنید', 'خطا');
                    return  redirect()->back();
                }


            }else if($r->printselect == "adam")
            {


                $person = DB::table('persenel')->where('sh_persenel',$r->selectpersenel)->first();
                $edare=$r->edare;
                $datepayan=$r->datepayan;
                $dateadam=$r->dateadam;

                if($person!=null)
                    return view('panel_karmand.Report_adamneyaz', compact('person'))->with('edare',$edare)->with('datepayan',$datepayan)->with('dateadam',$dateadam);
                else
                {
                    alert()->warning('در این بخش شما میتوانید فقط یک شخص را انتخاب کنید', 'خطا');
                    return  redirect()->back();
                }


            }
            else
            {
                redirect('/karmand/dashboard');
            }


         }

        public function     addpadashandjarime(Request $r)
        {
            $this->validate(\request(),[
                'selectpersenel' => 'required',
                'tdate'=>'required',
                'typerow' => 'required',
                'mablagh' => 'required',
                'des' => 'required'

            ]);

            $tsplit = explode("/", $r->tdate);
            $moon=$tsplit[0]."/".$tsplit[1]."/"."1";

            $namp=DB::table('persenel')->where('sh_persenel',$r->selectpersenel)->first();

            DB::insert('insert into tpaja (shp, namep, mablagh, typerow,date_sabt, des) values(?,?,?,?,?,?)', [$r->selectpersenel,$namp->nam .' ' . $namp->family,$r->mablagh, $r->typerow, $r->tdate,$r->des]);
            if($r->typerow=="padash")
            DB::table('hozoor')->where('id_persenel',$r->selectpersenel)->where('mdate',$moon)->increment('padash_mazaya',$r->mablagh);
            else
            DB::table('hozoor')->where('id_persenel',$r->selectpersenel)->where('mdate',$moon)->increment('jarime', $r->mablagh);

            alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
            return redirect('/karmand/PagePadash');




        }

        public function deletepaja(Request $r)
             {
                 $tsplit = explode("/", $r->tdate);
                 $moon=$tsplit[0]."/".$tsplit[1]."/"."1";
                 DB::table('tpaja')->where('id',$r->id)->delete();
                 if($r->typerow=="padash")
                     DB::table('hozoor')->where('id_persenel',$r->shp)->where('mdate',$moon)->decrement('padash_mazaya',$r->mablagh);
                 else
                     DB::table('hozoor')->where('id_persenel',$r->shp)->where('mdate',$moon)->decrement('jarime', $r->mablagh);

                 alert()->success('عملیات موفق', 'حذف با موفقیت انجام شد');
                 return redirect('/karmand/PagePadash');
             }

        public function getjespersenel($id)
        {

            $listsofpersenel = DB::table("persenel")
                ->select("sh_persenel", DB::raw("CONCAT(nam, ' ', family) as name"))
                ->where("id_gharardad", $id)
                ->pluck("name", "sh_persenel");

            return json_encode($listsofpersenel);

        }
}
