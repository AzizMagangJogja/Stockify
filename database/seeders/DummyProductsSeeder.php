<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class DummyProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productsData=[
            [
                'id'=>'1',
                'category_id'=>'1',
                'supplier_id'=>'1',
                'name'=>'Laptop HP EliteBook',
                'sku'=>'ELT101',
                'description'=>'Laptop merk HP yang bisa digunakan untuk bisnis',
                'purchase_price'=>'12000000',
                'selling_price'=>'15000000',
                'image'=>null,
                'quantity'=>'20',
                'minimum_stock'=>'5'
            ], [
                'id'=>'2',
                'category_id'=>'2',
                'supplier_id'=>'2',
                'name'=>'Kaos Polos',
                'sku'=>'KP123',
                'description'=>'Kaos polos berbahan katun nyaman',
                'purchase_price'=>'40000',
                'selling_price'=>'60000',
                'image'=>null,
                'quantity'=>'50',
                'minimum_stock'=>'20'
            ], [
                'id'=>'3',
                'category_id'=>'3',
                'supplier_id'=>'3',
                'name'=>'Snack Kentang',
                'sku'=>'SK456',
                'description'=>'Keripik kentang renyah',
                'purchase_price'=>'12000',
                'selling_price'=>'20000',
                'image'=>null,
                'quantity'=>'80',
                'minimum_stock'=>'30'
            ], [
                'id'=>'4',
                'category_id'=>'4',
                'supplier_id'=>'4',
                'name'=>'Blender Philips HR2057',
                'sku'=>'BP2057',
                'description'=>'Blender multifungsi merk Philips',
                'purchase_price'=>'300000',
                'selling_price'=>'450000',
                'image'=>null,
                'quantity'=>'20',
                'minimum_stock'=>'5'
            ], [
                'id'=>'5',
                'category_id'=>'5',
                'supplier_id'=>'5',
                'name'=>'Krim Wajah',
                'sku'=>'KW321',
                'description'=>'Krim wajah yang membuat kulit lembut',
                'purchase_price'=>'70000',
                'selling_price'=>'120000',
                'image'=>null,
                'quantity'=>'30',
                'minimum_stock'=>'10'
            ], [
                'id'=>'6',
                'category_id'=>'6',
                'supplier_id'=>'6',
                'name'=>'Buku Tulis',
                'sku'=>'BTS654',
                'description'=>'Buku tulis 100 lembar',
                'purchase_price'=>'10000',
                'selling_price'=>'15000',
                'image'=>null,
                'quantity'=>'100',
                'minimum_stock'=>'20'
            ], [
                'id'=>'7',
                'category_id'=>'7',
                'supplier_id'=>'7',
                'name'=>'Wiper Mobil',
                'sku'=>'WM987',
                'description'=>'Wiper mobil kualitas terbaik',
                'purchase_price'=>'50000',
                'selling_price'=>'80000',
                'image'=>null,
                'quantity'=>'20',
                'minimum_stock'=>'5'
            ], [
                'id'=>'8',
                'category_id'=>'8',
                'supplier_id'=>'8',
                'name'=>'Sepeda Gunung',
                'sku'=>'SG741',
                'description'=>'Sepeda Gunung yang ringan',
                'purchase_price'=>'1500000',
                'selling_price'=>'2000000',
                'image'=>null,
                'quantity'=>'25',
                'minimum_stock'=>'5'
            ], [
                'id'=>'9',
                'category_id'=>'9',
                'supplier_id'=>'9',
                'name'=>'Mainan Robot',
                'sku'=>'MR852',
                'description'=>'Mainan robot interaktif',
                'purchase_price'=>'200000',
                'selling_price'=>'300000',
                'image'=>null,
                'quantity'=>'20',
                'minimum_stock'=>'7'
            ], [
                'id'=>'10',
                'category_id'=>'10',
                'supplier_id'=>'10',
                'name'=>'Set Pisau Dapur',
                'sku'=>'SPD963',
                'description'=>'Set pisau dapur pilihan ibu rumah tangga',
                'purchase_price'=>'150000',
                'selling_price'=>'220000',
                'image'=>null,
                'quantity'=>'30',
                'minimum_stock'=>'10'
            ], [
                'id'=>'11',
                'category_id'=>'1',
                'supplier_id'=>'10',
                'name'=>'Laptop Slim Pro',
                'sku'=>'LSP456',
                'description'=>'Laptop tipis performa tinggi',
                'purchase_price'=>'8500000',
                'selling_price'=>'9000000',
                'image'=>null,
                'quantity'=>'15',
                'minimum_stock'=>'5'
            ], [
                'id'=>'12',
                'category_id'=>'2',
                'supplier_id'=>'9',
                'name'=>'Hoodie Erigo',
                'sku'=>'HE216',
                'description'=>'Hoodie Erigo',
                'purchase_price'=>'120000',
                'selling_price'=>'180000',
                'image'=>null,
                'quantity'=>'20',
                'minimum_stock'=>'5'
            ], [
                'id'=>'13',
                'category_id'=>'3',
                'supplier_id'=>'8',
                'name'=>'Roti Aoka',
                'sku'=>'RA1234',
                'description'=>'Roti merk Aoka enakkkk',
                'purchase_price'=>'1500',
                'selling_price'=>'3000',
                'image'=>null,
                'quantity'=>'80',
                'minimum_stock'=>'20'
            ], [
                'id'=>'14',
                'category_id'=>'4',
                'supplier_id'=>'7',
                'name'=>'Dispenser Sharp',
                'sku'=>'DS321',
                'description'=>'Dispenser merk Sharp',
                'purchase_price'=>'200000',
                'selling_price'=>'260000',
                'image'=>null,
                'quantity'=>'10',
                'minimum_stock'=>'5'
            ], [
                'id'=>'15',
                'category_id'=>'5',
                'supplier_id'=>'6',
                'name'=>'Tolak Angin',
                'sku'=>'TA654',
                'description'=>'Tolak Angin sachetan',
                'purchase_price'=>'8000',
                'selling_price'=>'15000',
                'image'=>null,
                'quantity'=>'50',
                'minimum_stock'=>'15'
            ]
        ];

        foreach($productsData as $key => $val) {
            Products::create($val);
        }
    }
}
