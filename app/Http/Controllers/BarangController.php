<?php

namespace App\Http\Controllers;

use App\Barang;
use App\kategori;
use App\Perbaikan;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'Admin') {
            $kategori = Kategori::all();
            $barang = Barang::all(); // Tambahkan ini untuk mendefinisikan variabel $barang
            return view('barang.index', compact('barang', 'kategori'));
        }
    
        return redirect()->route('admin.indexx');
    }
    
    
    public function indexx(Request $request)
    {
        // Khhusus admin
        if (auth()->user()->role === 'Admin') {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            
           
            $barang = Barang::query();
    
            if ($startDate && $endDate) {
                $barang = $barang->whereBetween('tanggal_kerusakan', [$startDate, $endDate]);
            }
    
            $barang = $barang->get();
            $kategori = Kategori::all();
    
            return view('barang.indexx', compact('barang', 'kategori'));
        }
    
        return redirect()->route('karyawan.dashboard');
    }
    

    public function export_excel()
    {
        return Excel::download(new BarangExport, 'data_barang_kerusakan.xlsx');
    }

    public function create()
    {
        $kategori = kategori::all();
        $tanggal_kerusakan = now()->format('Y-m-d'); // Mengambil tanggal hari ini
        $status = 'rusak'; // Status otomatis
    
        return view('barang.create', compact('kategori', 'tanggal_kerusakan', 'status'));
    }
    

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required|integer',
            'nama' => 'required',
            'lokasi' => 'required',
            'tanggal_kerusakan' => 'required|date', // Tetap validasi, tapi pastikan input tidak bisa diubah
            'status' => 'nullable|in:rusak',
        ]);
        
        try {
            $barang = new Barang();
            $barang->nama_barang = $request->nama_barang;
            $barang->deskripsi = $request->deskripsi;
            $barang->kategori_id = $request->kategori_id;
            $barang->nama = $request->nama;
            $barang->lokasi = $request->lokasi;
            $barang->tanggal_kerusakan = $request->tanggal_kerusakan; // Menggunakan input dari form
            $barang->status = 'rusak'; // Menetapkan status otomatis
            $barang->save();
    
            // Simpan data perbaikan dengan referensi barang yang baru dibuat
            Perbaikan::create([
                'barang_id' => $barang->barang_id,
                'catatan' => 'Laporan kerusakan baru',
                'tanggal_perbaikan' => $barang->tanggal_kerusakan,
                'keterangan' => $barang->status,
            ]);
            
            return redirect()->route('barang.index')->with('success', 'Barang berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }
    



    public function edit($id)
    {
        $kategori = kategori::all();
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required|integer',
            'nama' => 'required',
            'lokasi' => 'required|in:Gedung Ir.Juanda - datin,Gedung Ir.Juanda - strahan,Gedung Ir.Juanda - sumdahan,Gedung Ir.Juanda - alpahan,Gedung Ir.Juanda - ruang_rpt_L5,Gedung Prof,IrSoepomo,Mr,Sh - TU,Gedung Prof,IrSoepomo,Mr,Sh - Kabadan,Gedung Prof,IrSoepomo,Mr,Sh - Proglab',
            'tanggal_kerusakan' => 'required|date',
            'status' => 'nullable|in:rusak',
        ]);

        try {
            $barang = Barang::findOrFail($id);
            $barang->update($request->all());

            return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->delete();
            return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}


