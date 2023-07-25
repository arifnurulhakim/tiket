<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class FasilitasController extends Controller
{
    public function index()
    {
        try {
            $fasilitas = Fasilitas::all();

            return view('fasilitas.index', [
                'fasilitas' => $fasilitas,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data fasilitas.']);
        }
    }

    public function create()
    {
        return view('fasilitas.create');
    }

    public function store(Request $request)
    {
        try {
        $rules = [
            'nama_fasilitas' => 'required|string',
            'foto_fasilitas' => 'image|file|max:2048',
            'deskripsi' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        }else{
            $fasilitas = new Fasilitas();
            $fasilitas->nama_fasilitas = $request->input('nama_fasilitas');
            $fasilitas->deskripsi = $request->input('deskripsi');
            if ($request->hasFile('foto_fasilitas')) {
                $file = $request->file('foto_fasilitas');

                // Menggunakan package intervention/image untuk memproses foto_fasilitas
                $image = Image::make($file);

                // Mengompres foto_fasilitas dengan kualitas 70%
                $image->encode('jpg', 70);

                // Mengambil data base64 dari foto_fasilitas yang sudah dikompres
                $image_data = base64_encode($image->stream());

                // Jika ukuran file lebih dari 1 MB, return error
                if (strlen($image_data) > 1048576) {
                    return redirect()->back()->withErrors(['foto_fasilitas' => 'Ukuran file harus kurang dari 1 MB']);
                }

                $fasilitas->foto_fasilitas = $image_data;
            }

            $fasilitas->save();
            return redirect()->route('fasilitas.index')
            ->with('success', 'Fasilitas berhasil ditambahkan.');
        }
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan fasilitas. Silakan coba lagi nanti.']);
        }
    }

    public function show(Fasilitas $fasilitas)
    {
        $Fasilitas = Fasilitas::findOrFail($fasilitas->id);
        return response()->json($Fasilitas);
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('fasilitas.edit', [
            'fasilitas' => $fasilitas,
        ]);
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        try {
            $rules = [
                'nama_fasilitas' => 'nullable|string',
                'foto_fasilitas' => 'image|file|max:2048',
                'deskripsi' => 'nullable|string',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withInput($request->all)
                    ->withErrors($validator);
            }else{
                $Fasilitas = Fasilitas::find($fasilitas->id);
                $Fasilitas->nama_fasilitas = $request->input('nama_fasilitas');
                $Fasilitas->deskripsi = $request->input('deskripsi');
                if ($request->hasFile('foto_fasilitas')) {
                    $file = $request->file('foto_fasilitas');
    
                    // Menggunakan package intervention/image untuk memproses foto_fasilitas
                    $image = Image::make($file);
    
                    // Mengompres foto_fasilitas dengan kualitas 70%
                    $image->encode('jpg', 70);
    
                    // Mengambil data base64 dari foto_fasilitas yang sudah dikompres
                    $image_data = base64_encode($image->stream());
    
                    // Jika ukuran file lebih dari 1 MB, return error
                    if (strlen($image_data) > 1048576) {
                        return redirect()->back()->withErrors(['foto_fasilitas' => 'Ukuran file harus kurang dari 1 MB']);
                    }
    
                    $Fasilitas->foto_fasilitas = $image_data;
                }
    
                $Fasilitas->save();
                return redirect()->route('fasilitas.index')
                ->with('success', 'Fasilitas berhasil diperbaharui.');
            }
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'Gagal memperbaharui fasilitas. Silakan coba lagi nanti.']);
            }
    }

    public function destroy(Request $request, $id)
    {
        try {
        $fasilitas = Fasilitas::find($id);
        if ($fasilitas) $fasilitas->delete();
        return redirect()->route('fasilitas.index')
            ->with('success_message', 'Berhasil menghapus fasilitas');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus fasilitas. Silakan coba lagi nanti.']);
        }
    }
}
