@extends('app')

@section('content')


<h1 class="text-center text-5xl font-bold text-[#1b1b1f] pt-8 pb-10">
  Trabajos realizados
</h1>

<!-- <div class="columns-4 gap-3 w-[1200px] mx-auto space-y-3 pb-28 sm:columns-2"> -->

<div class="columns-1 w-auto mx-[16px] space-y-3 pb-28 sm:columns-2 gap-3 md:columns-3 lg:columns-4">
  {{ addImg(ReadData("TRABAJOS")) }}
</div>

@endsection