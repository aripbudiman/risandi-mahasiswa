@extends('layouts.main')
@section('main')

@if (Session::get('error'))
<script>
    alert('Belum ada barang yg dipilih, silahkan pilih barang terlebih dahulu')

</script>
@endif
@include('alert')
<div id="hero-section" class="h-[600px] bg-no-repeat bg-right bg-sky-500/30" style="background-image: url('/hero.png')">
    <div class="w-full lg:max-w-7xl mx-auto flex items-center h-full">
        <div class="grid lg:grid-cols-2 gap-5 m-5 content-center">
            <div class="branding">
                <h1 class="text-5xl font-poppins lg:text-7xl font-bold text-hijau">Sparepart Motor Terbaik.
                </h1>
                <p class="text-md lg:text-xl mt-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta
                    voluptate
                    cupiditate architecto
                    quidem veritatis? Tempore earum fugiat officia quas odio.</p>
                <a href="{{ route('register') }}"
                    class="mt-10 py-3 text-sm px-4 inline-flex w-36 lg:w-44 justify-center items-center gap-2 rounded-full border border-transparent font-semibold bg-hijau text-white hover:bg-gray-900  transition-all lg:text-lg">
                    Daftar
                </a>
            </div>
        </div>
    </div>
</div>
<div id="card-jenis" class="mt-24 max-w-6xl mx-auto">
    <h1 class="text-3xl text-coklat font-bold m-5">Choose By Brand</h1>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            <a class="group flex flex-col bg-gray-100 border hover:border-gray-900 shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800"
                href="#">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="{{ asset('/asset/ktc-logo.jpg') }}"
                                alt="Image Description">
                            <div class="ml-3">
                                <h3
                                    class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                    KTC
                                </h3>
                            </div>
                        </div>
                        <div class="pl-3">
                            <svg class="w-3.5 h-3.5 text-gray-500" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
            <a class="group flex flex-col bg-gray-100 border hover:border-gray-900 shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800"
                href="#">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="{{ asset('/asset/yss-logo.jpg') }}"
                                alt="Image Description">
                            <div class="ml-3">
                                <h3
                                    class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                    YSS
                                </h3>
                            </div>
                        </div>
                        <div class="pl-3">
                            <svg class="w-3.5 h-3.5 text-gray-500" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
            <a class="group flex flex-col bg-gray-100 border hover:border-gray-900 shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800"
                href="#">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img class="h-[2.375rem] w-[2.375rem] rounded-full"
                                src="{{ asset('/asset/rideit-logo.png') }}" alt="Image Description">
                            <div class="ml-3">
                                <h3
                                    class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                    RIDEIT
                                </h3>
                            </div>
                        </div>
                        <div class="pl-3">
                            <svg class="w-3.5 h-3.5 text-gray-500" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="w-full lg:max-w-6xl mx-auto">
    <h1 class="text-xl lg:text-3xl text-coklat font-bold m-5">Todays Best Deals For You!</h1>
    <div class="grid lg:gap-6 lg:grid-cols-3 w-full justify-center lg:px-10">
        @foreach ($product as $item)
        <div
            class="group border-gray-100/30 my-5 flex w-full flex-col self-center overflow-hidden rounded-lg border bg-gray-200 shadow-md">
            <a class="relative w-[300px] mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                <img class="peer absolute top-0 right-0 h-full w-full object-cover"
                    src="{{ asset(str_replace('public','storage',$item->foto)) }}" alt="product image" />
                <svg class="group-hover:animate-ping group-hover:opacity-30 peer-hover:opacity-0 pointer-events-none absolute inset-x-0 bottom-5 mx-auto text-3xl text-white transition-opacity"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                    <path fill="currentColor"
                        d="M2 10a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4v10a4 4 0 0 1-2.328 3.635a2.996 2.996 0 0 0-.55-.756l-8-8A3 3 0 0 0 14 17v7H6a4 4 0 0 1-4-4V10Zm14 19a1 1 0 0 0 1.8.6l2.7-3.6H25a1 1 0 0 0 .707-1.707l-8-8A1 1 0 0 0 16 17v12Z" />
                </svg>
            </a>
            <div class="mt-4 px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl tracking-tight text-gray-900">{{ $item->name }}</h5>
                    <h6 class="text-sm tracking-tight text-biru">{{ $item->jenis->name }}</h6>
                </a>
                <div class="mt-2 mb-5 flex items-center justify-between">
                    <p>
                        <span class="text-3xl font-bold text-gray-900">Rp
                            {{ number_format($item->harga,0,',','.') }}</span>
                    </p>
                </div>
                <form action="{{ route('add_cart',$item->id) }}" method="post" class="inline w-full">
                    @csrf
                    <button type="submit"
                        class="hover:border-white/40 w-full flex items-center justify-center rounded-md border border-transparent bg-hijau px-5 py-2.5 hover:bg-gray-900 text-center text-sm font-medium text-white focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Add to cart</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
