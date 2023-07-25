<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class RatingController extends Controller
{
    public function index()
    {
        try {

            $wahana = Wahana::all();
            $rating = Rating::all();
            return view('rating.index', compact('wahana', 'rating'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data rating.']);
        }
    }

    public function create()
    {
        return view('rating.create');
    }

    public function store(Request $request)
    {
        try {
        $rules = [
            'rating' => 'required|string',
            'wahana_id' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        }else{
            $rating = new Rating();
            $rating->rating = $request->input('rating');
            $rating->wahana_id = $request->input('wahana_id');
            $rating->save();
            return redirect()->route('rating.index')
            ->with('success', 'Rating berhasil ditambahkan.');
        }
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan rating. Silakan coba lagi nanti.']);
        }
    }

    public function show(Rating $rating)
    {
        $Rating = Rating::findOrFail($rating->id);
        return response()->json($Rating);
    }

    public function edit(Rating $rating)
    {
        return view('rating.edit', [
            'rating' => $rating,
        ]);
    }

    public function update(Request $request, Rating $rating)
    {
        try {
            $rules = [
                'nama_foto' => 'nullable|string',
                'foto_rating' => 'image|file|max:2048',
                'deskripsi' => 'nullable|string',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withInput($request->all)
                    ->withErrors($validator);
            }else{
                $Rating = Rating::find($rating->id);
                $Rating->nama_foto = $request->input('nama_foto');
                $Rating->deskripsi = $request->input('deskripsi');
                if ($request->hasFile('foto_rating')) {
                    $file = $request->file('foto_rating');
    
                    // Menggunakan package intervention/image untuk memproses foto_rating
                    $image = Image::make($file);
    
                    // Mengompres foto_rating dengan kualitas 70%
                    $image->encode('jpg', 70);
    
                    // Mengambil data base64 dari foto_rating yang sudah dikompres
                    $image_data = base64_encode($image->stream());
    
                    // Jika ukuran file lebih dari 1 MB, return error
                    if (strlen($image_data) > 1048576) {
                        return redirect()->back()->withErrors(['foto_rating' => 'Ukuran file harus kurang dari 1 MB']);
                    }
    
                    $Rating->foto_rating = $image_data;
                }
    
                $Rating->save();
                return redirect()->route('rating.index')
                ->with('success', 'Rating berhasil diperbaharui.');
            }
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'Gagal memperbaharui rating. Silakan coba lagi nanti.']);
            }
    }

    public function destroy(Request $request, $id)
    {
        try {
        $rating = Rating::find($id);
        if ($rating) $rating->delete();
        return redirect()->route('rating.index')
            ->with('success_message', 'Berhasil menghapus rating');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus rating. Silakan coba lagi nanti.']);
        }
    }
}
