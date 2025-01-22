<?php

namespace App\Exports;

use App\Models\StockTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LapTransExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Mengambil data untuk diekspor.
     */
    public function collection()
    {
        return StockTransaction::with('product.category')->get();
    }

    /**
     * Menambahkan header pada file export.
     */
    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Produk',
            'Kategori',
            'Tipe Transaksi',
            'Kuantitas',
            'Harga',
            'Status',
            'Catatan'
        ];
    }

    public function map($transaction): array {
        return [
            $transaction->updated_at->format('d M Y, H:i'),
            $transaction->product->name ?? 'N/A',
            $transaction->product->category->name ?? 'N/A',
            $transaction->type,
            $transaction->quantity,
            $transaction->total_price,
            $transaction->status,
            $transaction->notes ?? '-',
        ];
    }
}
