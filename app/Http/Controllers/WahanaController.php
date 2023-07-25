<?php

namespace App\Http\Controllers;

use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class WahanaController extends Controller
{
    public function index()
    {
        try {
            $wahana = Wahana::all();

            return view('wahana.index', [
                'wahana' => $wahana,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data wahana.']);
        }
    }

    public function create()
    {
        return view('wahana.create');
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'nama_wahana' => 'required|string',
                'foto_wahana' => 'image|file|max:2048',
                'deskripsi' => 'nullable|string',
                'harga_weekday' => 'nullable|numeric',
                'harga_weekend' => 'nullable|numeric',
            ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        }else{
            $wahana = new Wahana();
            $wahana->nama_wahana = $request->input('nama_wahana');
            $wahana->deskripsi = $request->input('deskripsi');
            $wahana->harga_weekday = $request->input('harga_weekday');
            $wahana->harga_weekend = $request->input('harga_weekend');
            if ($request->hasFile('foto_wahana')) {
                $file = $request->file('foto_wahana');

                // Menggunakan package intervention/image untuk memproses foto_wahana
                $image = Image::make($file);

                // Mengompres foto_wahana dengan kualitas 70%
                $image->encode('jpg', 70);

                // Mengambil data base64 dari foto_wahana yang sudah dikompres
                $image_data = base64_encode($image->stream());

                // Jika ukuran file lebih dari 1 MB, return error
                if (strlen($image_data) > 1048576) {
                    return redirect()->back()->withErrors(['foto_wahana' => 'Ukuran file harus kurang dari 1 MB']);
                }

                $wahana->foto_wahana = $image_data;
            }

            $wahana->save();
            return redirect()->route('wahana.index')
            ->with('success', 'Wahana berhasil ditambahkan.');
        }
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan wahana. Silakan coba lagi nanti.']);
        }
    }
    public function show(Wahana $wahana)
    {
        $wahana = DB::table('wahanas')
        ->select('wahanas.id', 'wahanas.nama_wahana', 'wahanas.deskripsi', 'wahanas.harga_weekday', 'wahanas.harga_weekend', 'wahanas.foto_wahana', DB::raw('ROUND(AVG(ratings.rating), 2) as rata_rating'), DB::raw('COUNT(ratings.rating) as total_rating'))
        ->leftJoin('ratings', 'wahanas.id', '=', 'ratings.wahana_id')
        ->where('wahanas.id', $wahana->id)
        ->groupBy('wahanas.id', 'wahanas.nama_wahana', 'wahanas.deskripsi', 'wahanas.harga_weekday', 'wahanas.harga_weekend', 'wahanas.foto_wahana')
        ->first();
    
        return response()->json($wahana);
    }

    public function edit(Wahana $wahana)
    {
        return view('wahana.edit', [
            'wahana' => $wahana,
        ]);
    }

    public function update(Request $request, Wahana $wahana)
    {
        try {
            $rules = [
                'nama_wahana' => 'required|string',
                'foto_wahana' => 'image|file|max:2048',
                'deskripsi' => 'nullable|string',
                'harga_weekday' => 'nullable|numeric',
                'harga_weekend' => 'nullable|numeric',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withInput($request->all)
                    ->withErrors($validator);
            }else{
                $Wahana = Wahana::find($wahana->id);
                $Wahana->nama_wahana = $request->input('nama_wahana');
                $Wahana->deskripsi = $request->input('deskripsi');
                $wahana->harga_weekday = $request->input('harga_weekday');
                $wahana->harga_weekend = $request->input('harga_weekend');
                if ($request->hasFile('foto_wahana')) {
                    $file = $request->file('foto_wahana');
    
                    // Menggunakan package intervention/image untuk memproses foto_wahana
                    $image = Image::make($file);
    
                    // Mengompres foto_wahana dengan kualitas 70%
                    $image->encode('jpg', 70);
    
                    // Mengambil data base64 dari foto_wahana yang sudah dikompres
                    $image_data = base64_encode($image->stream());
    
                    // Jika ukuran file lebih dari 1 MB, return error
                    if (strlen($image_data) > 1048576) {
                        return redirect()->back()->withErrors(['foto_wahana' => 'Ukuran file harus kurang dari 1 MB']);
                    }
    
                    $Wahana->foto_wahana = $image_data;
                }
    
                $Wahana->save();
                return redirect()->route('wahana.index')
                ->with('success', 'Wahana berhasil diperbaharui.');
            }
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'Gagal memperbaharui wahana. Silakan coba lagi nanti.']);
            }
    }

    public function destroy(Request $request, $id)
    {
        try {
        $wahana = Wahana::find($id);
        if ($wahana) $wahana->delete();
        return redirect()->route('wahana.index')
            ->with('success_message', 'Berhasil menghapus wahana');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus wahana. Silakan coba lagi nanti.']);
        }
    }
}
