<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class DummyCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesData=[
            [
                'id'=>'1',
                'name'=>'Elektronik',
                'description'=>'Produk-produk elektronik dan gadget'
            ], [
                'id'=>'2',
                'name'=>'Pakaian',
                'description'=>'Beragam jenis pakaian pria dan wanita'
            ], [
                'id'=>'3',
                'name'=>'Makanan dan Minuman',
                'description'=>'Produk makanan kemasan ringan dan minuman berbentuk botol atau galon'
            ], [
                'id'=>'4',
                'name'=>'Peralatan Rumah Tangga',
                'description'=>'Produk-produk kebutuhan rumah tangga'
            ],  [
                'id'=>'5',
                'name'=>'Kesehatan dan Kecantikan',
                'description'=>'Produk kesehatan dan kecantikan seperti skincare'
            ],  [
                'id'=>'6',
                'name'=>'Buku dan Alat Tulis',
                'description'=>'Kebutuhan alat tulis untuk keperluan kantor'
            ], [
                'id'=>'7',
                'name'=>'Otomotif',
                'description'=>'Suku cadang dan aksesori kendaraan'
            ], [
                'id'=>'8',
                'name'=>'Olahraga dan Outdoor',
                'description'=>'Perlengkapan olahraga dan kegiatan luar ruangan'
            ], [
                'id'=>'9',
                'name'=>'Mainan dan Hobi',
                'description'=>'Mainan anak-anak dan perlengakpan untuk penghobi'
            ], [
                'id'=>'10',
                'name'=>'Peralatan Dapur',
                'description'=>'Peralatan yang digunakan di dapur'
            ]
        ];

        foreach($categoriesData as $key => $val) {
            Categories::create($val);
        }
    }
}
