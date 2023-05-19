@extends('app')

@section('content')
<div class="">
  <div class="mx-auto max-w-2xl py-2 px-4 sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">
    

    @role('admin')
    <!-- //* Solo visible para el admin -->
    <!-- //* Formulario para agregar servicios -->
    <div class=" mb-8 block  p-6 bg-white border border-gray-200 rounded-lg shadow ">
      <form id="form_servicios" class="" action="{{ route('productos-update', ['id' => $producto->id]) }}" method="POST">
      @method('PATCH')
        @csrf
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Editar producto</h5>

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
          <label for="producto" name="producto" class="block mb-2 text-sm font-medium text-gray-900 ">Producto</label>
          <input type="text" name="producto" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Producto" value="{{ $producto->producto}}">
        </div>

        <div class="mb-6">
          <label for="descripcion" name="descripcion" class="block mb-2 text-sm font-medium text-gray-900 ">Descripción</label>
          <input type="text" name="descripcion" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Descripcion" value="{{ $producto->descripcion}}">
        </div>
        <div class="mb-6">
          <label for="precio" name="precio" class="block mb-2 text-sm font-medium text-gray-900 ">Precio</label>
          <input type="text" name="precio" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="$0" value="{{ $producto->precio}}">
        </div>

        <div class="mb-6">
          <label for="imagen" name="imagen" class="block mb-2 text-sm font-medium text-gray-900 ">URL imagen</label>
          <input type="text" name="imagen" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Imagen" value="{{ $producto->imagen}}">
        </div>

        <button type="submit" class="text-gray-900 bg-gradient-to-r from-[#FCE96A] to-[#FACA15] hover:bg-gradient-to-l hover:from-[#FCE96A] hover:to-[#FACA15]  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full sm:w-auto">Guardar cambios</button>
      </form>
    </div>
    @endrole



    
  </div>
</div>

@endsection