@extends('layouts.dashboard')
@section('content-dashboard')
<div class="w-full bg-gray-100 pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <h1 class="text-3xl font-semibold text-gray-700 mb-2">Paking Paket</h1>
    {{-- <div class="bg-white rounded-lg shadow-lg px-3 py-4">
        <div class="grid grid-cols-2 text-gray-900 w-[250px]">
            <div>
                <p class="font-semibold">Customer</p>
                <p class="font-semibold">No Hp</p>
                <p class="font-semibold">Alamat</p>
            </div>
            <div>
                <p>:{{ $order[0]->user->name }}</p>
    <p>:{{ $order[0]->user->phone_number }}</p>
    <p>:{{ $order[0]->user->address }}</p>
</div>
</div>
</div> --}}
<div class="w-full">
    <div class="w-full px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
        <div class="w-full flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-gray-800">
            <div class="grid grid-cols-2 text-gray-900 w-1/3">
                <div>
                    <p class="font-semibold">Pengirim</p>
                    <p class="font-semibold">Penerima</p>
                    <p class="font-semibold">No Hp</p>
                    <p class="font-semibold">Alamat</p>
                </div>
                <div>
                    <p>:Sparepart</p>
                    <p>:{{ $order[0]->user->name }}</p>
                    <p>:{{ $order[0]->user->phone_number }}</p>
                    <p>:{{ $order[0]->user->address }}</p>
                </div>
            </div>
            <div class="w-1/2 mb-3">
                <p class="font-semibold">Deskripsi dan alamat Pengiriman:</p>
                {{ $order[0]->deskripsi_pengiriman }}
                <p class="font-semibold">Product:</p>
                <div class="grid grid-cols-2 gap-3">
                    @forelse ($order[0]->details as $item)
                    <a class="group fle mx-2 flex-col bg-gray-100 border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800"
                        href="#">
                        <div class="p-4 md:p-5">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <img class="h-[2.375rem] w-[2.375rem] rounded-full"
                                        src="{{ asset(str_replace('public/','storage/',$item->product->foto)) }}"
                                        alt="Image Description">
                                    <div class="ml-3">
                                        <h3
                                            class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            {{ $item->product->name }}
                                        </h3>
                                        <h3
                                            class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                            {{ $item->qty }} Qty
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty

                    @endforelse
                </div>
            </div>
            <div class="grid grid-cols-2 text-gray-900 w-1/3">
                <div>
                    <p class="font-semibold">Pembayaran</p>
                    <p class="font-semibold">Nominal</p>
                </div>
                <div>
                    <p>:{{ $order[0]->metode_pembayaran }}</p>
                    <p>:Rp {{ number_format($order[0]->total_bayar,0,',','.') }}</p>
                </div>
            </div>
            <form action="{{ route('dashboard.kirim_paket',$order[0]->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="w-1/3 mb-3">
                    <label for="no-resi" class="font-bold">No Resi</label>
                    <input type="text" id="no-resi" name="no_resi"
                        class="@error('no_resi')
                            border-red-500
                        @enderror py-3 px-4 block w-full border-gray-700 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                </div>
                @error('no_resi')
                <p class="text-red-500">{{$message}}</p>
                @enderror
                <div class="w-1/3">
                    <button type="submit"
                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition-all text-sm">
                        Kirim Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
