<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Purchase Invoice') }}
        </h2>
    </x-slot>
    <div>
        <div class=" mx-auto sm:px-6 lg:px-8 d-flex justify-content-between">
            <form class="grid grid-cols-6 gap-4" method="get" >
                <div class="relative col-span-3">
                    <label for="selected" class="form-label text-sm">Vendor*</label><br>
                    <select id="weight" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                        <option selected disabled value="null">Pilih Vendor</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <div class="relative col-span-3">
                    <label for="selected" class="form-label text-sm">Email</label><br>
                    <input type="mail" placeholder="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                </div>

                <div class="relative col-span-3 row">
                    <label for="textarea" class="form-label text-sm">Vendor Address</label><br>
                    <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2 form-control" id="exampleFormControlTextarea1" rows="2 "></textarea>
                </div>

                <div class="relative col-span-3 p-8 d-flex">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="is Shipped?"/>
                    <label class="form-check-label text-sm" for="inlineCheckbox1">is Shipped?</label>
                </div>

                <div class="relative col-span-2 row">
                    <label for="textarea" class="form-label text-sm">Transaction Date</label><br>
                    <div class="d-inline-flex p-2 absolute items-center">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input datepicker datepicker-autohide name="date" type="text" placeholder="Pilih tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="relative col-span-2">
                    <label for="textarea" class="form-label text-sm">Due Date</label><br>
                    <div class="d-inline-flex p-2 absolute items-center">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input datepicker datepicker-autohide name="date" type="text" placeholder="Pilih tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="relative col-span-2">
                    <label for="selected" class="form-label text-sm">Term</label><br>
                    <select id="weight" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                        <option selected disabled value="null">Custom</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>

                <div class="relative col-span-3 row">
                    <label for="selected" class="form-label text-sm">Transaction No</label><br>
                    <input type="text" placeholder="[Auto]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                </div>

                <div class="relative col-span-3">
                    <label for="selected" class="form-label text-sm">Tags</label><br>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                </div>

                <div class="relative col-span-3 row">
                    <label for="selected" class="form-label text-sm">Vendor Ref No</label><br>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                </div>

                <div class="relative col-span-3">
                    <label for="selected" class="form-label text-sm">Werehouse</label><br>
                    <select id="weight" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                        <option selected disabled value="null">Select Werehouse</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>

                <div class="form-check form-switch col-span-4 row d-flex justify-content-end">
                    <label class="form-check-label text-sm" for="flexSwitchCheckChecked">Price Include tax</label>
                    <input class="form-check-input" type="checkbox" role="switch">
                </div>
            </form>
    </div>
    <div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
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
                            <th scope="col" class="py-3 px-1">
                                Unit Price
                            </th>
                            <th scope="col" class="py-3 px-1">
                                Discount
                            </th>
                            <th scope="col" class="py-3 px-1">
                                Tax
                            </th>
                            <th scope="col" class="py-3 px-1">
                                Amount
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-10 px-1">
                                    <select id="weight" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                                        <option selected disabled value="null">Select Product</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
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
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </td>

                                <td class="py-4 px-1">
                                    <input type="text" placeholder="Rp. 0,00" class="text-end bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                                </td>

                                <td class="py-4 px-1">
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                                </td>

                                <td class="py-4 px-1">
                                    <select id="weight" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2">
                                        <option selected disabled value="null">Select Tax</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </td>

                                <td class="py-4 px-1">
                                    <input type="text" placeholder="Rp. 0,00" class="text-end bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 col-span-2">Tambah</button>

                    <div class="sm:px-6 lg:px-8 d-flex">
                        <form class="grid grid-cols-2 gap-4" >
                            <div class="relative col-span-1 row">
                                <label for="textarea" class="form-label text-sm">Message</label><br>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2 form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>

                            <div class="relative col-span-1">
                                <label for="textarea" class="form-label text-sm">Memo</label><br>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2 form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>

                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2 col-span-2 input-group row">
                                <label class="input-group-text" for="inputGroupFile01">Attachments</label>
                                <input type="file" class="form-control" id="inputGroupFile01">
                            </div>

                            <div class="cols-span-1 row">
                                <div>
                                    Sub Total
                                </div>
                            </div>

                            <div class="cols-span-1">
                                <div class="text-end">
                                    Rp. 0,00
                                </div>
                            </div>

                            <div class="cols-span-3 row">
                                <div>
                                    Discount per Lines
                                </div>
                            </div>

                            <div class="cols-span-3">
                                <div class="text-end">
                                    Rp. 0,00
                                </div>
                            </div>

                            <div class="cols-span-3 row">
                                <div>
                                    <label for="textarea" class="form-label text-sm">Discount (%)</label><br>
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                                </div>
                            </div>

                            <div class="cols-span-3">
                                <div class="text-end">
                                    Rp. 0,00
                                </div>
                            </div>

                            <div class="cols-span-3 row">
                                <div>
                                    Total
                                </div>
                            </div>

                            <div class="cols-span-3">
                                <div class="text-end">
                                    Rp. 0,00
                                </div>
                            </div>

                            <div class="cols-span-3 row">
                                <div>
                                    Deposit
                                </div>
                            </div>

                            <div class="cols-span-3">
                                <div>
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p1-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                                </div>
                            </div>

                            <div class="cols-span-3 row">
                                <div class="fs-3 fw-bold">
                                    Balance Due
                                </div>
                            </div>

                            <div class="cols-span-3">
                                <div class="text-end fw-bold">
                                    Rp. 0,00
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
