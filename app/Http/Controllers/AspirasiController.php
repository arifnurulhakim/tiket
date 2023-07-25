<?php

namespace App\Http\Controllers;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class AspirasiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspirasi = Aspirasi::all();
        return view('aspirasi.index', [
            'aspirasi' => $aspirasi
        ]);
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
        $rules = [
            'nim' => 'required|numeric',
            'nama' => 'required',
            'aspirasi' => 'required',
            'kategori' => 'required',
            'status' => 'in:pending,accept,dismiss',
            'image' => 'image|file|max:2048',
        ];
    
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {
            $aspirasi = new Aspirasi();
            $aspirasi->nim = $request->input('nim');
            $aspirasi->nama = $request->input('nama');
            $aspirasi->aspirasi = $request->input('aspirasi');
            $aspirasi->kategori = $request->input('kategori');
            $aspirasi->status = $request->input('status');
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
    
                // Menggunakan package intervention/image untuk memproses gambar
                $image = Image::make($file);
    
                // Mengompres gambar dengan kualitas 70%
                $image->encode('jpg', 70);
    
                // Mengambil data base64 dari gambar yang sudah dikompres
                $image_data = base64_encode($image->stream());
    
                // Jika ukuran file lebih dari 1 MB, return error
                if (strlen($image_data) > 1048576) {
                    return redirect()->back()->withErrors(['image' => 'Ukuran file harus kurang dari 1 MB']);
                }
    
                $aspirasi->image = $image_data;
            }
    
            $aspirasi->save();
    
            return redirect()->route('index')
                ->with('success', 'Aspirasi anda telah kami rekam');
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aspirasi $aspirasi)
    {
        return response()->json($aspirasi);
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
        $resource = Aspirasi::findOrFail($id);
        $resource->status = $request->input('status');
        $resource->save();
    
        return redirect()->route('aspirasi.index')->with('success', 'Berhasil mengubah status pengajuan aspirasi');

    // $aspirasi = Aspirasi::find($id);
    // $rules=[
    //     'nim' => 'required',
    //     'aspirasi' => 'required',
    //     'kategori' => 'required|in:akademi,minat bakat, fasilitas, ormawa, dll',
    //     'status' => 'in:pending,accept,dismiss',
    // ];
    
    // if (!empty($request->input('image'))) {
    //     $rules['image'] = 'mimes:jpeg,jpg,png,JPG,JPEG,PNG';
    // }
   
    // $validator = Validator::make($request->all(),$rules);
    // if ($validator->fails()){
    //     return redirect()->back()
    //         ->withInput($request->all)
    //         ->withErrors($validator)
    //         ->with('aspirasi', $aspirasi);
    // } else{
        

        
    //     // $aspirasi = Aspirasi::find($id);
    //     // $aspirasi -> nim = $request->input('nim');
    //     // $aspirasi -> aspirasi = $request->input('aspirasi');
    //     // $aspirasi -> kategori = $request->input('kategori');
    //     // $aspirasi -> status = $request->input('status');

    //     // // if ($request->hasFile('image')) {
    //     // //     $path = $request->file('image')->store('','image');
    //     // //     $image_aspirasi = ImageManager::make('storage/image/'.$path);
    //     // //     $image_aspirasi->fit(1200, 500);
    //     // //     $image_aspirasi->save(storage_path().'/app/public/image/'.$path);
    //     // //     $user->image = $path;
    //     // // }

    //     // $aspirasi->save();
    //     // return redirect()->route('index')
    //     // ->with('success_message', 'Berhasil mengubah status pengajuan aspirasi');
    // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspirasi $aspirasi)
    {
        // $aspirasi->delete();

        // if ($aspirasi->image) {
        //     Storage::delete($aspirasi->image);
        // }
        
        if($aspirasi->image){
            Storage::delete($aspirasi->image);
        }
        if ($aspirasi->delete()){
            return redirect()->route('aspirasi.index')
            ->with('success_message', 'Berhasil menghapus aspirasi');
        }
            
    }
}
