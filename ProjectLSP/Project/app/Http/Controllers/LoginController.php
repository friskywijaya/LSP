<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
           $user= Auth::user()->id;
        //    $User = $user->first();
            $user = User::where('id',$user)->first();
            // $mahasiswa = $Mahasiswa->first();
          //  dd($mahasiswa->status);
                    // Cek apakah akun telah diverifikasi
                    if ($user->statusAkun=='diterima') {
                        $request->session()->regenerate();
                        return redirect('/dashboard');
                    } else {
                        // Logout jika pengguna tidak diterima dan kirim pesan error
                        Auth::logout();
                        return back()->with('loginError', 'Akun Anda belum terverifikasi');
                    }
                } else {
                    // Jika kredensial salah
                    return back()->with('loginError', 'Username atau password salah');
                }

        if (Auth::Attempt($data)) {
            return redirect('home');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }
 

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
    }
