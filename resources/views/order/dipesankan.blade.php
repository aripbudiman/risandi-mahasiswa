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
                            diproses
                        </span>
                    </div>
                </div>
                <div class="w-full">
                    <p class="text-biru cursor-pointer">kode pembayaran {{ $item->kode }}</p>
                    <p class="font-semibold text-sm">Total Belanja</p>
                    <p class="font-semibold text-sm">Rp{{ number_format($item->total_bayar,0,',','.') }}</p>
                </div>

            </div>
        </div>
        <a class="hs-tooltip-toggle block text-center" href="javascript:;">
            <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible hidden opacity-0 transition-opacity inline-block absolute invisible z-10 max-w-xs bg-gray-100 border border-gray-100 text-left rounded-lg shadow-md justify-center"
                role="tooltip">
                <span class="pt-3 px-4 block text-lg font-bold text-gray-800 dark:text-white">Detail Pesanan</span>
                <div class="py-3 px-4 text-sm text-gray-600 dark:text-gray-400 w-full">
                    <p class="text-xl flex flex-col justify-center items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <span class="text-hijau font-semibold">Dipacking</span>
                    </p>
                    <dl class="mt-3">
                        <dt class="font-bold pt-3 first:pt-0 dark:text-white">Detail Product:</dt>
                        @foreach ($item->details as $data)
                        <dd class="text-gray-600 dark:text-gray-400">{{ $data->product->name }}
                            <span class="ml-5">{{ $data->qty }} qty</span></dd>
                        @endforeach
                    </dl>
                    <p class="italic text-sm text-biru text-center mt-5">Pesanan anda sedang diproses / dipacking</p>
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
