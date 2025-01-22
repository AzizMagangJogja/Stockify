@extends('layouts.dashboard')
@section('page-title', 'Dashboard')
@section('content')

<div class="px-4 pt-6">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Cek Barang Masuk & Keluar</h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">Periksa & siapkan barang yang akan masuk & keluar dari gudang Stokify</span>
            </div>
            <div class="items-center sm:flex">
                <form method="GET" action="{{ route('staff.index-staff') }}" id="filterForm">
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="mb-4 sm:mb-0 mr-4 inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5" type="button">
                                Filter
                                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                
                            <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow">
                                <h6 class="mb-3 text-sm font-medium text-gray-900">Tipe</h6>
                                <ul class="space-y-2 text-sm">
                                    <li class="flex items-center">
                                        <input id="all-types" name="type" type="radio" value=""
                                        {{ request('type') == '' ? 'checked' : '' }} oninput="this.form.submit()" 
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                        <label for="all-types" class="ml-2 text-sm font-medium text-gray-900">Semua Tipe</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="type-masuk" name="type" type="radio" value="Masuk" 
                                            {{ request('type') == 'Masuk' ? 'checked' : '' }} oninput="this.form.submit()" 
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                        <label for="type-masuk" class="ml-2 text-sm font-medium text-gray-900">Barang Masuk</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="type-keluar" name="type" type="radio" value="Keluar" 
                                            {{ request('type') == 'Keluar' ? 'checked' : '' }} oninput="this.form.submit()" 
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                        <label for="type-keluar" class="ml-2 text-sm font-medium text-gray-900">Barang Keluar</label>
                                    </li>
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
        
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg flex-grow border-b">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">No.</th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Nama Produk</th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Kuantitas</th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Waktu</th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Tipe</th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Status</th>
                                    <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase dark:text-white text-center align-middle">Catatan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800">
                                @foreach($dashboard as $index => $dash)
                                <tr>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $index + 1 }}</td>
                                    <td class="p-4 text-base font-normal text-gray-500 whitespace-nowrap dark:text-white text-center align-middle">{{ $dash->product->name }}</td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $dash->quantity }}</td>
                                    <td class="p-4 text-base font-normal text-gray-500 whitespace-nowrap dark:text-white text-center align-middle">{{ \Carbon\Carbon::parse($dash->created_at)->locale('id')->translatedFormat('d F Y, H:i') }}</td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">
                                        @if ($dash->type === 'Masuk')
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Masuk</span>
                                        @elseif ($dash->type === 'Keluar')
                                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 border border-red-100 dark:border-red-500">Keluar</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500 whitespace-nowrap dark:text-white text-center align-middle">
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-yellow-400 border border-yellow-100 dark:border-yellow-500">{{ $dash->status }}</span>
                                    </td>
                                    <td class="p-4 text-base font-normal text-gray-500 whitespace-nowrap dark:text-white text-center align-middle">
                                        @if ($dash->type === 'Masuk')
                                            Periksa barang!
                                        @elseif ($dash->type === 'Keluar')
                                            Siapkan barang!
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
                <a href="{{ $dashboard->previousPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $dashboard->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{ $dashboard->nextPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $dashboard->hasMorePages() ? '' : 'aria-disabled=true' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $dashboard->firstItem() }}</span>
                    - <span class="font-semibold text-gray-900 dark:text-white">{{ $dashboard->lastItem() }}</span>
                    of <span class="font-semibold text-gray-900 dark:text-white">{{ $dashboard->total() }}</span>
                </span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ $dashboard->previousPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $dashboard->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Previous
                </a>
                <a href="{{ $dashboard->nextPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $dashboard->hasMorePages() ? '' : 'aria-disabled=true' }}>
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