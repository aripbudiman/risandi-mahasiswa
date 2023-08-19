@extends('layouts.main')
@section('main')
<div class="bg-gray-100lg:py-5" id="load">

</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#load').load('load-keranjang')
    });

</script>
@endsection
