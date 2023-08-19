<div class="mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mx-auto mt-8 max-w-2xl md:mt-12">
        <div class="bg-gray-50 shadow">
            <form action="{{ route('cart.store') }}" method="post">
                @csrf
                <div class="px-4 py-6 sm:px-8 sm:py-10">
                    <div class="flow-root">
                        <ul class="-my-8">
                            @php
                            $grandTotal=0;
                            @endphp
                            @forelse ($cart as $item)
                            <li class="flex flex-col space-y-3 py-6 text-left sm:flex-row sm:space-x-5 sm:space-y-0">
                                <div class="shrink-0">
                                    <img class="h-24 w-24 max-w-full rounded-lg border object-cover"
                                        src="{{ asset(str_replace('public','storage',$item->product[0]->foto)) }}"
                                        alt="" />
                                </div>

                                <div class="relative flex flex-1 flex-col justify-between">
                                    <div class="sm:col-gap-5 sm:grid sm:grid-cols-2">
                                        <div class="pr-8 sm:pr-5">
                                            <p class="text-base font-semibold text-gray-900">
                                                {{ $item->product[0]->name }}</p>
                                            <p class="mx-0 mt-1 mb-0 text-sm text-gray-400">
                                                {{ $item->product[0]->jenis->name }}</p>
                                        </div>
                                        @php
                                        $total=$item->product[0]->harga * $item->qty;
                                        $grandTotal+=$total;
                                        @endphp
                                        <div
                                            class="mt-4 flex items-end justify-between sm:mt-0 sm:items-start sm:justify-end">
                                            <p
                                                class="shrink-0 w-28 text-base font-semibold text-gray-900 sm:order-2 sm:ml-8 sm:text-right">
                                                Rp {{ number_format($total,0,',','.') }}
                                            </p>

                                            <div class="sm:order-1">
                                                <div class="mx-auto flex h-8 items-stretch text-gray-600">
                                                    <button type="button" onclick="kurang_qty(`{{$item->id}}`)"
                                                        class="flex h-full items-center justify-center rounded-l-md bg-gray-200 px-4 transition hover:bg-black hover:text-white">-</button>
                                                    <div
                                                        class="flex w-full items-center justify-center bg-gray-100 px-4 text-xs uppercase transition">
                                                        {{ $item->qty }}</div>
                                                    <input type="hidden" name="qty[]" value="{{ $item->qty }}">
                                                    <input type="hidden" name="product_id[]"
                                                        value="{{ $item->product[0]->id }}">
                                                    <input type="hidden" name="keranjang_id[]" value="{{ $item->id }}">
                                                    <button type="button" onclick="tambah_qty(`{{$item->id}}`)"
                                                        class="flex h-full items-center justify-center rounded-r-md bg-gray-200 px-4 transition hover:bg-black hover:text-white">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute top-0 right-0 flex sm:bottom-0 sm:top-auto">
                                        <button type="button" onclick="delete_item(`{{$item->id}}`)"
                                            class="flex rounded p-2 text-center text-gray-500 transition-all duration-200 ease-in-out focus:shadow hover:text-gray-900">
                                            <svg class="block h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" class=""></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            @empty

                            @endforelse
                        </ul>
                    </div>

                    <div class="mt-6 border-t border-b py-2">
                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-400">Subtotal</p>
                            <p id="subtotal" class="text-lg font-semibold text-gray-900">Rp
                                {{ number_format($grandTotal,0,',','.') }}
                            </p>
                        </div>

                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-400">Shipping</p>
                            <div class="flex gap-x-6">
                                <div class="flex">
                                    <input type="radio" name="shipping"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500"
                                        id="shipping-1" value="8000,'JNE'" checked>
                                    <label for="shipping-1"
                                        class="text-sm text-gray-500 ml-2 dark:text-gray-400">JNE</label>
                                </div>
                                <div class="flex">
                                    <input type="radio" name="shipping"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500"
                                        id="shipping-2" value="12000,'JNT'">
                                    <label for="shipping-2"
                                        class="text-sm text-gray-500 ml-2 dark:text-gray-400">JNT</label>
                                </div>
                                <div class="flex">
                                    <input type="radio" name="shipping"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500"
                                        id="shipping-3" value="10000,'Sicepat'">
                                    <label for="shipping-3"
                                        class="text-sm text-gray-500 ml-2 dark:text-gray-400">Sicepat</label>
                                </div>
                            </div>
                            <p id="nominal-shipping" class="text-lg font-semibold text-gray-900">Rp 8000</p>
                        </div>
                    </div>
                    <div class="mt-6 border-b py-2">
                        <p class="text-sm text-gray-400">Payment Method</p>
                        <div class="grid sm:grid-cols-2 gap-2">
                            <label for="TF"
                                class="flex p-3 block w-full bg-white border border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                <input type="radio" name="metode_pembayaran"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 pointer-events-none focus:ring-blue-500"
                                    id="TF" value="Transfer" checked>
                                <span class="text-sm text-gray-500 ml-3 dark:text-gray-400">Transfer Bank</span>
                            </label>

                            <label for="cod"
                                class="flex p-3 block w-full bg-white border border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                <input type="radio" name="metode_pembayaran"
                                    class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 pointer-events-none focus:ring-blue-500"
                                    id="cod" value="COD">
                                <span class="text-sm text-gray-500 ml-3 dark:text-gray-400">COD</span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total</p>
                        <div id="grand-total"
                            class="text-2xl bg-transparent font-semibold text-gray-900 focus:border-none"></div>
                        <input type="hidden" name="total_bayar" id="total_bayar">
                    </div>
                    <div class="mt-6 ">
                        <p class="text-sm items-center mb-2 text-left font-medium text-biru cursor-pointer"
                            data-hs-overlay="#alamat">
                            <svg class="inline fill-biru" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg> Pilih alamat
                            pengiriman
                        </p>
                        <textarea id="address" name="deskripsi_pengiriman"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="kp inggris rt/rw ...." rows="3"></textarea>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="submit"
                            class="group inline-flex w-full items-center justify-center rounded-md bg-gray-900 px-6 py-4 text-lg font-semibold text-white transition-all duration-200 ease-in-out focus:shadow hover:bg-gray-800">
                            Checkout
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:ml-8 ml-4 h-6 w-6 transition-all"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal --}}
<div id="alamat"
    class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
    data-hs-overlay-keyboard="false">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white">
                    Pilih alamat pengiriman
                </h3>
                <button type="button"
                    class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                    data-hs-overlay="#alamat">
                    <span class="sr-only">Close</span>
                    <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                            fill="currentColor" />
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <div onclick="alamat(`{{ $cart[0]->user->address .','.$cart[0]->user->phone_number}}`)"
                    class="cursor-pointer hover:gray-100 bg-white border shadow-sm rounded-xl p-4 md:p-5">
                    <div class="flex items-center text-left border-b">
                        <svg class="inline fill-hijau" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <p class="ml-2 text-hijau">Gunakan alamat</p>
                    </div>
                    <p class="alamat-modal" id="alamat-modal">
                        {{ $cart[0]->user->address .','.$cart[0]->user->phone_number}}</p>
                </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                <button type="button"
                    class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                    data-hs-overlay="#alamat">
                    Close
                </button>
                <button type="button"
                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                    data-hs-overlay="#alamat">
                    Ok
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    let token = $("meta[name='csrf-token']").attr("content");
    $(document).ready(function () {
        change()
        grandTotal()
    });

    function change() {
        $('input[name="shipping"]').change(function () {
            let nominal = parseFloat($(this).val());
            $('#nominal-shipping').text("Rp " + nominal.toLocaleString('id-ID'));
        });
        $('input[name="shipping"]').change(function () {
            grandTotal()
        });
    }

    function grandTotal() {
        let subtotal = parseInt($('#subtotal').html().replace(/\D/g, ''));
        let shipping = parseInt($('#nominal-shipping').html().replace(/\D/g, ''));
        $('#grand-total').html(sum(subtotal, shipping).toLocaleString('id-ID'));
        $('#total_bayar').val(sum(subtotal, shipping))
    }

    function alamat(text) {
        $('#address').val(text)
    }

    function sum(a, b) {
        return a + b;
    }

    function tambah_qty(id) {
        $.ajax({
            type: "POST",
            url: "tambah_qty/" + id,
            data: {
                _token: token
            },
            dataType: "JSON",
            success: function (response) {
                grandTotal();
                $('#load').load('load-keranjang', function () {
                    change()
                    grandTotal();
                });
            }
        });
    }

    function kurang_qty(id) {
        $.ajax({
            type: "POST",
            url: "kurang_qty/" + id,
            data: {
                _token: token
            },
            dataType: "JSON",
            success: function (response) {
                grandTotal();
                $('#load').load('load-keranjang', function () {
                    change()
                    grandTotal();
                });
            }
        });
    }

    function delete_item(id) {
        $.ajax({
            type: "POST",
            url: "cart/" + id,
            data: {
                _token: token,
                _method: "DELETE"
            },
            dataType: "JSON",
            success: function (response) {
                grandTotal();
                $('#load').load('load-keranjang', function () {
                    change()
                    grandTotal();
                });
            }
        });
    }

</script>
