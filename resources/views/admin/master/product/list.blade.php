@php use Illuminate\Support\Facades\Storage; @endphp
<x-app-admin-layout>
    <x-slot name="header">
        <h2 class=" pl-64 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Master Produk') }}
        </h2>
    </x-slot>
    <div class="ml-64 py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <form class="grid grid-cols-12 gap-2" method="get" action="{{route('admin.master.product.list')}}">
                <select id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                    <option selected disabled value="null">Berat</option>
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
            </form>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatables-user">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Berat
                                </th>
                                <th scope="col" class="py-3 px-6 ">
                                    Gambar
                                </th>
                                <th scope="col" class="py-3 px-6 ">
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6">
                                        {{$product->weight}}
                                    </td>
                                    <td class="p-4 w-32">
                                        <img src="{{Storage::url($product->img_url)}}" alt="Gambar Emas {{$product->weight}} gr">
                                    </td>
                                    <td class="py-4 px-6">
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex ">
                                            <a href="{{route('admin.master.product.update.page',$product->id)}}">
                                                <svg class="w-4 h-4 m-2" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-admin-layout>
