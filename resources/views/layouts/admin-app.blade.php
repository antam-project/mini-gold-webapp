<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin || Jakarta Minigold</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- icons --}}
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <!-- Jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>

</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Content -->
    <main>
        <aside class="w-64 absolute h-screen" aria-label="Sidebar">
            <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800 h-screen">
                <ul class="space-y-2">
                    <li>
                        <a href="{{route('admin.user.list')}}"
                           class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 active:bg-gray-100">
                            <i class="fa-solid fa-user"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Pengguna</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.user.list')}}"
                           class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 active:bg-gray-100">
                            <i class="fa-sharp fa-solid fa-paper-plane"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Konfirmasi Pembayaran</span>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example"
                                @if((request()->routeIs('admin.master.product.list')
                                || request()->routeIs('admin.master.product.update.page')
                                || request()->routeIs('admin.master.gold.list')))
                                    aria-expanded="true"
                                @endif>
                            <i class="fa-solid fa-database"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Master Data</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="dropdown-example" class="py-2 space-y-2
                         @if(!(request()->routeIs('admin.master.product.list')
                            || request()->routeIs('admin.master.product.update.page')
                            || request()->routeIs('admin.master.gold.list')))
                         hidden
                         @endif
                         ">
                            <li>
                                <a href="{{route('admin.master.gold.list')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Harga Emas</a>
                            </li>
                            <li>
                                <a href="{{route('admin.master.product.list')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Produk</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.product.list')}}"
                           class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fa-solid fa-briefcase"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Produk</span>
                        </a>
                    </li>

                </ul>
            </div>
        </aside>
        <div>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            {{ $slot }}
        </div>
    </main>
</div>
<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.4/dist/datepicker.js"></script>
<script src="https://kit.fontawesome.com/2845ce3869.js" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
