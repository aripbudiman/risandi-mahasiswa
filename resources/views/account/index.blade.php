@extends('layouts.dashboard')
@section('content-dashboard')
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <header>
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">{{ $title }}</h1>
    </header>
    <div>
        <div class="max-w-screen-lg px-4 py-8 sm:px-8">
            <div class="overflow-y-hidden rounded-lg border">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="bg-gray-800 text-left text-xs font-semibold uppercase tracking-widest text-white">
                                <th class="px-5 py-3">Id</th>
                                <th class="px-5 py-3">Name</th>
                                <th class="px-5 py-3">Email</th>
                                <th class="px-5 py-3">Address</th>
                                <th class="px-5 py-3">Role</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-500">
                            @php
                            $no=1;
                            @endphp
                            @foreach ($user as $item)
                            <tr>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $no++ }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $item->name }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $item->email }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $item->address }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{ $item->role }}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
