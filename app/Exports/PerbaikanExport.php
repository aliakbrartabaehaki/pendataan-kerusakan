<?php

namespace App\Exports;

use App\Perbaikan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PerbaikanExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    public function collection()
    {
        // Ambil data perbaikan dengan barang terkait
        return Perbaikan::with('barang')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Deskripsi Barang',
            'Nama Pelapor',
            'Tanggal Melapor',
            'Status'
        ];
    }

    public function map($perbaikan): array
    {
        return [
            $perbaikan->id,
            $perbaikan->barang ? $perbaikan->barang->nama_barang : 'Barang tidak ditemukan',
            $perbaikan->barang ? $perbaikan->barang->deskripsi : 'Deskripsi tidak ditemukan',
            $perbaikan->barang ? $perbaikan->barang->nama : 'Pelapor tidak ditemukan',
            $perbaikan->tanggal_perbaikan,
            $perbaikan->keterangan == 'sudah di perbaiki' ? 'Sudah di Perbaiki' : 
                ($perbaikan->keterangan == 'sedang di perbaiki' ? 'Sedang di Perbaiki' : 'Belum Diperbaiki')
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                $sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                        'color' => ['argb' => 'FFFFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FF4CAF50'],
                    ],
                ]);

                foreach (range('A', 'F') as $columnID) {
                    $sheet->getColumnDimension($columnID)->setAutoSize(true);
                }

                $sheet->getStyle('A1:' . $highestColumn . $highestRow)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ]);
            }
        ];
    }
}
