@extends('app')

@section('content')



<div class="">
  <div class="mx-auto max-w-2xl py-2 px-4 sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">
    <!-- <h2 class="sr-only">Products</h2> -->
    <h1 class="text-center text-5xl font-bold text-[#1b1b1f] pb-10">
      Servicios
    </h1>

    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 xl:gap-x-8">

      {{ addServicios(ReadData('SERVICIOS'))}}

      <!-- <a href="#" class="flex flex-col items-center  border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100  ">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="/docs/images/blog/image-4.jpg" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions 2021</h5>
          <p class="mb-3 font-normal text-gray-700 ">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
        </div> -->
      </a>


    </div>
  </div>
</div>
@endsection