@extends('layouts.dashboard')
@section('page-title', 'Dashboard')
@section('content')

<div class="px-4 pt-6">
    <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="flex items-center mb-5 text-lg font-semibold text-gray-900 dark:text-white">Informasi Stok Barang</h3>
            <div class="flex flex-col">
                <div class="overflow-x-auto rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Foto</th>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Nama Produk</th>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">SKU</th>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Kuantitas</th>
                                        <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">
                                    @if ($stokMenipis->isEmpty())
                                        <tr>
                                            <td colspan="10" class="p-4 text-base font-normal text-gray-500 dark:text-white text-center align-middle">
                                                ~Tidak ada data stok menipis~
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($stokMenipis as $tipis)
                                        <tr>
                                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-white text-center align-middle">
                                                @if ($tipis->image)
                                                    <img src="{{ asset('storage/' . $tipis->image) }}" alt="{{ $tipis->name }}" class="w-16 h-16 object-cover rounded-lg mx-auto">
                                                @else
                                                    <span class="text-gray-500 truncate" style="max-width: 150px;" title="{{ $tipis->image }}">{{ $tipis->image ?? 'Tidak Ada Foto' }}</span>
                                                @endif
                                            </td>
                                            <td class="p-4 text-sm font-normal text-gray-600 whitespace-nowrap dark:text-gray-400 text-center align-middle">{{ $tipis->name }}</td>
                                            <td class="p-4 text-sm font-normal text-gray-600 whitespace-nowrap dark:text-white text-center align-middle">{{ $tipis->sku }}</td>
                                            <td class="p-4 text-sm font-normal text-gray-600 whitespace-nowrap dark:text-gray-400 text-center align-middle">{{ $tipis->quantity - $tipis->minimum_stock }}</td>
                                            <td class="p-4 text-sm font-normal text-gray-600 whitespace-nowrap dark:text-gray-400 text-center align-middle">
                                                <div>
                                                    @if($tipis->quantity - $tipis->minimum_stock == 0)
                                                        <span class="text-red-600 font-bold">Stok habis, segera Restock!</span><br>
                                                        <span class="text-red-500 font-semibold">Stok Minimum: {{ $tipis->minimum_stock }}</span>
                                                    @elseif($tipis->quantity - $tipis->minimum_stock < $tipis->minimum_stock)
                                                        <span class="text-red-600 font-bold">Stok akan habis, segera Restock!</span><br>
                                                        <span class="text-red-500 font-semibold">Stok Minimum: {{ $tipis->minimum_stock }}</span>
                                                    @else
                                                        <span>Stok Menipis!</span><br>
                                                        <span class="text-red-500 font-semibold">Stok Minimum: {{ $tipis->minimum_stock }}</span>
                                                    @endif
                                                </div>
                                            </td>                                                                          
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">Transaksi Hari Ini</h3>
            <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                <li class="w-full">
                    <button id="barang-masuk-tab" data-tabs-target="#barang-masuk" type="button" role="tab" aria-controls="barang-masuk" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Barang Masuk</button>
                </li>
                <li class="w-full">
                    <button id="barang-keluar-tab" data-tabs-target="#barang-keluar" type="button" role="tab" aria-controls="barang-keluar" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Barang Keluar</button>
                </li>
            </ul>
            <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                <div class="hidden pt-4" id="barang-masuk" role="tabpanel" aria-labelledby="barang-masuk-tab">
                    @foreach ($barangMasuk as $masuk)
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center min-w-0">
                                    @if ($masuk->product->image)
                                        <img src="{{ asset('storage/' . $masuk->product->image) }}" alt="{{ $masuk->product->name }}" class="flex-shrink-0 w-10 h-10 object-cover rounded-lg">
                                    @else
                                        <span class="text-gray-500 truncate" style="max-width: 150px;" title="{{ $masuk->product->image }}">{{ $masuk->product->image ?? 'Tidak Ada Foto' }}</span>
                                    @endif
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900 truncate dark:text-white">
                                            {{ $masuk->product->name }}
                                        </p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <span class="mr-1">Kuantitas:</span>
                                            <span class="text-green-500 dark:text-green-400">+{{ $masuk->quantity }}</span>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="flex flex-col items-center justify-center min-w-0">
                                    <p class="mb-2 text-center font-medium text-gray-900 truncate dark:text-white">
                                        {{ $masuk->notes }}
                                    </p>
                                    <div class="text-center">
                                        @if ($masuk->status === 'Diterima')
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">
                                              Diterima
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
          
                <div class="hidden pt-4" id="barang-keluar" role="tabpanel" aria-labelledby="barang-keluar-tab">
                    @foreach ($barangKeluar as $keluar)
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center min-w-0">
                                    @if ($keluar->product->image)
                                        <img src="{{ asset('storage/' . $keluar->product->image) }}" alt="{{ $keluar->product->name }}" class="flex-shrink-0 w-10 h-10 object-cover rounded-lg">
                                    @else
                                        <span class="text-gray-500 truncate" style="max-width: 150px;" title="{{ $keluar->product->image }}">{{ $keluar->product->image ?? 'Tidak Ada Foto' }}</span>
                                    @endif
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900 truncate dark:text-white">
                                            {{ $keluar->product->name }}
                                        </p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <span class="mr-1">Kuantitas:</span>
                                            <span class="text-red-600 dark:text-red-500">-{{ $keluar->quantity }}</span>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="flex flex-col items-center justify-center min-w-0">
                                    <p class="mb-2 text-center font-medium text-gray-900 truncate dark:text-white">
                                        {{ $keluar->notes }}
                                    </p>
                                    <div class="text-center">
                                        @if ($keluar->status === 'Dikeluarkan')
                                            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-gray-400 border border-gray-100 dark:border-gray-500">
                                              Dikeluarkan
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>      
    </div>
</div>
@endsection