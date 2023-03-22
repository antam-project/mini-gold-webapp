<x-app-admin-layout>
    <x-slot name="header">
        <h2 class=" pl-64 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>
    <div class="ml-64 py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto relative">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Tambah Produk</h2>
                        </header>
                        <form method="post" class="mt-6 space-y-6" action="{{route('admin.product.add')}}">
                            @csrf
                            <div class="mb-6">
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

                            </div>
                            <div class="mb-6">
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
                            </div>
                            <div class="grid gap-4 grid-cols-2">
                                <div class="mb-6">
                                    <label for="quantity"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                                    <div class="flex">
                                        <input type="number" id="quantity"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="quantity" required>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="grouping"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengelompokan</label>
                                    <div class="flex">
                                        <input type="number" id="grouping"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" name="grouping" required>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <button type="submit"
                                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-admin-layout>
<script>
    var prices = @json($prices);

    function changeWeight() {
        let weight = document.getElementById("weight").value;
        let price1;
        let price2;
        let price3;
        for (let i = 0; i < prices.length; i++) {
            if (weight === prices[i].weight) {
                price1 = prices[i].price1;
                price2 = prices[i].price2;
                price3 = prices[i].price3;
                break;
            }
        }
        document.getElementById("price").value = formatNumber(price1);
        document.getElementById("helper-price").innerHTML = 'Harga terkini untuk emas dengan berat ' + weight + 'gram adalah Rp.' + formatNumber(price1);
    }

    $("input[data-type='currency']").on({
        keyup: function () {
            formatCurrency($(this));
        },
        blur: function () {
            formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }


    function formatCurrency(input, blur) {
        var input_val = input.val();
        if (input_val === "") {
            return;
        }
        var original_len = input_val.length;
        var caret_pos = input.prop("selectionStart");
        if (input_val.indexOf(",") >= 0) {
            var decimal_pos = input_val.indexOf(",");
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);
            left_side = formatNumber(left_side);
            right_side = formatNumber(right_side);
            if (blur === "blur") {
                right_side += "00";
            }
            right_side = right_side.substring(0, 2);
            input_val = "" + left_side + "," + right_side;

        } else {
            input_val = formatNumber(input_val);
            input_val = "" + input_val;
        }
        input.val(input_val);
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>
