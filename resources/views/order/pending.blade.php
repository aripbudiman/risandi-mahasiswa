@extends('order.pesanan_anda')
@section('pesanan_anda')
<div class="grid lg:grid-rows-2 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-2 my-2 mx-2 gap-4 sm:gap-6">
    @forelse ($pesanan as $item)
    <div
        class="hs-tooltip inline-block [--trigger:click] group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition ">
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
                            class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Menunggu
                            pembayaran</span>
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
                            class="bi bi-bank" viewBox="0 0 16 16">
                            <path
                                d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z" />
                        </svg>
                        <p class="text-sm text-center">no rekening:</p>
                        <p class="text-biru font-semibold text-xl text-center">132456783940</p>
                        <p class="text-xl text-center"><span class="text-gray-800">Rp
                                {{ number_format($item->total_bayar,0,',','.') }}</span></p>
                    </p>
                    <dl class="mt-3">
                        <dt class="font-bold pt-3 first:pt-0 dark:text-white">Detail Product:</dt>
                        @foreach ($item->details as $data)
                        <dd class="text-gray-600 dark:text-gray-400">{{ $data->product->name }}
                            <span class="ml-5">{{ $data->qty }} qty</span></dd>
                        @endforeach
                    </dl>
                    <p class="italic text-sm text-center mt-5">klik sudah dibayar apabila anda telah membayarnya</p>
                </div>
                <form action="{{ route('order.update',$item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="hover:text-biru text-center w-full py-5 justify-center items-center">
                        Sudah dibayar
                    </button>
                </form>
            </div>
        </a>
    </div>

    @empty
    <div class="h-40">

    </div>
    @endforelse
</div>
@endsection
