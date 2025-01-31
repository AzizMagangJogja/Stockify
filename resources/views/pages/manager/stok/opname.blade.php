@extends('layouts.dashboard')
@section('page-title', 'Stok Opname')
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
                                    <a href="{{ route('manager.stock.opname') }}" class="ml-2 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white flex items-center">
                                        <svg class="w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2.586 4.586A2 2 0 0 1 4 4h8a2 2 0 0 1 2 2h5a1 1 0 0 1 .894.553l2 4c.07.139.106.292.106.447v4a1 1 0 0 1-1 1h-.535a3.5 3.5 0 1 1-6.93 0h-3.07a3.5 3.5 0 1 1-6.93 0H3a1 1 0 0 1-1-1V6a2 2 0 0 1 .586-1.414ZM18.208 15.61a1.497 1.497 0 0 0-2.416 0 1.5 1.5 0 1 0 2.416 0Zm-10 0a1.498 1.498 0 0 0-2.416 0 1.5 1.5 0 1 0 2.416 0Zm5.79-7.612v2.02h5.396l-1-2.02h-4.396ZM9 8.667a1 1 0 1 0-2 0V10a1 1 0 0 0 .293.707l1.5 1.5a1 1 0 0 0 1.414-1.414L9 9.586v-.92Z" clip-rule="evenodd"/>
                                        </svg>                                                                
                                        Opname
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
                
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Semua Stok Opname</h1>
                </div>
                <div class="sm:flex">
                    <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                        <form class="lg:pr-3" action="{{ route('manager.stock.opname') }}" method="GET">
                            <label for="users-search" class="sr-only">Search</label>
                            <div class="relative mt-1 lg:w-64 xl:w-96">
                            <input type="text" name="search" value="{{ request('search') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cari Data Stok Opname" onkeydown="if (event.key === 'Enter') { this.form.submit(); }"/>
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
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Foto</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Nama Produk</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">SKU</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Stok Opname</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Pencatatan Terakhir</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @if ($opname->isEmpty())
                                    <tr>
                                        <td colspan="10" class="p-4 text-base font-normal text-gray-500 dark:text-white text-center align-middle">
                                            ~Tidak ada data opname~
                                        </td>
                                    </tr>
                                @else
                                    @foreach($opname as $opn)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($opn->image)
                                                <img src="{{ asset('storage/' . $opn->image) }}" alt="{{ $opn->name }}" class="w-16 h-16 object-cover rounded-lg">
                                            @else
                                                <span class="text-gray-500 truncate" style="max-width: 150px;" title="{{ $opn->image }}">{{ $opn->image ?? 'Tidak Ada Foto' }}</span>
                                            @endif
                                        </td> 
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $opn->name }}</td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $opn->sku }}</td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $opn->quantity - $opn->minimum_stock }}</td>
                                        <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($opn->transactions->isNotEmpty())
                                                @php
                                                    $lastTransaction = $opn->transactions->last();
                                                @endphp
                                                <div>
                                                    <span>{{ $lastTransaction->type }} - </span> 
                                                    @if ($lastTransaction->status === 'Pending')
                                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-yellow-400 border border-yellow-100 dark:border-yellow-500">
                                                            Pending
                                                        </span>
                                                    @elseif ($lastTransaction->status === 'Diterima')
                                                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">
                                                            Diterima
                                                        </span>
                                                    @elseif ($lastTransaction->status === 'Ditolak')
                                                        <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-red-400 border border-red-100 dark:border-red-500">
                                                            Ditolak
                                                        </span>
                                                    @elseif ($lastTransaction->status === 'Dikeluarkan')
                                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-gray-400 border border-gray-100 dark:border-gray-500">
                                                            Dikeluarkan
                                                        </span>
                                                    @endif
                                                    <br>
                                                    <small class="text-gray-500">
                                                        {{ $lastTransaction->updated_at->timezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y, H:i') }}
                                                    </small>
                                                    <br>
                                                    <span class="text-sm text-gray-700">Kuantitas: {{ $lastTransaction->quantity }}</span>
                                                </div>
                                            @else
                                                <span class="text-gray-500">~Tidak Ada Transaksi~</span>
                                            @endif
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

        <div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
            <div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center mb-4 sm:mb-0">
                    <a href="{{ $opname->previousPageUrl() }}" 
                        class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                        {{ $opname->onFirstPage() ? 'aria-disabled=true' : '' }}>
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="{{ $opname->nextPageUrl() }}" 
                        class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                        {{ $opname->hasMorePages() ? '' : 'aria-disabled=true' }}>
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $opname->firstItem() }}</span>
                        - <span class="font-semibold text-gray-900 dark:text-white">{{ $opname->lastItem() }}</span>
                        of <span class="font-semibold text-gray-900 dark:text-white">{{ $opname->total() }}</span> Opname
                    </span>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ $opname->previousPageUrl() }}" 
                        class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                        {{ $opname->onFirstPage() ? 'aria-disabled=true' : '' }}>
                        <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Previous
                    </a>
                    <a href="{{ $opname->nextPageUrl() }}" 
                        class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                        {{ $opname->hasMorePages() ? '' : 'aria-disabled=true' }}>
                        Next
                        <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection