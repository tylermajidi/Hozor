<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    //-------------pages
    public function dashboard(){


        $listcheck=DB::table('checkbanki')->where('date_check','<',session('thisdate10ago'))->where('state','new')->get();
        return view('panel_admin.Dashboard',compact('listcheck'));
    }
    public function AddShowGharardad()
    {
        $listgharadad=DB::table('gharardad')->get();
        return view('panel_admin.Gharardad',compact('listgharadad'));
    }
    public function showEditGharardad(Request $r)
    {
        $listgharadad=DB::table('gharardad')->where('id',$r->id)->first();
        return view('panel_admin.EditGharardad',compact('listgharadad'));
    }
    public function ShowSarparastPersenels()
    {
        $ListPersenel=DB::table('persenel')->get();
       // $listsarparast=DB::table('users')->where('level','sarparast')->get();
        $listgharardad=DB::table('gharardad')->where('state','active')->get();
        return view('panel_admin.PersenelToSarparast',compact('ListPersenel'),compact('listgharardad'));
    }
    public function showEditAlert(Request $r)
    {
        $alertitem=DB::table('alerttable')->where('id',$r->id)->first();
        return view('panel_admin.EditAlert',compact('alertitem'));
    }
    public function ShowAlert()
    {
        $listalert=DB::table('alerttable')->where('enddate','>=',session('thisdate'))->get();
        return view('panel_admin.Alert',compact('listalert'));

    }
    public function ShowUsersPage()
    {


        $listgharardad=DB::table('gharardad')->where('state','active')->get();
        $ListUsers=DB::table('users')->get();
        return view('panel_admin.Users',compact('ListUsers'),compact('listgharardad'));

    }



    public function ShowFirstConfig()
    {

        $salitem=DB::table('baseconfig')->latest('id')->first();
        $salitems=DB::table('baseconfig')->orderBy('id','desc')->get();

        return view('panel_admin.FirstConfig',compact('salitem'),compact('salitems'));
    }
    public function SelectFirstConfig(Request $r)
    {


        $salitem=DB::table('baseconfig')->where('sal',$r->selectsal)->first();
        $salitems=DB::table('baseconfig')->orderBy('id','desc')->get();

        return view('panel_admin.FirstConfig',compact('salitem'),compact('salitems'));
    }



    public function ShowEditUsers(Request $r)
    {
        $listgharadad=DB::table('gharardad')->Get();
        $datausers=DB::table('users')->where('username',$r->username)->first();
        return view('panel_admin.EditUsers',compact('datausers'),compact('listgharadad'));
    }
    //-------------------db

    public function AddGharardad(Request $r)
    {
        $this->validate(\request(),[
            'namegharardad' => 'required',
            'numberkargah'=>'required',
            'radifpeman' => 'required',
            'karfamaname' => 'required',
            'addressname' =>'required',
            'date_start' => 'required',
            'date_end' => 'required',

        ]);

        if(DB::table('gharardad')->where('numberkargah', $r->numberkargah )->exists())
        {

            alert()->warning('عملیات ناموفق', 'کد کارگاه صحیح تکراریست خطا در ذخیره اطلاعات ورودی صحیح نیست');
            $r->flash();
            return redirect('/admin/PageAddShowGharardad');

        }else
        {
            DB::insert('insert into gharardad (namegharardad, numberkargah, radifpeman, karfamaname, addressname, date_start, state,date_end) values(?,?,?,?,?,?,?,?)', [$r->namegharardad, $r->numberkargah, $r->radifpeman, $r->karfamaname, $r->addressname, $r->date_start, 'active',$r->date_end]);

            alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
            return redirect('/admin/PageAddShowGharardad');
        }
    }
    public function EditGharardad(Request $r)
    {

        $this->validate(\request(),[
            'namegharardad' => 'required',
            'numberkargah'=>'required',
            'radifpeman' => 'required',
            'karfamaname' => 'required',
            'addressname' =>'required',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);

        if(DB::table('gharardad')->where('numberkargah', $r->numberkargah )->exists() && $r->numberkargah2 != $r->numberkargah)
        {

            alert()->error('عملیات ناموفق', 'خطا در ویرایش اطلاعات ، کد کارگاه صحیح نیست');
            return redirect('/admin/PageAddShowGharardad');

        }else
        {

            DB::update('update gharardad set namegharardad = ? ,numberkargah = ?, radifpeman = ?, karfamaname = ?,addressname = ?, date_start = ?,date_end=? where id = ?', [$r->namegharardad, $r->numberkargah, $r->radifpeman, $r->karfamaname, $r->addressname, $r->date_start,$r->date_end, $r->id]);

            alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
            return redirect('/admin/PageAddShowGharardad');
        }
    }

    public function SetSarparast(Request $r)
    {

        $this->validate(\request(),[
            'gharardadid' => 'required',


        ]);

        $data = json_decode($r->jsa, true);



            foreach ($data as $d)
            {
                /*if($d !=null && $r->shiftkar=="sobh") {
                    DB::update('update persenel set s_id = ?  where sh_persenel = ?', [ $r->sarparastid, $d]);
                }elseif ($d !=null && $r->shiftkar=="asr")
                {
                    DB::update('update persenel set s_id2 = ?  where sh_persenel = ?', [ $r->sarparastid, $d]);

                }elseif ($d !=null && $r->shiftkar=="shab")
                {
                    DB::update('update persenel set s_id3 = ?  where sh_persenel = ?', [ $r->sarparastid, $d]);

                }*/
                if($d !=null) {
                    $gharardad=DB::table('gharardad')->where('id',$r->gharardadid)->first();
                  //  $gharardad=DB::select('select namegharardad from gharardad where id=? ',[$r->gharardadid])->first();
                    DB::update('update persenel set id_gharardad = ?,namegharardad=?  where sh_persenel = ?', [$r->gharardadid,$gharardad->namegharardad, $d]);
                }
            }


            alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
            return redirect('/admin/PageShowSarparastPersenels');



    }

    public function AddAlert(Request $r)
    {
        $this->validate(\request(),[
            'message' => 'required',
            'state'=>'required',
            'enddate' => 'required',

        ]);


        if( DB::insert('insert into alerttable (message, state, enddate) values(?,?,?)', [$r->message, $r->state,$r->enddate]))
           {

               alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
               return redirect('/admin/PageAlert');
           }else
           {

               alert()->error('عملیات ناموفق', 'خطا در ذخیره اطلاعات ورودی صحیح نیست');

               $r->flash();
               return redirect('/admin/PageAlert');
           }

    }
    public function EditAlert(Request $r)
    {
        $this->validate(\request(),[
            'message' => 'required',
            'state'=>'required',
            'enddate' => 'required'

        ]);
      if(DB::update('update alerttable set state = ? ,enddate = ?, message = ? where id = ?', [$r->state, $r->enddate, $r->message, $r->id]))
      {

          alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
        return redirect('/admin/PageAlert');
      }else
      {
          alert()->error('عملیات ناموفق', 'خطا در ویرایش ، اطلاعات ورودی صحیح نیست');
          return redirect('/admin/PageAlert');
      }





    }
    public function DeleteAlert(Request $r)
    {
        if(DB::table('alerttable')->where('id', $r->id)->delete())
        {
            alert()->success('عملیات موفق', 'حذف با موفقیت انجام شد');
            return redirect('/admin/PageAlert');
        }else
        {

            alert()->error('عملیات ناموفق', 'خطا در حذف اطلاعات');
            return redirect('/admin/PageAlert');
        }


    }

    public function AddUser(Request $r)
    {
        $this->validate(\request(),[
            'username' => 'required',
            'password'=>'required',
            'name' => 'required'
        ]);


        $gharardad=DB::table('gharardad')->where('id',$r->gharardadid)->first();

        if(DB::table('users')->where('username',$r->username)->doesntExist())
        {
            DB::insert('insert into users (username, password, name,level,id_gharardad,namegharardad) values(?,?,?,?,?,?)', [$r->username, $r->password,$r->name,$r->level,$r->gharardadid,$gharardad->namegharardad]);

            alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
            return redirect('/admin/PageUsers');
        }else
        {

            alert()->error('عملیات ناموفق', '/ نام کاربری تکراری میباشد - خطا در ذخیره اطلاعات ورودی صحیح نیست ');
            $r->flash();
            return redirect('/admin/PageUsers');
        }

    }
    public function DeleteUser(Request $r)

    {
        if(DB::table('users')->where('username', $r->username)->delete())
        {

            alert()->success('عملیات موفق', 'حذف با موفقیت انجام شد');
            return redirect('/admin/PageUsers');
        }else
        {

            alert()->error('عملیات ناموفق', 'خطا در حذف اطلاعات');
            return redirect('/admin/PageUsers');
        }

    }
    public function EditUser(Request $r)
    {
        $this->validate(\request(),[
            'username' => 'required',
            'password'=>'required',
            'name' => 'required'
        ]);
        $ghname="";
        $ghid="";

            if($r->gharardadid!="0") {
                $gharardad = DB::table('gharardad')->where('id', $r->gharardadid)->first();
                $ghname = $gharardad->namegharardad;
                $ghid=$gharardad->id;
            }
            else
            {
                $ghname="";
                $ghid=0;
            }

            if(DB::update('update users set username = ? ,password = ?, name = ?, level = ?,id_gharardad = ?, namegharardad = ? where username = ?', [$r->username, $r->password, $r->name, $r->level, $ghid, $ghname , $r->username]))
            {

                alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
                return redirect('/admin/PageUsers');
            }else
            {

                alert()->error('عملیات ناموفق', 'خطا در ویرایش اطلاعات ');
                return redirect('/admin/PageUsers');
            }

    }



    public function ShowAddFirstConfig()
    {

      return  view('panel_admin.AddFirstConfig');
    }
    public function SaveFirstConfig(Request $r)
    {

        if(DB::update('update baseconfig set hoghogh_paye_rozane = ? ,hagh_maskan = ?, hagh_kharobar = ?, hagh_olad = ?,paye_sanavat_rozane = ?, sanavat_rozane = ? ,eydi_rozane=?,darsad_maleyat=?,modat_morakhasi_sal=?,tedad_roz_hafte=?,tedad_roz_sal=?,darsad_bime=?,maleyat_flag=?,ezafekar_shercat=?,ezafekar_erjaei=?,hagh_shift=?,bon=?,hagh_shift2=? where sal = ?', [$r->hoghogh_paye_rozane, $r->hagh_maskan, $r->hagh_kharobar, $r->hagh_olad, $r->paye_sanavat_rozane, $r->sanavat_rozane , $r->eydi_rozane,$r->darsad_maleyat,$r->modat_morakhasi_sal,$r->tedad_roz_hafte,$r->tedad_roz_sal,$r->darsad_bime,$r->maleyat_flag,$r->ezafekar_shercat,$r->ezafekar_erjaei,$r->hagh_shift,$r->bon,$r->hagh_shift2,$r->sal]))
        {
            alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');

            return  redirect('/admin/PageFirstConfig');
        }else
        {

            alert()->error('عملیات ناموفق', 'خطا در ویرایش اطلاعات / ورودی صحیح نیست / مقادیر تکراری وارد شده');
            return  redirect('/admin/PageFirstConfig');

        }
    }
    public function AddFirstConfig(Request $r)
    {

        if(DB::table('baseconfig')->where('sal',$r->sal)->doesntExist())
        {
            DB::insert('insert into baseconfig (sal,hoghogh_paye_rozane ,hagh_maskan, hagh_kharobar, hagh_olad ,paye_sanavat_rozane , sanavat_rozane  ,eydi_rozane,darsad_maleyat,modat_morakhasi_sal,tedad_roz_hafte,tedad_roz_sal,darsad_bime,maleyat_flag,ezafekar_shercat,ezafekar_erjaei,hagh_shift,bon,hagh_shift2 )values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$r->sal,$r->hoghogh_paye_rozane, $r->hagh_maskan, $r->hagh_kharobar, $r->hagh_olad, $r->paye_sanavat_rozane, $r->sanavat_rozane , $r->eydi_rozane,$r->darsad_maleyat,$r->modat_morakhasi_sal,$r->tedad_roz_hafte,$r->tedad_roz_sal,$r->darsad_bime,$r->maleyat_flag,$r->ezafekar_shercat,$r->ezafekar_erjaei,$r->hagh_shift,$r->bon,$r->hagh_shift2]);


            alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');

            return redirect('/admin/PageFirstConfig');

        }else
        {

            alert()->error('عملیات ناموفق', 'سال کاری تکراری میباشد.');
            $r->flash();

            return redirect('/admin/PageAddFirstConfig');
        }
    }


    public function     PassCheck(Request $r)
    {

        DB::update('update checkbanki set state = ? where sh_check = ?', ['passed', $r->sh_check]);

        alert()->success('عملیات موفق', 'ذخیره با موفقیت انجام شد');
        return redirect('/admin/dashboard');
    }


}
