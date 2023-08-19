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
                            class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-green-100 text-green-800">Pembayaran
                            Berhasil</span>
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
                <span class="pt-3 px-4 block text-lg font-bold text-gray-800 dark:text-white">Detail Pembayaran</span>
                <div class="py-3 px-4 text-sm text-gray-600 dark:text-gray-400 w-full">
                    <p class="text-xl flex flex-col justify-center items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                        </svg>
                        <span class="text-hijau font-semibold">Sukses</span>
                    </p>
                    <p class="text-xl text-center"><span class="text-gray-800">Rp
                            {{ number_format($item->total_bayar,0,',','.') }}</span></p>
                    <dl class="mt-3">
                        <dt class="font-bold pt-3 first:pt-0 dark:text-white">Detail Product:</dt>
                        @foreach ($item->details as $data)
                        <dd class="text-gray-600 dark:text-gray-400">{{ $data->product->name }}
                            <span class="ml-5">{{ $data->qty }} qty</span></dd>
                        @endforeach
                    </dl>
                    <p class="italic text-sm text-biru text-center mt-5">Menunggu verifikasi dari admin </p>
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
