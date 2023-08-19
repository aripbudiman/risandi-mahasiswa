@extends('order.pesanan_anda')
@section('pesanan_anda')
<div class="grid lg:grid-rows-2 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-2 my-2 mx-2 gap-4 sm:gap-6">
    @forelse ($pesanan as $item)
    <div
        class="hs-tooltip inline-block [--trigger:click] group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800">
        <div class="p-4 md:p-5">
            <div class="flex flex-col justify-between items-center">
                <div class="flex justify-between w-full border-b">
                    <div>
                        <h3
                            class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                            Belanja
                        </h3>
                        <p class="text-sm text-gray-500">
                            {{ $item->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <div>
                        <span
                            class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-100 text-green-800">Sedang
                            dikirim
                        </span>
                    </div>
                </div>
                <div class="w-full flex justify-between items-end">
                    <div>
                        <p class="text-biru cursor-pointer">kode pembayaran {{ $item->kode }}</p>
                        <p class="font-semibold text-sm">Total Belanja</p>
                        <p class="font-semibold text-sm">Rp{{ number_format($item->total_bayar,0,',','.') }}</p>
                    </div>
                    <form action="{{ route('pesanan',$item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-green-500 text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Diterima
                        </button>
                    </form>
                </div>

            </div>
        </div>
        <a class="hs-tooltip-toggle block text-center" href="javascript:;">
            <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible hidden opacity-0 transition-opacity inline-block absolute invisible z-10 max-w-xs bg-gray-100 border border-gray-100 text-left rounded-lg shadow-md justify-center"
                role="tooltip">
                <span class="pt-3 px-4 block text-lg font-bold text-gray-800 dark:text-white">Detail Pengiriman</span>
                <div class="py-3 px-4 text-sm text-gray-600 dark:text-gray-400 w-full">
                    <div class="w-full flex flex-col justify-center">
                        <p class="text-xl flex flex-col justify-center items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-truck" viewBox="0 0 16 16">
                                <path
                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg>
                            <span class="text-gray-800 text-center text-sm">No Resi:</span>
                            <span class="text-biru text-center text-xl uppercase">JX1893807263</span>
                            <span class="text-hijau font-semibold">Sedang Dikirim</span>
                        </p>
                    </div>
                    <dl class="mt-3">
                        <dt class="font-bold pt-3 first:pt-0 dark:text-white">Detail Product:</dt>
                        @foreach ($item->details as $data)
                        <dd class="text-gray-600 dark:text-gray-400">{{ $data->product->name }}
                            <span class="ml-5">{{ $data->qty }} qty</span></dd>
                        @endforeach
                    </dl>

                    <p class="italic text-sm text-biru text-center mt-5">Pesanan anda sedang dikirim</p>
                </div>
            </div>
        </a>
    </div>

    @empty
    <div class="h-40">

    </div>
    @endforelse
</div>
@endsection
