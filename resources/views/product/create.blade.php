@extends('layouts.dashboard')
@section('content-dashboard')
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:pl-72">
    <header>
        <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">{{ $title }}</h1>
    </header>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="mt-10">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="lg:max-w-lg w-full mb-3">
                <label for="name" class="block text-sm font-medium mb-2 dark:text-white">Nama Barang</label>
                <input type="text" name="name"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-gray-500 focus:ring-gray-500">
            </div>
            <div class="lg:max-w-lg w-full mb-3">
                <label for="hs-select-label" class="block text-sm font-medium mb-2 dark:text-white">Jenis</label>
                <select name="jenis_id"
                    class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-gray-500 focus:ring-gray-500">
                    @foreach ($jenis as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="lg:max-w-lg w-full mb-3">
                <label for="harga" class="block text-sm font-medium mb-2 dark:text-white">Harga</label>
                <input type="text" name="harga"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-gray-500 focus:ring-gray-500">
            </div>
            <div class="lg:max-w-lg w-full mb-3">
                <label for="foto" class="block text-sm font-medium mb-2 dark:text-white">Foto</label>
                <label for="foto" class="sr-only">Choose file</label>
                <input type="file" name="foto" id="foto" class="block w-full border bg-white border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-gray-500 focus:ring-gray-500
    file:bg-transparent file:border-0
    file:bg-gray-100 file:mr-4
    file:py-3 file:px-4">
            </div>
            <div class="lg:max-w-lg w-full mb-3">
                <button type="submit"
                    class="py-3 w-full px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition-all text-sm">
                    Submit
                </button>
            </div>

        </form>
    </div>
</div>
<script>
</script>
@endsection
