<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wahana;
use App\Models\Kupon;
use App\Models\Pemesanan;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManagerStatic as ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class PemesananController extends Controller
{
    public function index(){
        $pemesanan = Pemesanan::leftJoin('kupons', 'pemesanans.kupon_id', '=', 'kupons.id')
        ->select('pemesanans.*','kupons.nama_kupon as nama_kupon')
        ->get();
      
        return view('pemesanan.index', [
            'pemesanan' => $pemesanan
        ]);
    }
    public function form()
    {
        $kupon = Kupon::leftJoin('wahanas', 'kupons.wahana_id', '=', 'wahanas.id')
        ->get();// Mengambil semua data dari model Wahana
        return view('pemesanan.form', compact('kupon'));
    }

    public function tiket(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required|string',
            'nomor_tlpn' => 'required|string',
            'kupon_id' => 'required',
            'quantity' => 'required|integer|min:1', // Assuming quantity should be an integer and at least 1
            // Add other validation rules for additional fields if needed
        ]);
    
        $tanggal = $request->tanggal;
        $hari_ini = Carbon::parse($tanggal)->dayOfWeek; // Get the day of the week (0: Sunday, 1: Monday, etc.)
    
        // Set the price based on the day of the week
        $harga = ($hari_ini == Carbon::SATURDAY || $hari_ini == Carbon::SUNDAY) ? 20000 : 10000;
    
        $nama = $request->nama;
        $kupon_id = $request->kupon_id;
        $nama_kupon = Kupon::where('id', $kupon_id)->value('nama_kupon'); // Use "value" to directly get the column value
        $nomor_tlpn = $request->nomor_tlpn;
        $quantity = $request->quantity;
        $total = $harga * $quantity;
    
        return view('pemesanan.bayar', [
            'tanggal' => $tanggal,
            'nama' => $nama,
            'kupon_id' => $kupon_id,
            'nama_kupon' => $nama_kupon,
            'nomor_tlpn' => $nomor_tlpn,
            'quantity' => $quantity,
            'total' => $total,
        ])->with('success', 'Tiket berhasil dipesan.');
    }
    public function store(Request $request)
    {
        
    
        $tanggal = $request->tanggal;
        $nama = $request->nama;
        $kupon_id = $request->kupon_id;
        $getnama_kupon = Kupon::select('nama_kupon')->where('id',$kupon_id)->first();
        $nama_kupon = $getnama_kupon->nama_kupon;
        $nomor_tlpn = $request->nomor_tlpn;
        $quantity = $request->quantity;
        $image_data = null;
        $kode_pemesanan = Str::upper(Str::random(5));
    
        // Check if a file is uploaded
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
    
            // Process the uploaded image
            $image = Image::make($file);
            $image->encode('jpg', 70);
            $image_data = base64_encode($image->stream());
    
            // Check the size of the image
            if (strlen($image_data) > 1048576) { // 1 MB in bytes
                return redirect()->back()->withErrors(['bukti_pembayaran' => 'Ukuran file harus kurang dari 1 MB']);
            }
        }
    
        // Store the data in the database
        DB::table('pemesanans')->insert([
            'tanggal_kunjungan' => $tanggal,
            'nama' => $nama,
            'nomor_tlpn' => $nomor_tlpn,
            'kupon_id' => $kupon_id,
            'quantity' => $quantity,
            'kode_pemesanan' => $kode_pemesanan,
            'bukti_pembayaran' => $image_data,
            // Add other fields if you have more data to store
        ]);
      
                
        $kode_pemesanan_data = Pemesanan::leftJoin('kupons', 'pemesanans.kupon_id', '=', 'kupons.id')
        ->where('pemesanans.kode_pemesanan', $kode_pemesanan)
        ->select('pemesanans.*', 'kupons.*') // Select the desired columns from both tables
        ->get();
        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('pemesanan.cetak', compact('kode_pemesanan_data'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $pdfContent = $pdf->output();
      
        // Set the response as PDF content type
                $response = response($pdfContent, 200, [
                    'Content-Type' => 'application/pdf',
                ]);

                // Add JavaScript to embed the PDF on a new page
                $response->header('Content-Disposition', 'inline; filename="tiket-' . $kode_pemesanan . '.pdf"');
                $response->header('Content-Transfer-Encoding', 'binary');
                $response->header('Accept-Ranges', 'bytes');
                $response->header('Cache-Control', 'public');
                $response->header('Pragma', 'public');
                $response->header('Expires', '0');

                return $response;
                return redirect()->route('index')->with('success', 'Tiket berhasil dipesan! Silakan cek Download untuk detail tiketnya.');
                    
    }
    public function show(Pemesanan $pemesanan)
    {
        $Pemesanan = Pemesanan::leftJoin('kupons', 'pemesanans.kupon_id', '=', 'kupons.id')
        ->select('pemesanans.*','kupons.nama_kupon as nama_kupon')
        ->where('pemesanans.id',$pemesanan->id)
        ->first();
      
        return response()->json($Pemesanan);
    }


    public function destroy(Request $request, $id)
    {
        try {
        $pemesanan = Pemesanan::find($id);
        if ($pemesanan) $pemesanan->delete();
        return redirect()->route('pemesanan.index')
            ->with('success_message', 'Berhasil menghapus pemesanan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus pemesanan. Silakan coba lagi nanti.']);
        }
    }
    

}
