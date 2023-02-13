<x-app-admin-layout>
    <x-slot name="header">
        <h2 class=" pl-64 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Harga Emas') }}
        </h2>
    </x-slot>
    <div class="ml-64 py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <form class="grid grid-cols-12 gap-2" method="get" action="{{route('admin.master.gold.list')}}">
                <select id="weight" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
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


                <div class="relative col-span-3">
                    <div class="flex absolute top-2.5  left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input datepicker datepicker-autohide name="date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih tanggal">
                </div>


                <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 col-span-2">Cari</button>
            </form>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatables-user">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Tanggal
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Berat
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Harga Dasar
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Harga NPWP (+0.45%)
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Harga Non NPWP (+0.90%)
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Sumber
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($golds as $gold)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6">
                                        {{$gold->date}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$gold->weight}} gr
                                    </td>
                                    <td class="py-4 px-6">
                                        Rp. {{number_format($gold->price1, 2, ',', '.')}}
                                    </td>
                                    <td class="py-4 px-6">
                                        Rp. {{number_format($gold->price2, 2, ',', '.')}}
                                    </td>
                                    <td class="py-4 px-6">
                                        Rp. {{number_format($gold->price3, 2, ',', '.')}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$gold->source}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $golds->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-admin-layout>
