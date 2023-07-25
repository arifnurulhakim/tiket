<?php

namespace App\Http\Controllers;

use App\Models\Kupon;
use App\Models\Wahana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Intervention\Image\ImageManagerStatic as ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class KuponController extends Controller
{
    public function index()
    {
        try {
            $kupon = Kupon::select('kupons.*', 'wahanas.nama_wahana as nama_wahana')
            ->join('wahanas', 'kupons.wahana_id', '=', 'wahanas.id')
            ->get();
        return view('kupon.index', [
            'kupon' => $kupon,
        ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data kupon.']);
        }
    }

    public function create()
    {
        try {
            $wahana = Wahana::all();
            return view('kupon.create', [
                'wahana' => $wahana,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal mengambil data.']);
        }
    }

    public function store(Request $request)
    {
        try {
        $rules = [
            'nama_kupon' => 'required|string',
            'wahana_id' => 'required|string',
            'deskripsi' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        }else{
            $kupon = new Kupon();
            $kupon->nama_kupon = $request->input('nama_kupon');
            $kupon->deskripsi = $request->input('deskripsi');
            $kupon->wahana_id = $request->input('wahana_id');

            $kupon->save();
            return redirect()->route('kupon.index')
            ->with('success', 'Kupon berhasil ditambahkan.');
        }
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan kupon. Silakan coba lagi nanti.']);
        }
    }

    public function show(Kupon $kupon)
    {
        $Kupon = Kupon::findOrFail($kupon->id);
        return response()->json($Kupon);
    }

    public function edit(Kupon $kupon)
    {
        return view('kupon.edit', [
            'kupon' => $kupon,
        ]);
    }

    public function update(Request $request, Kupon $kupon)
    {
        try {
            $rules = [
                'nama_kupon' => 'required|string',
                'wahana_id' => 'required|string',
                'deskripsi' => 'nullable|string',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withInput($request->all)
                    ->withErrors($validator);
            }else{
                $Kupon = Kupon::find($kupon->id);
                $kupon->nama_kupon = $request->input('nama_kupon');
                $kupon->deskripsi = $request->input('deskripsi');
                $kupon->wahana_id = $request->input('wahana_id');

                $Kupon->save();
                return redirect()->route('kupon.index')
                ->with('success', 'Kupon berhasil diperbaharui.');
            }
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'Gagal memperbaharui kupon. Silakan coba lagi nanti.']);
            }
    }

    public function destroy(Request $request, $id)
    {
        try {
        $kupon = Kupon::find($id);
        if ($kupon) $kupon->delete();
        return redirect()->route('kupon.index')
            ->with('success_message', 'Berhasil menghapus kupon');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus kupon. Silakan coba lagi nanti.']);
        }
    }
}
