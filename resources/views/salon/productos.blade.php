@extends('app')

@section('content')
<div class="">
  <div class="mx-auto max-w-2xl py-2 px-4 sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">
    <!-- <h2 class="sr-only">Products</h2> -->
    <h1 class="text-center text-5xl font-bold text-[#1b1b1f] pb-10">
      Productos
    </h1>

    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

      {{ addProductos(ReadData("PRODUCTOS")) }}

    </div>
  </div>
</div>

@endsection