@extends('app')

@section('content')
<h1 class="text-center text-5xl font-bold text-[#1b1b1f] pt-8 pb-10">
  Agendar cita
</h1>
@if (session('success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
  {{ session('success') }}
</div>
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
  {{ $error }}
</div>
@endforeach
@endif

<div class=" mb-8 block  p-6 bg-white border border-gray-200 rounded-lg shadow ">
  <div x-show="tab==='programarCita'" class="my-8">
    <!-- Componente calendario -->
    <x-calendario :servicios="$servicios"></x-calendario>
  </div>
</div>

@endsection