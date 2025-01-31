@extends('layouts.dashboard')
@section('page-title', 'Laporan Transaksi')
@section('content')

<div class="px-4 pt-6">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="p-3 bg-white block sm:flex items-center justify-between border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full mb-1">
                <div class="mb-4">

                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="{{ route('admin.index-admin') }}" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="{{ route('admin.laporan.transaksi') }}" class="ml-2 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white flex items-center"> 
                                        <svg class="w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M4 19v2c0 .5523.44772 1 1 1h14c.5523 0 1-.4477 1-1v-2H4Z"/>
                                            <path fill="currentColor" fill-rule="evenodd" d="M9 3c0-.55228.44772-1 1-1h8c.5523 0 1 .44772 1 1v3c0 .55228-.4477 1-1 1h-2v1h2c.5096 0 .9376.38314.9939.88957L19.8951 17H4.10498l.90116-8.11043C5.06241 8.38314 5.49047 8 6.00002 8H12V7h-2c-.55228 0-1-.44772-1-1V3Zm1.01 8H8.00002v2.01H10.01V11Zm.99 0h2.01v2.01H11V11Zm5.01 0H14v2.01h2.01V11Zm-8.00998 3H10.01v2.01H8.00002V14ZM13.01 14H11v2.01h2.01V14Zm.99 0h2.01v2.01H14V14ZM11 4h6v1h-6V4Z" clip-rule="evenodd"/>
                                        </svg>                                              
                                        Laporan Transaksi
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
                
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Laporan Transaksi Barang</h1>
                </div>
                <div class="sm:flex">
                    <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                        <form id="laporanForm" class="lg:pr-3" action="{{ route('admin.laporan.transaksi') }}" method="GET">
                            <div class="items-center sm:flex">
                                <div class="flex items-center mr-4">
                                    <button id="dropdownDefault" data-dropdown-toggle="dropdown" 
                                        class="mb-4 sm:mb-0 inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5" 
                                        type="button">
                                        Filter
                                        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                
                                    <div id="dropdown" class="z-10 hidden w-64 p-3 bg-white rounded-lg shadow max-h-96 overflow-y-auto ml-2">
                                        <h6 class="text-sm font-medium text-gray-900">Kategori</h6>
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
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                    <label for="kategori{{ $category->id }}" class="ml-2 text-sm font-medium text-gray-900">
                                                        {{ $category->name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                
                                        <h6 class="mt-3 text-sm font-medium text-gray-900">Tipe</h6>
                                        <ul class="space-y-2 text-sm">
                                            <li class="flex items-center">
                                                <input id="all-type" name="type" type="radio" value="" 
                                                    {{ request('type') == '' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="all-type" class="ml-2 text-sm font-medium text-gray-900">Semua Tipe</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="Masuk" name="type" type="radio" value="Masuk" 
                                                    {{ request('type') == 'Masuk' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="Masuk" class="ml-2 text-sm font-medium text-gray-900">Masuk</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="Keluar" name="type" type="radio" value="Keluar" 
                                                    {{ request('type') == 'Keluar' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="Keluar" class="ml-2 text-sm font-medium text-gray-900">Keluar</label>
                                            </li>
                                        </ul>
                
                                        <h6 class="mt-3 text-sm font-medium text-gray-900">Status</h6>
                                        <ul class="space-y-2 text-sm">
                                            <li class="flex items-center">
                                                <input id="all-status" name="status" type="radio" value="" 
                                                    {{ request('status') == '' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="all-status" class="ml-2 text-sm font-medium text-gray-900">Semua Status</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="Pending" name="status" type="radio" value="Pending" 
                                                    {{ request('status') == 'Pending' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="Pending" class="ml-2 text-sm font-medium text-gray-900">Pending</label>
                                            </li>                                            
                                            <li class="flex items-center">
                                                <input id="Diterima" name="status" type="radio" value="Diterima" 
                                                    {{ request('status') == 'Diterima' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="Diterima" class="ml-2 text-sm font-medium text-gray-900">Diterima</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="Ditolak" name="status" type="radio" value="Ditolak" 
                                                    {{ request('status') == 'Ditolak' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="Ditolak" class="ml-2 text-sm font-medium text-gray-900">Ditolak</label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="Dikeluarkan" name="status" type="radio" value="Dikeluarkan" 
                                                    {{ request('status') == 'Dikeluarkan' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="Dikeluarkan" class="ml-2 text-sm font-medium text-gray-900">Dikeluarkan</label>
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
                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <a href="{{ route('admin.laporan.export-laptrans', request()->only(['type', 'status', 'start_date', 'end_date', 'category_id'])) }}" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                            <svg class="w-5 h-5 mr-2 -ml-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                            </svg>
                            Export
                        </a>
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
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">No.</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Waktu</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Nama Produk</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Kategori</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Tipe Transaksi</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Kuantitas</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Harga</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Status</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Catatan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @if ($laptrans->isEmpty())
                                    <tr>
                                        <td colspan="10" class="p-4 text-base font-normal text-gray-500 dark:text-white text-center align-middle">
                                            ~Tidak ada laporan~
                                        </td>
                                    </tr>
                                @else
                                    @foreach($laptrans as $index => $lapt)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $index + 1 }}</td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ \Carbon\Carbon::parse($lapt->updated_at)->locale('id')->translatedFormat('d F Y, H:i') }}</td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $lapt->product->name }}</td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $lapt->product->category->name }}</td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">
                                            @if ($lapt->type === 'Masuk')
                                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Masuk</span>
                                            @elseif ($lapt->type === 'Keluar')
                                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 border border-red-100 dark:border-red-500">Keluar</span>
                                            @endif
                                        </td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $lapt->quantity }}</td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">Rp. {{ number_format($lapt->total_price, 2, ',', '.') }}</td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">
                                            @if ($lapt->status === 'Pending')
                                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-yellow-400 border border-yellow-100 dark:border-yellow-500">Pending</span>
                                            @elseif ($lapt->status === 'Diterima')
                                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Diterima</span>
                                            @elseif ($lapt->status === 'Ditolak')
                                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 border border-red-100 dark:border-red-500">Ditolak</span>
                                            @elseif ($lapt->status === 'Dikeluarkan')
                                                <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-gray-400 border border-gray-100 dark:border-gray-500">Dikeluarkan</span>
                                            @endif
                                        </td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $lapt->notes }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                <a href="{{ $laptrans->previousPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $laptrans->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{ $laptrans->nextPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $laptrans->hasMorePages() ? '' : 'aria-disabled=true' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $laptrans->firstItem() }}</span>
                    - <span class="font-semibold text-gray-900 dark:text-white">{{ $laptrans->lastItem() }}</span>
                    of <span class="font-semibold text-gray-900 dark:text-white">{{ $laptrans->total() }}</span> Laporan
                </span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ $laptrans->previousPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $laptrans->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Previous
                </a>
                <a href="{{ $laptrans->nextPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $laptrans->hasMorePages() ? '' : 'aria-disabled=true' }}>
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