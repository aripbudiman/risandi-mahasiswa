@extends('layouts.dashboard')
@section('content-dashboard')
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <header>
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">{{ $title }}</h1>
    </header>
    <div class="mt-10">
        <form action="{{ route('jenis.store') }}" method="post">
            @csrf
            <input type="text" name="name"
                class="py-3 px-4 block w-full lg:w-72 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500">
            <button type="submit"
                class="py-3 mt-5 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition-all text-sm ">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
