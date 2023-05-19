@extends('app')

@section('content')


<h1 class="text-center text-5xl font-bold text-[#1b1b1f] pt-8 pb-10">
  Trabajos realizados
</h1>

@role('admin')
<!-- Solo visible para el admin -->
<!-- Formulario para agregar trabajos a la galeria -->
<div class=" mb-8 block  p-6 bg-white border border-gray-200 rounded-lg shadow ">
  <form id="form_servicios" class="" action="{{ route('galeria') }}" method="POST">
    @csrf

    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Agregar trabajo</h5>

    <!-- Mensaje si es que se agrego el trabajo correctamente -->
    @if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <!-- // Mensajes si ocurrio algun error -->
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
      {{ $error }}
    </div>
    @endforeach
    @endif

    <div class="mb-6">
      <label for="imagen" name="imagen" class="block mb-2 text-sm font-medium text-gray-900 ">URL imagen</label>
      <input type="text" name="imagen" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Imagen">
    </div>

    <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full sm:w-auto ">Guardar trabajo</button>
  </form>
</div>
@endrole

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:grid-cols-4 m-2">
  @foreach ($trabajos as $trabajo)
  <div class="relative">
    <img class="h-[200px] object-cover w-full rounded-lg " src="{{ $trabajo->imagen }}" alt="">

    @role('admin')
    <form action="{{ route('galeria-destroy', ['id' => $trabajo->id])}}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit" class="w-full absolute bottom-0 text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center">Eliminar</button>
    </form>
    @endrole

  </div>
  @endforeach
</div>




@endsection