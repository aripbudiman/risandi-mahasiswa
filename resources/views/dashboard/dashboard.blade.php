@extends('layouts.dashboard')
@section('content-dashboard')
<div class="w-full bg-gray-100 pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <div class="flex flex-wrap gap-x-10 gap-y-12 bg-gray-100 px-4 py-10 lg:px-10">
        <div class="flex w-72">
            <div
                class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                <div class="p-3">
                    <div
                        class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-gray-700 to-gray-400 text-center text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-4 h-7 w-16" width="16" height="16"
                            fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
                            <path
                                d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z" />
                        </svg>
                    </div>
                    <div class="pt-1 text-right">
                        <p class="text-sm font-light capitalize">Barang</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $product }}</h4>
                    </div>
                </div>
                <hr class="opacity-50" />
                <div class="p-4">
                    <p class="font-light"><span class="text-sm font-bold text-green-600">+22% </span>vs last month</p>
                </div>
            </div>
        </div>
        <div class="flex w-72">
            <div
                class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                <div class="p-3">
                    <div
                        class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-blue-700 to-blue-500 text-center text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-4 h-7 w-16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="pt-1 text-right">
                        <p class="text-sm font-light capitalize">Users</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $user }}</h4>
                    </div>
                </div>
                <hr class="opacity-50" />
                <div class="p-4">
                    <p class="font-light"><span class="text-sm font-bold text-green-600">+3% </span>vs last month</p>
                </div>
            </div>
        </div>
        <div class="flex w-72">
            <div
                class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                <div class="p-3">
                    <div
                        class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-emerald-700 to-emerald-500 text-center text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-4 h-7 w-16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="pt-1 text-right">
                        <p class="text-sm font-light capitalize">Sales</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">
                            Rp {{ number_format($sales,0,',','.') }}</h4>
                    </div>
                </div>
                <hr class="opacity-50" />
                <div class="p-4">
                    <p class="font-light"><span class="text-sm font-bold text-red-600">-3% </span>vs last month</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap gap-x-10 gap-y-12 bg-gray-100 px-4 py-10 lg:px-10">
        <div class="flex w-72">
            <div
                class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                <div class="p-3">
                    <div
                        class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-teal-700 to-teal-400 text-center text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-16 mt-4" width="16" height="16"
                            fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </div>
                    <div class="pt-1 text-right">
                        <p class="text-sm font-light capitalize">Order</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $order }}</h4>
                    </div>
                </div>
                <hr class="opacity-50" />
                <div class="p-4">
                    <p class="font-light"><span class="text-sm font-bold text-green-600">+22% </span>vs last month</p>
                </div>
            </div>
        </div>
        <div class="flex w-72">
            <div
                class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                <div class="p-3">
                    <div
                        class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-rose-700 to-rose-500 text-center text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-16 mt-4" width="16" height="16"
                            fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                            <path
                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                    <div class="pt-1 text-right">
                        <p class="text-sm font-light capitalize">Sedang Dikirim</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $dikirim }}</h4>
                    </div>
                </div>
                <hr class="opacity-50" />
                <div class="p-4">
                    <p class="font-light"><span class="text-sm font-bold text-green-600">+3% </span>vs last month</p>
                </div>
            </div>
        </div>
        <div class="flex w-72">
            <div
                class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                <div class="p-3">
                    <div
                        class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-violet-700 to-violet-500 text-center text-white shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-16 mt-4" width="16" height="16"
                            fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                    </div>
                    <div class="pt-1 text-right">
                        <p class="text-sm font-light capitalize">Sampai</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">
                            {{ $sampai }}</h4>
                    </div>
                </div>
                <hr class="opacity-50" />
                <div class="p-4">
                    <p class="font-light"><span class="text-sm font-bold text-red-600">-3% </span>vs last month</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
