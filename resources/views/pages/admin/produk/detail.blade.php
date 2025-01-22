@extends('layouts.dashboard')
@section('page-title', 'Detail Produk')
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
                                    <a href="{{ route('admin.produk.produk.index') }}" class="ml-2 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white flex items-center">
                                        <svg class="w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                        </svg>
                                        Produk
                                    </a>
                                </div>
                            </li> 
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="{{ route('admin.produk.produk.show', $product->id) }}" class="ml-2 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white flex items-center">
                                        <svg class="w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                        </svg>                                          
                                        Detail
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
                    
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Detail Produk {{ $product->name }}</h1>
                </div>
            </div>
        </div>

        <div class="mt-5 space-y-6">
            <div class="flex items-center justify-center">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-lg shadow-lg max-w-md">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col items-center justify-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">Nama Produk</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->name }}</p>
        
                    <h2 class="mt-4 text-lg font-bold text-gray-800 dark:text-gray-100">SKU</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->sku }}</p>
        
                    <h2 class="mt-4 text-lg font-bold text-gray-800 dark:text-gray-100">Kuantitas</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->quantity - $product->minimum_stock }}</p>
        
                    <h2 class="mt-4 text-lg font-bold text-gray-800 dark:text-gray-100">Stok Minimum</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->minimum_stock }}</p>
        
                    <h2 class="mt-4 text-lg font-bold text-gray-800 dark:text-gray-100">Deskripsi</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->description }}</p>
                </div>
        
                <div class="flex flex-col items-center justify-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">Harga Beli</h2>
                    <p class="text-gray-700 dark:text-gray-300">Rp {{ number_format($product->purchase_price, 2, ',', '.') }}</p>
        
                    <h2 class="mt-4 text-lg font-bold text-gray-800 dark:text-gray-100">Harga Jual</h2>
                    <p class="text-gray-700 dark:text-gray-300">Rp {{ number_format($product->selling_price, 2, ',', '.') }}</p>
        
                    <h2 class="mt-4 text-lg font-bold text-gray-800 dark:text-gray-100">Kategori</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->category->name }}</p>
        
                    <h2 class="mt-4 text-lg font-bold text-gray-800 dark:text-gray-100">Supplier</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $product->supplier->name }}</p>
                </div>
            </div>
        
            <div class="flex justify-center">
                <div class="w-full max-w-1/3 md:max-w-sm flex flex-col items-center justify-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">Atribut</h2>
                    @if ($product->attributes && $product->attributes->count())
                        <div class="mt-2 space-y-2 text-center">
                            @foreach ($product->attributes as $attribute)
                                <p class="text-gray-700 dark:text-gray-300">
                                    <strong>{{ $attribute->name }}:</strong> {{ $attribute->value }}
                                </p>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-700 dark:text-gray-300">Tidak ada atribut untuk produk ini.</p>
                    @endif
                </div>
            </div>
        
            <div class="flex justify-start mt-6">
                <a href="{{ route('manager.produk.index') }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">Kembali</a>
            </div>
        </div> 
    </div>
</div>
@endsection