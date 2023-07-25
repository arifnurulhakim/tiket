<?php

namespace App\Http\Controllers;
use App\Models\Aspirasi;
use App\Models\kategori;
use App\Models\Galeri;
use App\Models\Fasilitas;
use App\Models\Rating;
use App\Models\Wahana;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::all();
        $fasilitas = Fasilitas::all();
        $wahana = DB::table('wahanas')
            ->select('wahanas.id', 'wahanas.nama_wahana', 'wahanas.deskripsi', 'wahanas.harga_weekday', 'wahanas.harga_weekend', 'wahanas.foto_wahana', DB::raw('ROUND(AVG(ratings.rating), 2) AS avg_rating'), DB::raw('COUNT(ratings.rating) AS total_ratings'))
            ->leftJoin('ratings', 'wahanas.id', '=', 'ratings.wahana_id')
            ->groupBy('wahanas.id', 'wahanas.nama_wahana', 'wahanas.deskripsi', 'wahanas.harga_weekday', 'wahanas.harga_weekend', 'wahanas.foto_wahana')
            ->get();
        $pemesanan = Pemesanan::all();
    
        return view('index', compact('galeri', 'fasilitas', 'wahana', 'pemesanan'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aspirasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'nim' => 'required',
            'aspirasi' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'gambar',
        ];
    
       
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else{
            $aspirasi = new Aspirasi();
            $aspirasi -> nim = $request->input('nim');
            $aspirasi -> aspirasi = $request->input('aspirasi');
            $aspirasi -> kategori = $request->input('kategori');
            

            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('','gambar');
                $gambar_aspirasi = ImageManager::make('storage/gambar/'.$path);
                $gambar_aspirasi->fit(1200, 500);
                $gambar_aspirasi->save(storage_path().'/app/public/gambar/'.$path);

                $aspirasi->gambar = $path;
            }

            $aspirasi->save();
            return redirect()->route('index')
            ->with('success_message', 'Berhasil menambah aspirasi baru');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aspirasi = Aspirasi::find($id);
        if (!$aspirasi) return redirect()->route('aspirasi.index')
            ->with('error_message', 'aspirasi tidak ditemukan');
        return view('users.edit', [
            'user' => $aspirasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'aspirasi' => 'required',
        ]);
        $aspirasi = Aspirasi::find($id);
        $aspirasi->nim = $request->nim;
        $aspirasi->aspirasi = $request->aspirasi;
        $aspirasi->save();
        return redirect()->route('aspirasi.index')
            ->with('success_message', 'Berhasil mengubah aspirasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $aspirasi = Aspirasi::find($id);
        if ($aspirasi) $aspirasi->delete();
        return redirect()->route('aspirasi.index')
            ->with('success_message', 'Berhasil menghapus aspirasi');
    }
}
