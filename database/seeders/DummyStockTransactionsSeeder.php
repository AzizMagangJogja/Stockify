<?php

namespace Database\Seeders;

use App\Models\StockTransaction;
use Illuminate\Database\Seeder;

class DummyStockTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stockTransactionData=[
            [
                'product_id'=>'1',
                'user_id'=>'3',
                'type'=>'Masuk',
                'quantity'=>'10',
                'date'=>'2024-11-01',
                'status'=>'Pending',
                'notes'=>'Barang sedang dicek oleh staff.'
            ], [
                'product_id'=>'2',
                'user_id'=>'2',
                'type'=>'Keluar',
                'quantity'=>'20',
                'date'=>'2024-11-02',
                'status'=>'Pending',
                'notes'=>'Sedang menunggu konfirmasi pengiriman oleh staff.'
            ], [
                'product_id'=>'3',
                'user_id'=>'3',
                'type'=>'Masuk',
                'quantity'=>'100',
                'date'=>'2024-11-03',
                'status'=>'Pending',
                'notes'=>'Sedang menunggu konfirmasi pengecekan oleh staff.'
            ], [
                'product_id'=>'4',
                'user_id'=>'2',
                'type'=>'Keluar',
                'quantity'=>'10',
                'date'=>'2024-11-04',
                'status'=>'Pending',
                'notes'=>'Barang sedang disiapkan oleh staff untuk dikirim ke cabang Jakarta.'
            ], [
                'product_id'=>'5',
                'user_id'=>'3',
                'type'=>'Masuk',
                'quantity'=>'30',
                'date'=>'2024-11-05',
                'status'=>'Pending',
                'notes'=>'Barang sedang dicek oleh staff.'
            ], [
                'product_id'=>'6',
                'user_id'=>'2',
                'type'=>'Keluar',
                'quantity'=>'15',
                'date'=>'2024-11-06',
                'status'=>'Pending',
                'notes'=>'Pembeli hilang kontak.'
            ], [
                'product_id'=>'7',
                'user_id'=>'3',
                'type'=>'Masuk',
                'quantity'=>'200',
                'date'=>'2024-11-07',
                'status'=>'Pending',
                'notes'=>'Barang sedang dicek oleh staff dengan pesanan dalam jumlah besar diterima.'
            ], [
                'product_id'=>'8',
                'user_id'=>'2',
                'type'=>'Keluar',
                'quantity'=>'20',
                'date'=>'2024-11-08',
                'status'=>'Pending',
                'notes'=>'Sedang dalam proses persiapan oleh staff.'
            ], [
                'product_id'=>'9',
                'user_id'=>'3',
                'type'=>'Masuk',
                'quantity'=>'60',
                'date'=>'2024-11-09',
                'status'=>'Pending',
                'notes'=>'Pengadaan barang baru.'
            ], [
                'product_id'=>'10',
                'user_id'=>'2',
                'type'=>'Keluar',
                'quantity'=>'12',
                'date'=>'2024-11-10',
                'status'=>'Pending',
                'notes'=>'Barang diproses untuk pengiriman.'
            ]
        ];

        foreach($stockTransactionData as $key => $val) {
            StockTransaction::create($val);
        }
    }
}
