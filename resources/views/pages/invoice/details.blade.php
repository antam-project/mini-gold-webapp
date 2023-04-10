<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Invoice') }}
        </h2>
    </x-slot>
    @foreach ($details as $detail)
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto relative">
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
                                    <div class="d-flex mb-5" style="width: 80%;">
                                        <label for="quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 30%">Address</label>
                                        <h5>{{$detail->alamat_tujuan}}</h5>
                                    </div>
                                    <div class="d-flex mb-5" style="width: 80%;">
                                        <label for="quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 30%">Reciever</label>
                                        <h5>{{$detail->vendor}}</h5>
                                    </div>
                                    <div class="d-flex mb-5" style="width: 80%;">
                                        <label for="quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 30%">Tanggal Invoice</label>
                                        <h5>{{$detail->tanggal_transaksi}}</h5>
                                    </div>
                                    <div class="d-flex mb-5" style="width: 80%;">
                                        <label for="quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 30%">Permintaan Kirim</label>
                                        <h5>{{$detail->tanngal_sampai}}</h5>
                                    </div>
                                    <div class="d-flex mb-5" style="width: 80%;">
                                        <label for="quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 30%">Pesan</label>
                                        <h5>{{$detail->message}}</h5>
                                    </div>
                                    <div class="d-flex mb-5" style="width: 80%;">
                                        <label for="quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 30%">Total Transaksi</label>
                                        <h5>@currency($detail->jumlahtrx)</h5>
                                    </div>
                                    <div class="d-flex mb-5" style="width: 80%;">
                                        <label for="quantity"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="width: 30%">Status Invoice</label>
                                        @if ($detail->status == "0")
                                            <h5>Menunggu Konfirmasi</h5>
                                        @elseif ($detail->status == "1")
                                            <h5>Terkonfirmasi</h5>
                                        @else
                                            <h5>Pesanan Dibatalkan</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="">
                                    <img src="{{ asset('storage/'.$detail->qrcode) }}">
                                    {{-- <label for="grouping"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengelompokan</label>
                                    <div class="flex">
                                        <input type="text" id="grouping"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="vendor" required>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="overflow-x-auto relative mb-6">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-6 table table-striped" id="datatables-user">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Units
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Description
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Quantity
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Product Price
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
                                        @foreach ($rinci as $rinci)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-6">
                                                    <div class="d-flex">
                                                        <h5
                                                        {{-- style="font-weight: bold;" --}}
                                                        >
                                                            {{$rinci->unit}}
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <div class="d-flex">
                                                        <h5
                                                        {{-- style="font-weight: bold;" --}}
                                                        >
                                                            {{$rinci->description}}
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <div class="d-flex">
                                                        <h5
                                                        {{-- style="font-weight: bold;" --}}
                                                        >
                                                            {{$rinci->quantity}}
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <div class="d-flex">
                                                        <h5
                                                        {{-- style="font-weight: bold;" --}}
                                                        >
                                                            @currency($rinci->v_product)
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <div class="d-flex">
                                                        <h5
                                                        {{-- style="font-weight: bold;" --}}
                                                        >
                                                            @currency($rinci->v_tax)
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <div class="d-flex">
                                                        <h5
                                                        {{-- style="font-weight: bold;" --}}
                                                        >
                                                            @currency($rinci->v_total)
                                                        </h5>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-2">
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="button" onclick="confirmDeletion()"
                                        class="text-white bg-blue-800 hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-700 dark:border-blue-700">
                                    Download Invoice
                                </button>
                                <a type="button" href="{{ url()->previous() }}"
                                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                    Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
