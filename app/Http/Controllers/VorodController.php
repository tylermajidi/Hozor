<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VorodController extends Controller
{
    //
    public function login()
    {
      if(session('try')==null)  session(['try' => 0]);

      if(session('username') != null && session('userlevel')=='admin') return redirect('/admin/dashboard');
        if(session('username') != null && session('userlevel')=='sarparast') return redirect('/sarparast/dashboard');
        if(session('username') != null && session('userlevel')=='karmand') return redirect('/karmand/dashboard');

        $nameshercat=DB::table('compony')->latest('id')->first();
        session(['nameshercat' => $nameshercat->namecompony]);
        return view('login');



    }

    public function logout()
    {
        session(['usernum' => ""]);
        session(['username' => ""]);
        session(['userlevel' => ""]);
        session(['id_gharardad' => ""]);

        //  session(['compony_name' => ""]);
        $listcompony = DB::table('compony')->get();
        return view('login', compact('listcompony'));
    }
    public function PageResetPassword()
    {
        return view('ResetPassword');
    }
    public function login_check(Request $request)
    {
        if (session('try') <10)
        {


                $this->validate(\request(),[
                    'username' => 'required',
                    'password'=>'required',

                        ]);
        }
        else
        {
            $this->validate(\request(),[
                'username' => 'required',
                'password'=>'required',
                'captcha' => 'required|captcha',
            ]);
        }
        if(  $user=DB::table('users')->where('username', $request->username )->where('password',$request->password)->first())
        {
            session(['usernum' => $user->name]);
            session(['username' => $user->username]);
            session(['userlevel' => $user->level]);
            session(['id_gharardad' => $user->id_gharardad]);
           // session(['compony_name' => $request->compony_name]);
            $mydate=session('thisdate');
            $mysplite =explode('/',$mydate);
            $mydate=$mysplite[0] . '/'. ($mysplite[1]*1) . '/'.($mysplite[2]*1);
            session(['thisdate' => $mydate]);

            session(['try' => 0]);
            $nameshercat=DB::table('compony')->latest('id')->first();
            session(['nameshercat' => $nameshercat->namecompony]);

            if($user->level=="admin")  return redirect("/admin/dashboard");
            if($user->level=="sarparast")  return redirect("/sarparast/dashboard");
            if($user->level=="karmand")  return redirect("/karmand/dashboard");
        }else
        {

            session(['try' => session('try')+1]);
            return  redirect('/');
        }

    }
    public function ResetPassword(Request $r)
    {
        $this->validate(\request(),[
            'username' => 'required',
            'password'=>'required',
            'newpassword'=>'required',
            'captcha' => 'required|captcha',
        ]);
        if(DB::table('users')->where('username', $r->username )->exists() && $r->username != session("username"))
        {

            session(['msg' => 'خطا اطلاعات کاربری صحیح نیست']);
            session(['msg_state' => 'warning']);
            return redirect('/PageResetPassword');

        }else {
            if (DB::update('update users set password = ?  where username = ? and password =? ', [$r->newpassword, $r->username,$r->password]))
                        {
                                session(['msg' => 'ویرایش با موفقیت انجام شد']);
                                session(['msg_state' => 'Success']);
                            return redirect('/logout');
                        }
                        else
                        {
                            session(['msg' => 'خطا اطلاعات کاربری صحیح نیست']);
                            session(['msg_state' => 'warning']);
                            return redirect('/PageResetPassword');
                        }



             }



    }



}
