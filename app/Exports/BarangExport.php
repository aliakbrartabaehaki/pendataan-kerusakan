<?php

namespace App\Exports;

use App\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BarangExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    public function collection()
    {
        return Barang::with('kategori')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Deskripsi',
            'Kategori',
            'Nama',
            'Lokasi',
            'Tanggal Kerusakan',
            'Status'
        ];
    }

    public function map($barang): array
    {
        return [
            $barang->id, // Menggunakan id dalam huruf kecil
            $barang->nama_barang,
            $barang->deskripsi,
            $barang->kategori->nama_kategori ?? 'N/A',
            $barang->nama,
            $barang->lokasi,
            $barang->tanggal_kerusakan,
            $barang->status
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                $sheet->getStyle('A1:H1')->applyFromArray([
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

                foreach (range('A', 'H') as $columnID) {
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
