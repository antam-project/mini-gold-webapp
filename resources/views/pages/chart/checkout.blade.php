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
                        <form method="post" id="form-checkout" class="mt-6 space-y-6" action="{{route('checkout')}}">
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
                                            <textarea name="address" id="address-input"
                                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="grouping"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengelompokan</label>
                                    <div class="flex">
                                        <input type="text" id="grouping"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="vendor" required>
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
                                        <input type="date" id="grouping" value="{{ date('Y-m-d') }}" readonly
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="transaction_date" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="grouping"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
                                    <div class="flex">
                                        <input type="date" id="grouping" min=<?php echo date('Y-m-d'); ?>
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="due_date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-x-auto relative mb-6">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-6 table table-striped" id="datatables-user">
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
                                            Tax
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Ammount
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $item)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-6">
                                                    <input type="text" id="grouping" readonly value="Mini Gold {{$item->berat}} gr"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="" name="grouping" required>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <textarea name="message" id="message"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$item->kuantitas}} Buah Mini Gold dengan berat {{$item->berat}} gr</textarea>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <input type="number" id="grouping" readonly value={{$item->kuantitas}}
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="" name="grouping" required>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <input type="text" id="grouping" readonly value="@currency($item->harga)"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="" name="grouping" required>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <input type="text" id="grouping" readonly value="@currency($item->tax)"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="" name="grouping" required>
                                                </td>
                                                <td class="py-4 px-6 d-none">
                                                    <input type="number" id="taxinput" readonly value="{{$item->tax}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="" name="grouping" required>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <input type="text" id="grouping" readonly value="@currency($item->ammount)"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="" name="grouping" required>
                                                </td>
                                                <td class="py-4 px-6 d-none">
                                                    <input type="number" id="ammount" readonly value="{{$item->harga}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="" name="grouping" required>
                                                </td>
                                            </tr>
                                        @endforeach
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
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <?php $param = 1;?>
                                    <?php $total = 0;?>
                                    <?php $harga = 0;?>
                                    @foreach ($details as $data)
                                        <?php $harga = $harga + $data->harga;?>
                                        @if ($param < count($details))
                                            <?php $param = $param + 1;?>
                                            <?php $total = $total + $data->kuantitas;?>
                                        @else
                                            <?php $total = $total + $data->kuantitas;?>
                                            <label for="grouping"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Pesanan ({{$total}})</label>
                                        @endif
                                    @endforeach
                                    <div class="flex">
                                        <input type="text" id="grouping" readonly value="@currency($harga)"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="grouping" required>
                                    </div>
                                </div>
                                {{-- <input type="text" id="address-input" placeholder="Enter your address"> --}}
                            </div>

                            <hr>

                            <div class="grid gap-4 grid-cols-3">
                                <div class="mb-6">
                                    <div class="mb-2" style="display: flex; justify-content: space-between;">
                                        <p>
                                            SubTotal :
                                        </p>
                                        <p id="subtotal">
                                        </p>
                                    </div>
                                    <div class="mb-2" style="display: flex; justify-content: space-between;">
                                        <p>
                                            Tax :
                                        </p>
                                        <p id="taxtotal">
                                        </p>
                                    </div>
                                    <div class="mb-4">
                                        <p>
                                            Discount
                                        </p>
                                        <div class="my-2 w-100 d-flex justify-content-between">
                                            <div class="input-group w-50">
                                                <input type="text" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                                                <label class="input-group-text bg-success text-white">%</label>
                                                <label class="input-group-text">Rp.</label>
                                            </div>
                                            <p>
                                                Rp 0,00
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mb-2" style="display: flex; justify-content: space-between;">
                                        <strong>
                                            Total :
                                        </strong>
                                        <p id="totalammount">
                                            Rp 0,00
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <input type="text" id="v_total" readonly
                                            class="bg-gray-50 d-none border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="" name="v_total" required>
                            <div class="flex items-center gap-4">
                                <button type="button" onclick="confirmDeletion()"
                                        class="text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-700 dark:border-blue-700">
                                    Checkout
                                </button>
                                <a type="button" href="/chart"
                                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
var inputs = document.getElementsByTagName('input');
var subtotal = 0;
var taxtotal = 0;
var totalammount = 0;
for(var x = 0; x < inputs.length; x++) {
    if(inputs[x].type == 'number' && inputs[x].id == 'ammount'){
        subtotal = subtotal + parseInt(inputs[x].value);
    }
    if(inputs[x].type == 'number' && inputs[x].id == 'taxinput'){
        taxtotal += parseInt(inputs[x].value)
    }
}
var totalammount = subtotal+taxtotal;
var formattedCurrency = subtotal.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
var formattedCurrency2 = taxtotal.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
var formattedCurrency3 = totalammount.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
$('#subtotal').text(formattedCurrency);
$('#taxtotal').text(formattedCurrency2);
$('#totalammount').text(formattedCurrency3);
$('#v_total').val(totalammount);
var autocomplete = new google.maps.places.Autocomplete(document.getElementById('address-input'));
autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();
    console.log(place); // do something with the place information
});
</script>
<script>
    function confirmDeletion() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Make the order",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("form-checkout").submit();
            }
        })
    }
</script>
