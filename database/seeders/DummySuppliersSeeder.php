<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DummySuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplierData=[
            [
                'id'=>'1',
                'name'=>'PT Jawa Utama',
                'address'=>'Jl. Merdeka No. 10, Jakarta',
                'phone'=>'021-5551234',
                'email'=>'jawa.utama@gmail.com'
            ], [
                'id'=>'2',
                'name'=>'CV Sentosa Abadi',
                'address'=>'Jl. Sudirman No. 5, Bandung, Jawa Barat',
                'phone'=>'022-7335678',
                'email'=>'sentosa.abadi@gmail.com'
            ], [
                'id'=>'3',
                'name'=>'PT Purnama Sejahtera',
                'address'=>'Jl. Diponegoro No. 2, Surabaya, Jawa Timur',
                'phone'=>'031-4449876',
                'email'=>'purnama.sejahtera@gmail.com'
            ], [
                'id'=>'4',
                'name'=>'CV Mitra Jaya',
                'address'=>'Jl. Gajah Mada No. 7, Semarang, Jawa Tengah',
                'phone'=>'024-3322766',
                'email'=>'mitra.jaya@gmail.com'
            ], [
                'id'=>'5',
                'name'=>'PT Mega Persada',
                'address'=>'Jl. Raya Bogor No. 12, Bogor, Jawa Barat',
                'phone'=>'0251-567234',
                'email'=>'mega.persada@gmail.com'
            ], [
                'id'=>'6',
                'name'=>'CV Bintang Terbang',
                'address'=>'Jl. Pahlawan No. 3, Yogyakarta',
                'phone'=>'0274-3332298',
                'email'=>'bintang.terang@gmail.com'
            ], [
                'id'=>'7',
                'name'=>'PT Sahabat Sejati Nusantara',
                'address'=>'Jl. Ahmad Yani No. 20, Malang, Jawa Timur',
                'phone'=>'0341-2398765',
                'email'=>'sahabat.sejati@gmail.com'
            ], [
                'id'=>'8',
                'name'=>'CV Surya Kencara',
                'address'=>'Jl. Pantai Selatan No. 9, Cirebon, Jawa Barat',
                'phone'=>'0231-654897',
                'email'=>'surya.kencana@gmail.com'
            ], [
                'id'=>'9',
                'name'=>'PT Anugerah Makmur Sentosa',
                'address'=>'Jl. Dipati Ukur No. 21, Bandung, Jawa Barat',
                'phone'=>'022-5432167',
                'email'=>'anugerah.makmur@gmail.com'
            ], [
                'id'=>'10',
                'name'=>'CV Berkah Mandiri',
                'address'=>'Jl. Jend. Soedirman No. 8, Jakarta',
                'phone'=>'021-7863542',
                'email'=>'berkah.mandiri@gmail.com'
            ]
        ];

        foreach($supplierData as $key => $val) {
            Supplier::create($val);
        }
    }
}
