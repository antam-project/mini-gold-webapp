<x-app-layout>
    <x-slot name="header">
        <h2 class="sfont-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Purchase Delivery') }}
        </h2>
    </x-slot>
    <div class="ml-5 py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-4 grid-cols-2">
                <div class="col">
                    <div class="mb-6">
                        <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vendor*</label>
                        <div class="flex">
                            <select id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled value="null">SGM MiniGold Pusat</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="textarea"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shipping Address</label>
                        <div class="flex">
                            <textarea id="textarea" name="textarea" rows="2"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </textarea>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="shipVia"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ship Via</label>
                        <div class="flex">
                            <input type="text" id="trNo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="shipVia" placeholder="">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="trNo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction No</label>
                        <div class="flex">
                            <input type="text" id="trNo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="trNo" placeholder="[Auto]">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="crNo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Ref No</label>
                        <div class="flex">
                            <input type="text" id="trNo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="crNo" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-6">
                        <label for="mail"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <div class="flex">
                            <input type="mail" id="mail"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Email" name="mail">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="date1"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shipping Date</label>
                        <div class="d-inline-flex p-2 absolute items-center">
                            <svg aria-hidden="true"
                                    class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="date1" placeholder="Pilih tanggal">
                    </div>

                    <div class="mb-6">
                        <label for="trNo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tracking No</label>
                        <div class="flex">
                            <input type="text" id="trNo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="trNo" placeholder="">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="tag"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                        <div class="flex">
                            <input type="text" id="tag"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="tag" placeholder="">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="order"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction No</label>
                        <div class="text-info">
                            <p>Purchase Order #0001</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="wh"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Werehouse</label>
                            <div class="flex">
                                <select id="wh" name="wh"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled value="null">Ampera Werehouse</option>
                                </select>
                            </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 text-gray-900">
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-gray-500 dark:text-gray-400" id="datatables-user">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                <tr>
                                    <th scope="col" class="py-3 px-1">
                                        Product
                                    </th>
                                    <th scope="col" class="py-3 px-1">
                                        Description
                                    </th>
                                    <th scope="col" class="py-3 px-1">
                                        Qty
                                    </th>
                                    <th scope="col" class="py-3 px-1">
                                        Units
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-10 px-1">
                                            <select id="weight" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                                                <option selected disabled value="null">Select Product</option>
                                            </select>
                                        </td>

                                        <td class="py-10 px-1">
                                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2 form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                        </td>

                                        <td class="py-4 px-1">
                                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                                        </td>

                                        <td class="py-4 px-1">
                                            <select id="weight" name="weight" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                                                <option selected disabled value="null"></option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        <button type="submit"
                                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 col-span-2">
                                Tambah</button>

                        </div>
                    </div>
                </div>

                    <div class="mx-auto sm:px-6 lg:px-8">
                        <div class="grid gap-4 grid-cols-2">
                            <div class="col">
                                <div class="mb-6">
                                    <label for="textarea2"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Message</label>
                                    <div class="flex">
                                        <textarea id="textarea2" name="textarea2" rows="3"
                                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-6">
                                    <label for="textarea3"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Memo</label>
                                    <div class="flex">
                                        <textarea id="textarea3" name="textarea3" rows="3"
                                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2 input-group row">
                                    <label class="input-group-text" for="inputGroupFile01">Attachments</label>
                                    <input type="file" class="form-control" id="inputGroupFile01">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Shipping fee</p>
                            </div>

                            <div class="col">
                                <p>Rp. 0,00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
