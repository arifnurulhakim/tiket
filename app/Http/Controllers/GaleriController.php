<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class GaleriController extends Controller
{
    public function index()
    {
        try {
            $galeri = Galeri::all();

            return view('galeri.index', [
                'galeri' => $galeri,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data galeri.']);
        }
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        try {
        $rules = [
            'nama_foto' => 'required|string',
            'foto_galeri' => 'image|file|max:2048',
            'deskripsi' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        }else{
            $galeri = new Galeri();
            $galeri->nama_foto = $request->input('nama_foto');
            $galeri->deskripsi = $request->input('deskripsi');
            if ($request->hasFile('foto_galeri')) {
                $file = $request->file('foto_galeri');

                // Menggunakan package intervention/image untuk memproses foto_galeri
                $image = Image::make($file);

                // Mengompres foto_galeri dengan kualitas 70%
                $image->encode('jpg', 70);

                // Mengambil data base64 dari foto_galeri yang sudah dikompres
                $image_data = base64_encode($image->stream());

                // Jika ukuran file lebih dari 1 MB, return error
                if (strlen($image_data) > 1048576) {
                    return redirect()->back()->withErrors(['foto_galeri' => 'Ukuran file harus kurang dari 1 MB']);
                }

                $galeri->foto_galeri = $image_data;
            }

            $galeri->save();
            return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan.');
        }
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan galeri. Silakan coba lagi nanti.']);
        }
    }

    public function show(Galeri $galeri)
    {
        $Galeri = Galeri::findOrFail($galeri->id);
        return response()->json($Galeri);
    }

    public function edit(Galeri $galeri)
    {
        return view('galeri.edit', [
            'galeri' => $galeri,
        ]);
    }

    public function update(Request $request, Galeri $galeri)
    {
        try {
            $rules = [
                'nama_foto' => 'nullable|string',
                'foto_galeri' => 'image|file|max:2048',
                'deskripsi' => 'nullable|string',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withInput($request->all)
                    ->withErrors($validator);
            }else{
                $Galeri = Galeri::find($galeri->id);
                $Galeri->nama_foto = $request->input('nama_foto');
                $Galeri->deskripsi = $request->input('deskripsi');
                if ($request->hasFile('foto_galeri')) {
                    $file = $request->file('foto_galeri');
    
                    // Menggunakan package intervention/image untuk memproses foto_galeri
                    $image = Image::make($file);
    
                    // Mengompres foto_galeri dengan kualitas 70%
                    $image->encode('jpg', 70);
    
                    // Mengambil data base64 dari foto_galeri yang sudah dikompres
                    $image_data = base64_encode($image->stream());
    
                    // Jika ukuran file lebih dari 1 MB, return error
                    if (strlen($image_data) > 1048576) {
                        return redirect()->back()->withErrors(['foto_galeri' => 'Ukuran file harus kurang dari 1 MB']);
                    }
    
                    $Galeri->foto_galeri = $image_data;
                }
    
                $Galeri->save();
                return redirect()->route('galeri.index')
                ->with('success', 'Galeri berhasil diperbaharui.');
            }
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'Gagal memperbaharui galeri. Silakan coba lagi nanti.']);
            }
    }

    public function destroy(Request $request, $id)
    {
        try {
        $galeri = Galeri::find($id);
        if ($galeri) $galeri->delete();
        return redirect()->route('galeri.index')
            ->with('success_message', 'Berhasil menghapus galeri');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus galeri. Silakan coba lagi nanti.']);
        }
    }
}
