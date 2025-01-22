<?php

namespace App\Exports;

use App\Models\UserActivity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LapActivityExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Mengambil data untuk diekspor.
     */
    public function collection()
    {
        return UserActivity::get();
    }

    /**
     * Menambahkan header pada file export.
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Tanggal',
            'Jam',
            'Aktivitas',
            'Keterangan',
        ];
    }

    public function map($logactivity): array {
        return [
            $logactivity->id,
            $logactivity->user->name ?? 'N/A',
            $logactivity->created_at->format('d M Y'),
            $logactivity->created_at->format('H:i'),
            $logactivity->action,
            $logactivity->activity,
        ];
    }
}
