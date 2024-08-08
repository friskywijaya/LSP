<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = Mahasiswa::where('id_user', auth()->id())->first();
        return view('Profile',compact(['mahasiswa']));
    }
    // public function index2(){
    //     $mahasiswa = Mahasiswa::all();
    //     return view('Akun',compact(['mahasiswa']));
    // }
    public function index3(){
        $mahasiswa = Mahasiswa::all();
        return view('Datamhs',compact(['mahasiswa']));
    }
    public function index4(){
        $mahasiswa = Mahasiswa::where('statusMahasiswa', 'diproses')->get();
        return view('Pengajuan',compact(['mahasiswa']));
    }

    public function updateStatus(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        
        // Validate request
        $validatedData = $request->validate([
            'status' => 'required|string',
        ]);

        $mahasiswa->statusMahasiswa = $validatedData['status'];
        $mahasiswa->save();

        return redirect()->back()->with('success', 'Status mahasiswa berhasil diubah.');
    }

    public function create() {
        return view('Daftar');
    }

    public function create2() {
        return view('BuatAkun');
    }
    // public function storemhs(Request $request){
    //     Mahasiswa::create($request->except(['_token']));

    //     $user = new User();
    //     $user->name = $_POST['nama'];
    //     $user->email =  $_POST['email'];;
    //     $user->password =  Hash::make($_POST['password']);  
    //     $user->role = 'Mahasiswa';
    //     $user->save();

    //     $mhs = new Mahasiswa();
    //     $mhs->nama = $_POST['nama'];
    //     $mhs->jeniskel = $_POST['jeniskel'];
    //     $mhs->tempatlahir = $_POST['tempatlahir'];
    //     $mhs->tanggallahir = $_POST['tanggallahir'];
    //     $mhs->alamat = $_POST['alamat'];
    //     $mhs->foto_profile = $_POST['foto_profile'];
    //     $mhs->id_user = auth()->id();
    //     $mhs->status = 'diproses';
    //     $mhs->save();

    //     return redirect('/');
    // }

    public function storeakun(Request $request){
        $user = new User();
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));  
        $user->role = 'Mahasiswa';
        $user->statusAkun = 'diproses';
        $user->save();

        return redirect('/');
    }
 
    public function storemhs(Request $request){
            // Membuat user baru
            // Membuat mahasiswa baru
            $mhs = new Mahasiswa();
            $mhs->id_user = Auth::user()->id;
            $mhs->nama = $request->input('nama');
            $mhs->jeniskel = $request->input('jeniskel');
            $mhs->tempatlahir = $request->input('tempatlahir');
            $mhs->tanggallahir = $request->input('tanggallahir');
            $mhs->alamat = $request->input('alamat');
           
            $mhs->statusMahasiswa = 'diproses';
            $mhs->noktp = $request->input('noktp');
            $mhs->prodi = $request->input('prodi');

            $mhs->save();
        
            return redirect('/');
        }
        
    
    public function index2() {
        $user = User::all();
        
        return view('akun', compact (['user']));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi dan perbarui status
        $request->validate([
            'statusAkun' => 'required|in:diproses,diterima,ditolak',
        ]);

        $user->statusAkun = $request->input('statusAkun');
        $user->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    public function show($id){
        // Cari mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);
        // Kirim data mahasiswa ke view
        return view('akun', compact(['mahasiswa']));
    }
    
}
