@extends('layouts.dashboard')
@section('page-title', 'Laporan Aktivitas')
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
                                    <a href="{{ route('admin.laporan.pengguna') }}" class="ml-2 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white flex items-center"> 
                                        <svg class="w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                                        </svg>                                                                                      
                                        Laporan Aktivitas
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
                
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Laporan Aktivitas User</h1>
                </div>
                <div class="sm:flex">
                    <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                        <form id="laporanForm" class="lg:pr-3" action="#" method="GET">
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
                                        <h6 class=" text-base font-medium text-gray-900">User</h6>
                                        <ul class="space-y-2 text-sm">
                                            <li class="flex items-center">
                                                <input id="all-user" name="user_id" type="radio" value="" 
                                                    {{ request('user_id') == '' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="all-user" class="ml-2 text-sm font-medium text-gray-900">Semua User</label>
                                            </li>
                                            @foreach ($users as $user)
                                                <li class="flex items-center">
                                                    <input id="user{{ $user->id }}" name="user_id" type="radio" value="{{ $user->id }}" 
                                                        {{ request('user_id') == $user->id ? 'checked' : '' }} 
                                                        oninput="this.form.submit()" 
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                    <label for="user{{ $user->id }}" class="ml-2 text-sm font-medium text-gray-900">
                                                        {{ $user->name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <h6 class="mt-3 text-base font-medium text-gray-900">Aksi</h6>
                                        <ul class="space-y-2 text-sm">
                                            <li class="flex items-center">
                                                <input id="all-action" name="action" type="radio" value="" 
                                                    {{ request('action') == '' ? 'checked' : '' }} oninput="this.form.submit()" 
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                <label for="all-user" class="ml-2 text-sm font-medium text-gray-900">Semua Aksi</label>
                                            </li>
                                            @foreach ($action as $aksi)
                                                <li class="flex items-center">
                                                    <input id="action{{ $aksi->id }}" name="action" type="radio" value="{{ $aksi->action }}" 
                                                        {{ request('action') == $aksi->action ? 'checked' : '' }} 
                                                        oninput="this.form.submit()" 
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                                    <label for="action{{ $aksi->id }}" class="ml-2 text-sm font-medium text-gray-900">
                                                        {{ $aksi->action }}
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
                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <a href="{{ route('admin.laporan.export.lapaktivitas') }}" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                            <svg class="w-5 h-5 mr-2 -ml-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.293l-2-2a1 1 0 0 0-1.414 1.414l.293.293h-6.586a1 1 0 1 0 0 2h6.586l-.293.293A1 1 0 0 0 18 16.707l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                            </svg>
                            Export Data
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
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">ID</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Nama</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Tanggal</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Jam</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Aktivitas</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($useractivity as $usav)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white text-center align-middle">{{ $usav->id }}</td>
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
        <div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                <a href="{{ $useractivity->previousPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $useractivity->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{ $useractivity->nextPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $useractivity->hasMorePages() ? '' : 'aria-disabled=true' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $useractivity->firstItem() }}</span>
                    - <span class="font-semibold text-gray-900 dark:text-white">{{ $useractivity->lastItem() }}</span>
                    of <span class="font-semibold text-gray-900 dark:text-white">{{ $useractivity->total() }}</span> Laporan
                </span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ $useractivity->previousPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $useractivity->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Previous
                </a>
                <a href="{{ $useractivity->nextPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $useractivity->hasMorePages() ? '' : 'aria-disabled=true' }}>
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