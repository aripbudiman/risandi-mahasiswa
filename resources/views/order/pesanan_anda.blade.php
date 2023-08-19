@extends('layouts.main')
@section('main')
<div class="max-w-screen-md mx-auto">
    <div class="bg-gray-100 py-2 px-3">
        <nav class="flex flex-wrap gap-4">
            <a href="{{ route('pending') }}"
                class="{{ request()->routeIs('pending') ? 'text-purple-600 border-b-purple-600 font-semibold' : '' }} inline-flex whitespace-nowrap border-b-2 border-transparent py-2 px-3 text-sm font-medium text-gray-600 transition-all duration-200 ease-in-out hover:border-b-purple-600 hover:text-purple-600">
                Menunggu Pembayaran</a>

            <a href="{{ route('dibayar') }}"
                class="{{ request()->routeIs('dibayar') ? 'text-purple-600 border-b-purple-600 font-semibold' : '' }} inline-flex whitespace-nowrap border-b-2 border-transparent py-2 px-3 text-sm font-medium text-gray-600 transition-all duration-200 ease-in-out hover:border-b-purple-600 hover:text-purple-600">
                Dibayar</a>
            <a href="{{ route('dipesankan') }}"
                class="{{ request()->routeIs('dipesankan') ? 'text-purple-600 border-b-purple-600 font-semibold' : '' }} inline-flex whitespace-nowrap border-b-2 border-transparent py-2 px-3 text-sm font-medium text-gray-600 transition-all duration-200 ease-in-out hover:border-b-purple-600 hover:text-purple-600">
                Dipesankan</a>

            <a href="{{ route('dikirim') }}"
                class="{{ request()->routeIs('dikirim') ? 'text-purple-600 border-b-purple-600 font-semibold' : '' }} inline-flex whitespace-nowrap border-b-2 border-transparent py-2 px-3 text-sm font-medium text-gray-600 transition-all duration-200 ease-in-out hover:border-b-purple-600 hover:text-purple-600">
                Sedang dikirim</a>

            <a href="{{ route('diterima') }}"
                class="{{ request()->routeIs('diterima') ? 'text-purple-600 border-b-purple-600 font-semibold' : '' }} inline-flex whitespace-nowrap border-b-2 border-transparent py-2 px-3 text-sm font-medium text-gray-600 transition-all duration-200 ease-in-out hover:border-b-purple-600 hover:text-purple-600">
                Diterima </a>
        </nav>
    </div>
    @yield('pesanan_anda')

</div>

@endsection
