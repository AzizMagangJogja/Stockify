@extends('layouts.dashboard')
@section('page-title', 'Laporann Stok')
@section('content')

<div class="px-4 pt-6">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="p-3 bg-white block sm:flex items-center justify-between border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full mb-1">
                <div class="mb-4">
                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="{{ route('manager.index-manager') }}" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="{{ route('manager.laporan.stok') }}" class="ml-2 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white flex items-center">
                                        <svg class="w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z"/>
                                            <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z"/>
                                          </svg>                                                            
                                        Laporan Stok
                                    </a>
                                </div>
                            </li> 
                        </ol>
                    </nav>

                    @if (session('error'))
                        <div id="alert-error" class="flex p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10A8 8 0 11.001 10.002 8 8 0 0118 10zm-8.707 4.707a1 1 0 010-1.414L12.586 10 9.293 6.707a1 1 0 011.414-1.414L14 9.586a1 1 0 010 1.414l-3.293 3.293a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Error</span>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('error') }}
                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-error" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Laporan Stok Barang</h1>
                </div>

                <div class="sm:flex">
                    <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                        <form id="laporanForm" class="lg:pr-3" action="{{ route('manager.laporan.stok') }}" method="GET">
                            <div class="items-center sm:flex">
                                <div class="flex items-center">
                                    <button id="dropdownDefault" data-dropdown-toggle="dropdown" 
                                        class="mb-4 sm:mb-0 mr-4 inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5" 
                                        type="button">
                                        Filter
                                        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                
                                    <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow">
                                        <h6 class="mb-3 text-sm font-medium text-gray-900">Kategori</h6>
                                        <ul class="space-y-2 text-sm">
                                            <li class="flex items-center">
                                                <input id="all-categories" name="category_id" type="radio" value=""
                                                {{ request('category_id') == '' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="all-categories" class="ml-2 text-sm font-medium text-gray-900">Semua Kategori</label>
                                            </li>
                                            @foreach ($categories as $category)
                                                <li class="flex items-center">
                                                    <input id="kategori{{ $category->id }}" name="category_id" type="radio" value="{{ $category->id }}" 
                                                        {{ request('category_id') == $category->id ? 'checked' : '' }} 
                                                        oninput="this.form.submit()" 
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 
                                                            {{ request('category_id') == $category->id ? 'bg-primary-500 border-primary-500' : '' }}" />
                                                    <label for="kategori{{ $category->id }}" class="ml-2 text-sm font-medium text-gray-900">
                                                        {{ $category->name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <input name="start_date" type="date" value="{{ request('start_date') }}" oninput="this.form.submit()" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" 
                                            placeholder="Dari Tanggal">
                                    </div>
                                    <div class="relative">
                                        <input name="end_date" type="date" value="{{ request('end_date') }}" oninput="this.form.submit()" 
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" 
                                            placeholder="Sampai Tanggal">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col mx-3">
            <div class="overflow-x-auto rounded-lg flex-grow border-b">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">No.</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Foto</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Nama Produk</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">SKU</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Kuantitas</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Stok Masuk</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Stok Keluar</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($lapstok as $index => $laps)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ ($lapstok->currentPage() - 1) * $lapstok->perPage() + $index + 1 }}
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($laps->image)
                                            <img src="{{ asset('storage/' . $laps->image) }}" alt="{{ $laps->name }}" class="w-16 h-16 object-cover rounded-lg">
                                        @else
                                            <span class="text-gray-500 truncate" style="max-width: 150px;" title="{{ $laps->image }}">{{ $laps->image ?? 'Tidak Ada Foto' }}</span>
                                        @endif
                                    </td> 
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $laps->name }}</td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middlee">{{ $laps->sku }}</td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $laps->quantity - $laps->minimum_stock }}</td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">
                                        @php
                                            $masuk = $laps->masuk ?? 0;
                                        @endphp
                                        @if ($masuk > 0)
                                            <span class="text-green-500 font-semibold">+{{ $masuk }}</span>
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">
                                        @php
                                            $keluar = $laps->keluar ?? 0;
                                        @endphp
                                        @if ($keluar > 0)
                                            <span class="text-red-500 font-semibold">-{{ $keluar }}</span>
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                <a href="{{ $lapstok->previousPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $lapstok->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{ $lapstok->nextPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $lapstok->hasMorePages() ? '' : 'aria-disabled=true' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $lapstok->firstItem() }}</span>
                    - <span class="font-semibold text-gray-900 dark:text-white">{{ $lapstok->lastItem() }}</span>
                    of <span class="font-semibold text-gray-900 dark:text-white">{{ $lapstok->total() }}</span> Laporan
                </span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ $lapstok->previousPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $lapstok->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Previous
                </a>
                <a href="{{ $lapstok->nextPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $lapstok->hasMorePages() ? '' : 'aria-disabled=true' }}>
                    Next
                    <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div> 
    </div>
</div>
@endsection