<x-app-admin-layout>
    <x-slot name="header">
        <h2 class=" pl-64 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>
    <div class="ml-64 py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <form class="grid grid-cols-12 gap-2" method="get" action="{{route('admin.product.list')}}">
                <select id="weight" name="weight"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                    <option selected disabled value="null">Berat</option>
                    <option value="0">Non Group</option>
                    <option value="0.5">0.5</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="250">250</option>
                    <option value="500">500</option>
                    <option value="1000">1000</option>
                </select>
                <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 col-span-2">
                    Cari
                </button>
                <div class="col-span-6"></div>
                <a href="{{route('admin.product.add.page')}}" class="text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-700 dark:border-blue-700 col-span-2 text-center">
                    Tambah
                </a>
            </form>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatables-user">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Berat/Grup
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Jumlah Grup
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Total
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    In-Stock
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6">
                                        @if($group->weight == 0)
                                            Non Group
                                        @else
                                            {{$group->weight}}
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$group->group}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$group->total}}
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($group->ready == 0)
                                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Out of Stock</span>
                                        @else
                                            {{$group->ready}}
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="{{route('admin.product.group.page', [$group->weight])}}">
                                            <svg class="w-4 h-4 m-2" fill="none" stroke="currentColor"
                                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-admin-layout>
