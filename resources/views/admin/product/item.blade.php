<x-app-admin-layout>
    <x-slot name="header">
        <h2 class=" pl-64 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Produk') }}
        </h2>
    </x-slot>
    <div class="ml-64 py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <form class="grid grid-cols-12 gap-2" method="get" action="{{route('admin.product.list')}}">
            </form>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatables-user">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Qr Code Group
                                </th>
                                @if($selectedGroup == 0)
                                    <th scope="col" class="py-3 px-6">
                                        Berat
                                    </th>
                                @endif
                                <th scope="col" class="py-3 px-6">
                                    Harga Beli
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    In-Stock
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6">
                                        {!! QrCode::size(50)->generate($item->code) !!}
                                    </td>
                                    @if($selectedGroup == 0)
                                        <td class="py-4 px-6">
                                            {{$item->weight}}
                                        </td>
                                    @endif
                                    <td class="py-4 px-6">
                                        Rp. {{number_format($item->buy_price, 2, ',', '.')}}
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($item->ready)
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Ready</span>
                                        @else
                                            <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Out of Stock</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-admin-layout>
