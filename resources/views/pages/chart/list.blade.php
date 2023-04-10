<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Keranjang') }}
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
                                            Product
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Quantity
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Price
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Option
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($groups))
                                            @foreach($groups as $group)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4">
                                                        <div class="d-flex">
                                                            <img width="100px" src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//93/MTA-3162972/antam_logam-mulia-1-gram_full03.jpg" alt="product image" />
                                                            <h5 class="pt-6" style="font-weight: bold;">
                                                                Mini Gold {{$group->berat}} gr
                                                            </h5>
                                                        </div>
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        <input type="number" id="quantity" onchange="changeQuantity({{$group->id}}, this.value)" value={{$group->kuantitas}} min="1"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="" name="grouping" >
                                                    </td>
                                                    <td >
                                                        <input type="text" id="harga" readonly value="@currency($group->harga)"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="" name="grouping" >
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        <button type="button" class="btn btn-outline-danger" onclick="deleteConfirmation({{$group->id}})">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-center py-4">
                                                    <p style="font-size: 30px;" class="mb-4">No items</p>
                                                    <a href="/" class="btn btn-outline-primary">
                                                        Go Shop
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="mt-2 d-flex justify-content-end">
                                    @foreach ($price as $price)
                                        <h2 class=" text-center mr-6 pt-2 font-semibold text-xl text-gray-800 leading-tight">
                                            Total : @currency($price->price)
                                        </h2>
                                    @endforeach
                                    @if (empty($groups))
                                    <button href="{{route('chart.new')}}" class="btn btn-outline-success"
                                        disabled
                                    >
                                       Checkout
                                    </button>
                                    @else
                                    <a href="{{route('chart.new')}}" class="btn btn-outline-success">
                                       Checkout
                                    </a>
                                    @endif
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
