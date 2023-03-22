<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto relative">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Purchase Invoice</h2>
                        </header>
                        <form method="post" class="mt-6 space-y-6" action="{{route('admin.product.add')}}">
                            @csrf
                            {{-- <div class="">
                                <label for="weight"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat</label>
                                <div class="flex">
                                    <select id="weight" name="weight" onchange="changeWeight()"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                        <option selected disabled>Pilih Berat</option>
                                    </select>
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-r-md border border-l-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        Gram
                                    </span>
                                </div>

                            </div> --}}
                            {{-- <div class="">
                                <label for="price"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                <div class="flex">
                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                        Rp
                                    </span>
                                    <input type="text" id="price"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none rounded-r-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="" name="price" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" value=""
                                           data-type="currency" required>
                                </div>
                                <p id="helper-price" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    Silahkan pilih Berat</p>
                            </div> --}}
                            <div class="grid gap-4 grid-cols-2">
                                <div class="">
                                    <label for="quantity"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <div class="flex">
                                        {{-- <input type="number" id="quantity"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="quantity" required> --}}
                                        <div class="input-group">
                                            <textarea name="quantity" id="quantity" readonly
                                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fa-solid fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="grouping"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengelompokan</label>
                                    <div class="flex">
                                        <input type="number" id="grouping"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="grouping" required>
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-4 grid-cols-3">
                                <div class="mb-4">
                                    <label for="quantity"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction Date</label>
                                    <div class="flex">
                                        {{-- <input type="number" id="quantity"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="quantity" required> --}}
                                        <input type="date" id="grouping"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="grouping" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="grouping"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
                                    <div class="flex">
                                        <input type="date" id="grouping"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="grouping" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="grouping"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Terms</label>
                                    <div class="flex">
                                        <select id="weight" name="weight" onchange="changeWeight()" style="border-radius: 10px;"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                            <option selected disabled>Pilih Berat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-x-auto relative mb-6">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-6" id="datatables-user">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Product
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Description
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Quantity
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Price
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Discount
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Ammount
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Option
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6">
                                                <input type="text" id="grouping" readonly value="example"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="" name="grouping" required>
                                            </td>
                                            <td class="py-4 px-6">
                                                <textarea name="message" id="message"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">example</textarea>
                                            </td>
                                            <td class="py-4 px-6">
                                                <input type="number" id="grouping" readonly value=1
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="" name="grouping" required>
                                            </td>
                                            <td class="py-4 px-6">
                                                <input type="text" id="grouping" readonly value="Rp.xxx,xx"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="" name="grouping" required>
                                            </td>
                                            <td class="py-4 px-6">
                                                <select id="weight" name="weight" onchange="changeWeight()" style="border-radius: 10px;"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required>
                                                    <option selected disabled>Select Discount</option>
                                                </select>
                                            </td>
                                            <td class="py-4 px-6">
                                                <input type="text" id="grouping" readonly value="Rp.xxx,xx"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="" name="grouping" required>
                                            </td>
                                            <td class="py-4 px-6">
                                                <button type="button" class="btn btn-outline-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6">
                                                <input type="text" id="grouping" readonly value="example"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="" name="grouping" required>
                                            </td>
                                            <td class="py-4 px-6">
                                                <textarea name="message" id="message"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">example</textarea>
                                            </td>
                                            <td class="py-4 px-6">
                                                <input type="number" id="grouping" readonly value=1
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="" name="grouping" required>
                                            </td>
                                            <td class="py-4 px-6">
                                                <input type="text" id="grouping" readonly value="Rp.xxx,xx"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="" name="grouping" required>
                                            </td>
                                            <td class="py-4 px-6">
                                                <select id="weight" name="weight" onchange="changeWeight()" style="border-radius: 10px;"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required>
                                                    <option selected disabled>Select Discount</option>
                                                </select>
                                            </td>
                                            <td class="py-4 px-6">
                                                <input type="text" id="grouping" readonly value="Rp.xxx,xx"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="" name="grouping" required>
                                            </td>
                                            <td class="py-4 px-6">
                                                <button type="button" class="btn btn-outline-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="mt-2">
                                </div>
                            </div>

                            <div class="grid gap-4 grid-cols-3">
                                <div class="mb-4">
                                    <label for="message"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                                    <div class="flex">
                                        {{-- <input type="number" id="message"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="message" required> --}}
                                        <textarea name="message" id="message"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="grouping"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Proteksi Kerusakan</label>
                                    <div class="flex">
                                        <select id="weight" name="weight" onchange="changeWeight()" style="border-radius: 10px;"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required>
                                            <option selected disabled>Pilih Proteksi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="grouping"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Pesanan ()</label>
                                    <div class="flex">
                                        <input type="number" id="grouping"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="grouping" required>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="grid gap-4 grid-cols-3">
                                <div class="mb-6">
                                    <div class="mb-2" style="display: flex; justify-content: space-between;">
                                        <p>
                                            SubTotal :
                                        </p>
                                        <p>
                                            Rp.xxx,xx
                                        </p>
                                    </div>
                                    <div class="mb-2" style="display: flex; justify-content: space-between;">
                                        <p>
                                            Discount per Lines :
                                        </p>
                                        <p>
                                            Rp.xxx,xx
                                        </p>
                                    </div>
                                    <div class="mb-4">
                                        <p>
                                            Total Discount
                                        </p>
                                        <div class="my-2 w-100 d-flex justify-content-between">
                                            <div class="input-group w-50">
                                                <input type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                                                <div class="input-group-append">
                                                    <label class="input-group-text bg-success text-white">%</label>
                                                    <label class="input-group-text">Rp.</label>
                                                </div>
                                            </div>
                                            <p>
                                                Rp.xxx,xx
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mb-2" style="display: flex; justify-content: space-between;">
                                        <strong>
                                            Total :
                                        </strong>
                                        <p>
                                            Rp.xxx,xx
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <button type="submit"
                                        class="text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-700 dark:border-blue-700">
                                    Checkout
                                </button>
                                <button type="submit"
                                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2845ce3869.js" crossorigin="anonymous"></script>
</x-app-layout>
