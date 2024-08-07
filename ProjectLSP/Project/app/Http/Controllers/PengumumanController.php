<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PengumumanController extends Controller
{
    public function index(){
        $pengumuman = Pengumuman::all();
        return view('Dashboard', compact('pengumuman'));
    }

    public function create() {
        return view('Pengumuman');
    }

    public function storepengumuman(Request $request){
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan pengumuman
        $pengumuman = new Pengumuman();
        $pengumuman->judul = $request->input('judul');
        $pengumuman->isi = $request->input('isi');

        // Jika ada file thumbnail yang diunggah
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('thumbnails', $filename, 'public'); // Simpan file ke storage/app/public/thumbnails

            // $image = Image::make($file);
            // $image->resize(500, 500, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // })->save(storage_path('app/public/' . $filePath));

            // Log path penyimpanan file
            Log::info('Thumbnail disimpan di: ' . $filePath);

            $pengumuman->thumbnail = $filePath;
        }

        $pengumuman->save();
        return redirect('/dashboard')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        // Temukan pengumuman berdasarkan ID
        $pengumuman = Pengumuman::findOrFail($id);

        // Hapus file gambar jika ada
        if ($pengumuman->thumbnail) {
            Storage::disk('public')->delete($pengumuman->thumbnail); // Hapus gambar dari storage
        }

        // Hapus pengumuman dari database
        $pengumuman->delete();

        // Redirect atau return response
        return redirect('/')->with('success', 'Pengumuman berhasil dihapus!');
    }

    public function edit($id){
        $pengumuman = Pengumuman::find($id); //dpt kondisi where
        return view('edit', compact('pengumuman'));
    }

    public function update($id, Request $request){
        // Temukan pengumuman berdasarkan ID
        $pengumuman = Pengumuman::findOrFail($id);
    
        // Validasi data input
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string|max:150',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk file gambar
        ]);
    
        // Update data lainnya
        $pengumuman->judul = $request->input('judul');
        $pengumuman->isi = $request->input('isi');
    
        // Jika ada file thumbnail yang diunggah
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($pengumuman->thumbnail) {
                Storage::delete($pengumuman->thumbnail); // Hapus gambar lama dari storage
            }
    
            // Simpan gambar baru
            $file = $request->file('thumbnail');
            $filename = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('thumbnails', $filename, 'public'); // Simpan file ke storage/app/public/thumbnails
    
            // Log path penyimpanan file
            Log::info('Thumbnail disimpan di: ' . $filePath);
    
            $pengumuman->thumbnail = $filePath;
        }
    
        // Simpan perubahan ke database
        $pengumuman->save();
    
        // Redirect atau return response
        return redirect('/')->with('success', 'Pengumuman berhasil diperbarui!');
    }
}
