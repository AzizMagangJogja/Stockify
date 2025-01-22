<?php

namespace App\Exports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LapStokExport implements FromCollection, WithHeadings
{
    /**
     * Mengambil data untuk diekspor.
     */
    public function collection()
    {
        return Products::select('image', 'name', 'sku', 'quantity')->get();
    }

    /**
     * Menambahkan header pada file export.
     */
    public function headings(): array
    {
        return [
            'Foto',
            'Nama',
            'SKU',
            'Kuantitas',
        ];
    }
}
