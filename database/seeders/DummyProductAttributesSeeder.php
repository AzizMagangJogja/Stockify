<?php

namespace Database\Seeders;

use App\Models\ProductAttributes;
use Illuminate\Database\Seeder;

class DummyProductAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productAttributesData=[
            [
                'id'=>'1',
                'product_id'=>'1',
                'name'=>'Warna',
                'value'=>'Hitam'
            ], [
                'id'=>'2',
                'product_id'=>'1',
                'name'=>'Berat',
                'value'=>'1,5 Kilogram'
            ], [
                'id'=>'3',
                'product_id'=>'2',
                'name'=>'Ukuran',
                'value'=>'L'
            ], [
                'id'=>'4',
                'product_id'=>'2',
                'name'=>'Warna',
                'value'=>'Putih'
            ], [
                'id'=>'5',
                'product_id'=>'3',
                'name'=>'Berat',
                'value'=>'250 Gram'
            ], [
                'id'=>'6',
                'product_id'=>'3',
                'name'=>'Rasa',
                'value'=>'Kentang Asin'
            ], [
                'id'=>'7',
                'product_id'=>'4',
                'name'=>'Kapasitas',
                'value'=>'2 Liter'
            ], [
                'id'=>'8',
                'product_id'=>'4',
                'name'=>'Warna',
                'value'=>'Putih'
            ], [
                'id'=>'9',
                'product_id'=>'5',
                'name'=>'Jenis',
                'value'=>'Krim Pelembab'
            ], [
                'id'=>'10',
                'product_id'=>'5',
                'name'=>'Isi',
                'value'=>'50ml'
            ]
        ];

        foreach($productAttributesData as $key => $val) {
            ProductAttributes::create($val);
        }
    }
}
