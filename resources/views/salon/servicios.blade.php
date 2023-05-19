@extends('app')

@section('content')

<div class="">
  <div class="mx-auto max-w-2xl py-2 px-4 sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">
    <h1 class="text-center text-5xl font-bold text-[#1b1b1f] pb-10">Servicios</h1>

    @role('admin')
    <!-- Solo visible para el admin -->
    <!-- //! Formulario para agregar servicios -->
    <div class=" mb-8 block  p-6 bg-white border border-gray-200 rounded-lg shadow ">
      <form id="form_servicios" class="" action="{{ route('servicios') }}" method="POST">
        @csrf
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Agregar nuevo servicio</h5>
          
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


        <div class="mb-6">
          <label for="servicio" name="servicio" class="block mb-2 text-sm font-medium text-gray-900 ">Servicio</label>
          <input type="text" name="servicio" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Servicio">
        </div>
        <div class="mb-6">
          <label for="duracion" name="duracion" class="block mb-2 text-sm font-medium text-gray-900 ">Duración</label>
          <input type="text" name="duracion" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="0 min">
        </div>
        <div class="mb-6">
          <label for="precio" name="precio" class="block mb-2 text-sm font-medium text-gray-900 ">Precio</label>
          <input type="text" name="precio" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="$0">
        </div>

        <div class="mb-6">
          <label for="imagen" name="imagen" class="block mb-2 text-sm font-medium text-gray-900 ">URL imagen</label>
          <input type="text" name="imagen" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Imagen">
        </div>

        <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full sm:w-auto ">Crear servicio</button>

      </form>
    </div>
    @endrole

    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

      <!-- $servicio viene directo desde "ServicioController" -->
      <!-- Se agregan los servicios en forma de tarjetas -->
      @foreach ($servicios as $servicio)
      <div id="{{ $servicio->id }}" class="relative  h-auto bg-white border border-gray-200 rounded-lg shadow">
        <a href="#">
          <img class="rounded-t-lg object-cover h-[200px] w-full" src="{{ $servicio['imagen'] }}" alt="imagen de servicio" />
        </a>
        <div class="p-5">
          <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $servicio->servicio}}</h5>
          </a>
          <p class="mb-3 font-normal text-gray-700">${{ $servicio->precio }}</p>
          <p class="mb-3 font-normal text-gray-700">{{ $servicio->duracion }} min</p>
          @role('admin')
          <p class="font-normal text-gray-700">{{ $servicio->id }}</p>
          @endrole
        </div>

        @role('admin')
        <!-- //* Solo visible para el admin -->
        <!-- //? Botones para editar y eliminar -->
        <form action="{{ route('servicios-edit', ['id' => $servicio->id]) }}" method="">
          @csrf
          <button type="submit" class="w-full text-gray-900 bg-gradient-to-r from-[#FCE96A] to-[#FACA15] hover:bg-gradient-to-l hover:from-[#FCE96A] hover:to-[#FACA15]  font-medium rounded-t-lg text-sm px-5 py-2.5 text-center">Editar</button>
        </form>

        <form action="{{ route('servicios-destroy', [$servicio->id]) }}" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit" class=" bt-eliminar w-full  text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl font-medium rounded-b-lg text-sm px-5 py-2.5 text-center">Eliminar</button>
        </form>
        @endrole
        
      </div>
      @endforeach

    </div>
  </div>
</div>

@endsection