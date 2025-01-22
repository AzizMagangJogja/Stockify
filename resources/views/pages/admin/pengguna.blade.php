@extends('layouts.dashboard')
@section('page-title', 'User')
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
                                    <a href="{{ route('admin.pengguna.index') }}" class="ml-2 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white flex items-center">
                                        <svg class="w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                                        </svg>                                                           
                                        User
                                    </a>
                                </div>
                            </li> 
                        </ol>
                    </nav>

                    @if (session('success'))
                        <div id="alert-1" class="flex p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10A8 8 0 11.001 10.002 8 8 0 0118 10zm-8.707 4.707a1 1 0 010-1.414L12.586 10 9.293 6.707a1 1 0 011.414-1.414L14 9.586a1 1 0 010 1.414l-3.293 3.293a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Success</span>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

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
                    
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Semua User</h1>
                </div>

                <div class="sm:flex">
                    <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                        <form class="lg:pr-3" action="#" method="GET">
                            <label for="users-search" class="sr-only">Search</label>
                            <div class="relative mt-1 lg:w-64 xl:w-96">
                                <input type="text" name="email" id="users-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cari User">
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <button type="button" data-modal-target="add-user-modal" data-modal-toggle="add-user-modal" class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Tambah User
                        </button>
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
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Nama</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Email</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Role</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">Password</th>
                                    <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($users as $user)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $user->name }}</td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $user->email }}</td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">{{ $user->role }}</td>
                                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">••••••••
                                        <button type="button" data-modal-target="password-modal-{{ $user->id }}" data-modal-toggle="password-modal-{{ $user->id }}">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="1" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="1" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </button>

                                        <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="password-modal-{{ $user->id }}">
                                            <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                                    <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                                                        <h3 class="text-xl font-semibold dark:text-white">
                                                            Password Asli
                                                        </h3>
                                                    </div>
                                                    <div class="p-4 space-y-6">
                                                        <p class="text-sm text-gray-700 dark:text-gray-300">
                                                            {{ $user->password }}
                                                        </p>
                                                    </div>
                                                    <div class="flex items-center justify-end p-4 border-t rounded-b dark:border-gray-600">
                                                        <button class="px-4 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 hover:bg-gray-200 dark:hover:bg-gray-600" data-modal-toggle="password-modal-{{ $user->id }}"">
                                                            Tutup
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 space-x-2 whitespace-nowrap text-center align-middle">
                                        <button type="button" data-modal-target="edit-user-modal-{{ $user->id }}" data-modal-toggle="edit-user-modal-{{ $user->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                            Edit
                                        </button>
                                        <button type="button" data-modal-target="delete-user-modal-{{ $user->id }}" data-modal-toggle="delete-user-modal-{{ $user->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            Hapus
                                        </button>
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
                <a href="{{ $users->previousPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $users->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{ $users->nextPageUrl() }}" 
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer transition-transform transform hover:scale-110 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                    {{ $users->hasMorePages() ? '' : 'aria-disabled=true' }}>
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $users->firstItem() }}</span>
                    - <span class="font-semibold text-gray-900 dark:text-white">{{ $users->lastItem() }}</span>
                    of <span class="font-semibold text-gray-900 dark:text-white">{{ $users->total() }}</span> User
                </span>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ $users->previousPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $users->onFirstPage() ? 'aria-disabled=true' : '' }}>
                    <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Previous
                </a>
                <a href="{{ $users->nextPageUrl() }}" 
                    class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition-transform transform hover:scale-105"
                    {{ $users->hasMorePages() ? '' : 'aria-disabled=true' }}>
                    Next
                    <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div> 

        <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="add-user-modal">
            <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                    <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                        <h3 class="text-xl font-semibold dark:text-white">
                            Tambah User Baru
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="add-user-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="p-6 space-y-6">
                        <form action="{{ route('admin.pengguna.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama User" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="nama_user@gmail.com" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                    <div class="relative">
                                        <select name="role" id="role" class="appearance-none shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition" required>
                                            <option value="" class="hidden">Pilih Role</option>
                                            @foreach($role as $item)
                                                <option value="{{ $item }}">{{ ucfirst($item) }}</option>
                                            @endforeach
                                        </select>                                                                            
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                                </div>
                            </div>
                        </div>
                        <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                            <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="submit">Tambah Pengguna</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($users as $user)
        <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="edit-user-modal-{{ $user->id }}">
            <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                    <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                        <h3 class="text-xl font-semibold dark:text-white">
                            Edit User
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-toggle="edit-user-modal-{{ $user->id }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="p-6 space-y-6">
                        <form action="{{ route('admin.pengguna.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama User" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('name', $user->email) }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="nama_user@gmail.com" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                    <div class="relative">
                                        <select name="role" id="role" class="appearance-none shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition" required>
                                            <option value="" class="hidden">Pilih Role</option>
                                            @foreach($role as $item)
                                                <option value="{{ $item }}" {{ $user->role == $item ? 'selected' : '' }}>{{ ucfirst($item) }}</option>
                                            @endforeach
                                        </select>                                                                            
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" value="{{ old('name', $user->password) }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                                </div>
                            </div>
                        </div>
                        <div class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700">
                            <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="delete-user-modal-{{ $user->id }}">
            <div class="relative w-full h-full max-w-md px-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                    <div class="flex justify-end p-2">
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white" data-modal-hide="delete-user-modal-{{ $user->id }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <div class="p-6 pt-0 text-center">
                        <svg class="w-16 h-16 mx-auto text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mt-5 mb-6 text-lg text-gray-500 dark:text-gray-400">Apakah Anda yakin akan menghapus user {{ $user->name }}?</h3>
                        <form action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-800">
                                Ya
                            </button>
                            <button data-modal-hide="delete-cat-modal-{{ $user->id }}" type="button" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700" data-modal-hide="delete-cat-modal">
                                Tidak
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection