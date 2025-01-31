@extends('layouts.dashboard')
@section('page-title', 'Dashboard')
@section('content')
<div class="px-4 pt-6">
    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-xl font-normal text-gray-700 dark:text-gray-400">Jumlah Produk</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $jumlahProduk }}</span>
            </div>
            <div class="w-full flex justify-end">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="50" height="50" class="fill-gray-900 dark:fill-white">
                    <path d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64l0 48-128 0 0-48zm-48 48l-64 0c-26.5 0-48 21.5-48 48L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-208c0-26.5-21.5-48-48-48l-64 0 0-48C336 50.1 285.9 0 224 0S112 50.1 112 112l0 48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/>
                </svg>
            </div>
        </div>

        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-xl font-normal text-gray-700 dark:text-gray-400">Jumlah Produk Masuk</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $jumlahMasuk }}</span>
                <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">Dari minggu lalu</p>
            </div>
            <div class="w-full flex justify-end">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="50" height="50" class="fill-gray-900 dark:fill-white">
                    <path d="M256 0a256 256 0 1 0 0 512A256 256 0 1 0 256 0zM244.7 395.3l-112-112c-4.6-4.6-5.9-11.5-3.5-17.4s8.3-9.9 14.8-9.9l64 0 0-96c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32l0 96 64 0c6.5 0 12.3 3.9 14.8 9.9s1.1 12.9-3.5 17.4l-112 112c-6.2 6.2-16.4 6.2-22.6 0z"/>
                </svg>
            </div>
        </div>

        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-xl font-normal text-gray-700 dark:text-gray-400">Jumlah Produk Keluar</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $jumlahKeluar }}</span>
                <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">Dari minggu lalu</p>
            </div>
            <div class="w-full flex justify-end">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="50" height="50" class="fill-gray-900 dark:fill-white">
                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm11.3-395.3l112 112c4.6 4.6 5.9 11.5 3.5 17.4s-8.3 9.9-14.8 9.9l-64 0 0 96c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-96-64 0c-6.5 0-12.3-3.9-14.8-9.9s-1.1-12.9 3.5-17.4l112-112c6.2-6.2 16.4-6.2 22.6 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 my-4 xl:grid-cols-3 xl:gap-4 space gap-y-4">
        <div class="xl:col-span-1 p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-8 dark:bg-gray-800">
            <div class="flex items-center justify-between pb-6 border-gray-200 dark:border-gray-700">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Grafik Stok Barang</h3>
            </div>
        
            @if ($grafikStok->isEmpty())
                <p class="text-center text-gray-500 dark:text-gray-400">~Tidak ada data stok barang~</p>
            @else
                @php
                    $totalQuantity = $grafikStok->sum(function ($product) {
                        return max(0, $product->quantity - $product->minimum_stock);
                    });
                    $cumulativePercentage = 0;
        
                    function generateSoftColor($index) {
                        $hue = ($index * 137) % 360;
                        return "hsl($hue, 100%, 65%)";
                    }
                @endphp
        
                <div class="flex justify-center">
                    <svg viewBox="0 0 32 32" class="w-64 h-64">
                        @foreach ($grafikStok as $index => $product)
                            @php
                                $adjustedQuantity = max(0, $product->quantity - $product->minimum_stock);
                                $percentage = ($adjustedQuantity / $totalQuantity) * 100;
                                $startAngle = $cumulativePercentage * 3.6;
                                $endAngle = ($cumulativePercentage + $percentage) * 3.6;
                                $largeArcFlag = $percentage > 50 ? 1 : 0;
        
                                $x1 = 16 + 15 * cos(deg2rad($startAngle));
                                $y1 = 16 + 15 * sin(deg2rad($startAngle));
                                $x2 = 16 + 15 * cos(deg2rad($endAngle));
                                $y2 = 16 + 15 * sin(deg2rad($endAngle));
        
                                $cumulativePercentage += $percentage;
        
                                $color = generateSoftColor($index);
                                $infoText = "{$product->name} - Kuantitas: {$adjustedQuantity} - " . number_format($percentage, 2) . "%";
                            @endphp
        
                            <path d="M16 16 L {{ $x1 }} {{ $y1 }} A 15 15 0 {{ $largeArcFlag }} 1 {{ $x2 }} {{ $y2 }} Z" fill="{{ $color }}" stroke="#ffffff" stroke-width="0.1">
                                <title>{{ $infoText }}</title>
                            </path>
                        @endforeach
                        <circle cx="16" cy="16" r="8" fill="#ffffff" />
                    </svg>
                </div>
        
                <div class="mt-8">
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($grafikStok as $index => $product)
                            @php
                                $adjustedQuantity = max(0, $product->quantity - $product->minimum_stock);
                                $percentage = ($adjustedQuantity / $totalQuantity) * 100;
                                $color = generateSoftColor($index);
                            @endphp
                            <div class="flex items-center space-x-4">
                                <span class="block w-6 h-6 rounded-full" style="background-color: {{ $color }};"></span>
                                <div>
                                    <p class="text-base font-semibold text-gray-900 dark:text-gray-100">{{ $product->name }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Kuantitas: {{ $adjustedQuantity }}
                                        <span class="text-xs text-green-500">{{ number_format($percentage, 2) }}%</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>        
  
        <div class="xl:col-span-2 p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 flex flex-col">
            <div class="items-center justify-between lg:flex">
                <div class="mb-4 lg:mb-0">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Aktivitas User Hari Ini</h3>
                </div>
            </div>
    
            <div class="flex flex-col mt-4 flex-grow">
                <div class="overflow-x-auto rounded-lg flex-grow">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Nama</th>
                                        <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Waktu</th>
                                        <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Jam</th>
                                        <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Aktivitas</th>
                                        <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach($aktivitasUser as $usav)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $usav->user->name }}</td>
                                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ \Carbon\Carbon::parse($usav->updated_at)->locale('id')->translatedFormat('d F Y') }}</td>
                                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ \Carbon\Carbon::parse($usav->updated_at)->timezone('Asia/Jakarta')->format('H:i') }}</td>
                                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">
                                                @if($usav->action == 'Login')
                                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">
                                                        Login
                                                    </span>
                                                @elseif($usav->action == 'Logout')
                                                    <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 border border-red-100 dark:border-red-500">
                                                        Logout
                                                    </span>
                                                @elseif($usav->action == 'Menambah')
                                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">
                                                        Menambah
                                                    </span>
                                                @elseif($usav->action == 'Mengupdate')
                                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-yellow-400 border border-yellow-100 dark:border-yellow-500">
                                                        Mengupdate
                                                    </span>
                                                @elseif($usav->action == 'Menghapus')
                                                    <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 border border-red-100 dark:border-red-500">
                                                        Menghapus
                                                    </span>
                                                @elseif($usav->action == 'Konfirmasi')
                                                    <span class="bg-teal-100 text-teal-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-teal-400 border border-teal-100 dark:border-teal-500">
                                                        Konfirmasi
                                                    </span>
                                                @elseif($usav->action == 'Membuat')
                                                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-indigo-400 border border-indigo-100 dark:border-indigo-500">
                                                        Membuat
                                                    </span>
                                                @elseif($usav->action == 'Export')
                                                    <span class="bg-gray-200 text-gray-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-800 dark:text-gray-200 border border-gray-200 dark:border-gray-600">
                                                        Export
                                                    </span>
                                                @elseif($usav->action == 'Import')
                                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 border border-blue-100 dark:border-blue-500">
                                                        Import
                                                    </span>
                                                @else
                                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-gray-400 border border-gray-100 dark:border-gray-500">
                                                        {{ $usav->action }}
                                                    </span>
                                                @endif
                                            </td>                                            
                                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $usav->activity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection