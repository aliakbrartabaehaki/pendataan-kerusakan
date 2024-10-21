<?php

namespace App\Http\Controllers;

use App\Perbaikan;
use Illuminate\Http\Request;
use App\Exports\PerbaikanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PerbaikanController extends Controller
{
    public function index()
    {
        // Hanya menampilkan perbaikan yang belum diperbaiki atau sedang diperbaiki dengan eager loading barang
        $perbaikan = Perbaikan::where('keterangan', '!=', 'sudah di perbaiki')
                              ->with('barang') // Eager load barang
                              ->get();
        return view('perbaikan.index', compact('perbaikan'));
    }
    

 public function indexx()
    {
        $perbaikan = Perbaikan::with('barang')->get();
        return view('perbaikan.indexx', compact('perbaikan'));
    }

    public function index3(Request $request)
    {
        // Ambil input tanggal dari request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        // Query dasar untuk menampilkan perbaikan yang sudah diperbaiki
        $query = Perbaikan::where('keterangan', 'sudah di perbaiki')
                          ->with('barang'); // Eager load barang
    
        // Cek apakah tanggal mulai dan akhir diberikan
        if ($start_date && $end_date) {
            // Filter berdasarkan rentang tanggal
            $query->whereBetween('tanggal_perbaikan', [$start_date, $end_date]);
        }
    
        // Eksekusi query
        $perbaikan = $query->get();
    
        return view('perbaikan.index3', compact('perbaikan'));
    }
    

    public function export_excel()
	{
		return Excel::download(new PerbaikanExport, 'data_perbaikan.xlsx');
	}

    public function inRepair($id)
    {
        // Ubah status menjadi "sedang di perbaiki"
        $perbaikan = Perbaikan::findOrFail($id);
        $perbaikan->keterangan = 'sedang di perbaiki';
        $perbaikan->save();

        return redirect()->route('perbaikan.index')->with('success', 'Status perbaikan diubah menjadi "sedang di perbaiki".');
    }

    public function repaired($perbaikan_id)
    {
        
        $perbaikan = Perbaikan::findOrFail($perbaikan_id);
        $perbaikan->keterangan = 'sudah di perbaiki';
        $perbaikan->save();
    
        return redirect()->route('perbaikan.index')->with('success', 'Status perbaikan diubah menjadi "sudah di perbaiki".');
    }
    
    

    public function destroy($perbaikan_id)
    {
        $perbaikan = Perbaikan::findOrFail($perbaikan_id);
        $perbaikan->delete();
    
        return redirect()->route('perbaikan.index')->with('success', 'Perbaikan berhasil dihapus.');
    }
    
}
