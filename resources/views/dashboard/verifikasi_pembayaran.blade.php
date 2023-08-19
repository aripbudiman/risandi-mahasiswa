@extends('layouts.dashboard')
@section('content-dashboard')
@include('alert')
<div class="w-full bg-gray-100 pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <h1 class="text-3xl font-semibold text-gray-700">Verifikasi Pembayaran</h1>
    <div class="mt-6 overflow-hidden rounded-xl bg-white px-6 shadow lg:px-4">
        <table class="min-w-full border-collapse border-spacing-y-2 border-spacing-x-2">
            <thead class="hidden border-b lg:table-header-group">
                <tr class="">
                    <td class="whitespace-normal py-4 text-sm font-semibold text-gray-800 sm:px-3">
                        Order Date
                    </td>

                    <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">Order ID</td>
                    <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">Customer</td>
                    <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">Pengiriman</td>
                    <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">Pembayaran</td>

                    <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">Total Bayar</td>

                    <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">Status</td>
                    <td class="whitespace-normal py-4 text-sm font-medium text-gray-500 sm:px-3">Action</td>
                </tr>
            </thead>

            <tbody class="bg-white lg:border-gray-300">
                @forelse ($order as $item)
                <tr class="">
                    <td class="whitespace-no-wrap py-4 text-left text-sm text-gray-600 sm:px-3 lg:text-left">
                        {{ $item->created_at->format('d F Y') }}
                    </td>

                    <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-600 sm:px-3 lg:table-cell">
                        {{ $item->kode }}</td>

                    <td
                        class="whitespace-no-wrap hidden py-4 text-left text-sm text-gray-600 sm:px-3 lg:table-cell lg:text-left">
                        {{ $item->user->name }}</td>
                    <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-600 sm:px-3 lg:table-cell">
                        {{ $item->shipping }}</td>

                    <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-600 sm:px-3 lg:table-cell">
                        {{ $item->metode_pembayaran }}
                    </td>
                    <td
                        class="whitespace-no-wrap hidden py-4 text-left text-sm text-gray-600 sm:px-3 lg:table-cell lg:text-left">
                        Rp {{ number_format($item->total_bayar,0,',','.') }}</td>

                    <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-3 lg:table-cell">
                        <span
                            class="ml-2 mr-3 whitespace-nowrap rounded-full bg-purple-100 px-2 py-0.5 text-purple-800">
                            {{ $item->status }}</span>
                    </td>
                    <td class="whitespace-no-wrap hidden py-4 text-sm font-normal text-gray-500 sm:px-3 lg:table-cell">
                        <form action="{{ route('dashboard.verif_pembayaran',$item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition-all text-sm">
                                Verifikasi
                            </button>
                        </form>
                    </td>
                </tr>
                @empty

                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection
