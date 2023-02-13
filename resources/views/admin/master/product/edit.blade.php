<x-app-admin-layout>
    <x-slot name="header">
        <h2 class=" pl-64 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Master Produk') }}
        </h2>
    </x-slot>
    <div class="ml-64 py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto relative">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Kelola Master Produk</h2>
                            <p class="mt-1 text-sm text-gray-600">Kelola Gambar Produk.</p>
                        </header>
                        <div class="grid grid-cols-4 gap-4 ">
                            <div class="col-span-2">
                                <form method="post" action="{{ route('admin.master.product.update', $product->id) }}"
                                      class="mt-6 space-y-6" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="mb-6">
                                        <label for="weight"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight</label>
                                        <input type="text" id="weight" value="{{$product->weight}}" disabled readonly
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="name@flowbite.com" required>
                                    </div>

                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                           for="user_avatar">Upload Gambar</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="master_produk" id="master_produk" type="file" name="image">
                                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="master_produk_help">
                                        Format : jpg, jpeg, png (Max 2Mb)
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <button type="submit"
                                                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-span-2">
                                <img src="{{Storage::url($product->img_url)}}" alt="Gambar Emas {{$product->weight}} gr"
                                     class=" rounded border-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-admin-layout>
