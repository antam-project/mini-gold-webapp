<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesanan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto relative">
                        <form method="post" class="mt-6 space-y-6" action="{{route('admin.product.add')}}">
                            <div class="overflow-x-auto relative">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-6" id="datatables-user">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            No
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Tanggal Beli
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Request Kirim
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Alamat
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Pesan
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Total Belanja
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Status Trx
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Option
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order as $order)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 pl-6 text-center">
                                                    <div class="d-flex">
                                                        <h5
                                                        {{-- style="font-weight: bold;" --}}
                                                        >
                                                            {{$order->nomor}}
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td class="py-4">
                                                    <div class="d-flex">
                                                        <h5
                                                        {{-- style="font-weight: bold;" --}}
                                                        >
                                                            {{$order->tanggal_transaksi}}
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td class="py-4">
                                                    <div class="d-flex">
                                                        <h5
                                                        {{-- style="font-weight: bold;" --}}
                                                        >
                                                            {{$order->tanngal_sampai}}
                                                        </h5>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    name="grouping" readonly>{{$order->alamat_tujuan}}</textarea>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    name="grouping" readonly>{{$order->message}}</textarea>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <h5 style="font-weight: bold;">
                                                            @currency($order->jumlahtrx)
                                                    </h5>
                                                </td>
                                                <td class="py-4 px-6">
                                                    @if ($order->status == "0")
                                                        <span class="badge bg-primary">Dikemas</span>
                                                    @elseif ($order->status == "1")
                                                        <span class="badge bg-secondary">Dalam Perjalanan</span>
                                                    @else
                                                        <span class="badge bg-succes">Pesanan Telah Sampai</span>
                                                    @endif
                                                </td>
                                                <td class="py-4 px-6">
                                                    <div class="btn-group" role="group">
                                                        {{-- @if ($order->status == "0")
                                                            <a href="/invoice-details/{{$order->id}}" type="button" class="btn btn-outline-dark" title="Lihat Detail">
                                                                <i class="fa-solid fa-bars"></i>
                                                            </a>
                                                            <a type="button" class="btn btn-outline-dark" title="Batalkan Pesanan">
                                                                <i class="fa-solid fa-x"></i>
                                                            </a>
                                                        @elseif ($order->status == "1")
                                                            <a href="/invoice-details/{{$order->id}}" type="button" class="btn btn-outline-dark" title="Lihat Detail">
                                                                <i class="fa-solid fa-bars"></i>
                                                            </a>
                                                            <a  type="button" class="btn btn-outline-dark" title="Konfirmasi Pembayaran">
                                                                <i class="fa-regular fa-paper-plane"></i>
                                                            </a>
                                                        @else
                                                            <a href="/invoice-details/{{$order->id}}" type="button" class="btn btn-outline-dark" title="Lihat Detail">
                                                                <i class="fa-solid fa-bars"></i>
                                                            </a>
                                                            <a type="button" class="btn btn-outline-dark" title="Batalkan Pesanan">
                                                                <i class="fa-solid fa-x"></i>
                                                            </a>
                                                        @endif --}}
                                                        <a href="/invoice-details/{{$order->id}}" type="button" class="btn btn-outline-dark" title="Lihat Detail">
                                                            <i class="fa-solid fa-bars"></i>
                                                        </a>
                                                        <a type="button" class="btn btn-outline-succes" title="Pesanan Diterima">
                                                            <i class="fa-solid fa-x"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-2 d-flex justify-content-end">
                                    {{-- <a href="{{route('chart.new')}}" class="btn btn-outline-success">
                                       Checkout
                                    </a> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- <script>
    $("#quantity").on("input", function() {
        var jumlah = 0;
        var inputs = document.getElementsByTagName('input');
        for(var x = 0; x < inputs.length; x++) {
            if(inputs[x].type == 'text' && inputs[x].id == 'hargaasli'){
                inputs[x].value = inputs[x].value * this.value;
                jumlah += parseInt(inputs[x].value);
            }
        }
        console.log(jumlah);
    });
</script> --}}
<script>
    function changeQuantity(id, quantity) {
        console.log('test');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:"{{ url('/chart/update') }}" +"/"+ id+"/"+quantity,
            data:{},
            success:function(data){
                    if($.isEmptyObject(data.error)){
                        window.location.reload();
                    }else{
                        console.log('error');
                    }
            }
        });
    }
</script>
<script type="text/javascript">
    function deleteConfirmation(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:"{{ url('/chart/delete') }}" +"/"+ id,
                    data:{},
                    success:function(data){
                            if($.isEmptyObject(data.error)){
                                window.location.reload();
                            }else{
                                console.log('error');
                            }
                    }
                });
            }
        })
    }
</script>
