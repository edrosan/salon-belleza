@extends('app')

@section('content')
<h1 class="text-center text-5xl font-bold text-[#1b1b1f] pt-8 pb-10">
  Clientes registrados
</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            No.
          </th>
          <th scope="col" class="px-6 py-3">
            Cliente
          </th>
          <th scope="col" class="px-6 py-3">
            Correo
          </th>
          <th scope="col" class="px-6 py-3">
            Celular
          </th>
          <th scope="col" class="px-6 py-3">
            Fecha de registro
          </th>
        </tr>
      </thead>
      <tbody>

        @foreach ($clientes as $key=>$cliente)
        @if ($cliente->alias != "admin")  
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <!-- //* Numero cliente -->
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $key }}
          </th>
          <!-- //* Cliente -->
          <td class="px-6 py-4">
            {{ $cliente->name}} {{ $cliente->apellido_paterno}} {{ $cliente->apellido_materno}}
          </td>
          <!-- //* Correo -->
          <td class="px-6 py-4">
            {{ $cliente->email }}
          </td>
          <!-- //* Celular -->
          <td class="px-6 py-4">
            {{ $cliente->celular}}
          </td>
          <!-- //* Fecha registro -->
          <td class="px-6 py-4">
            {{ $cliente->created_at}}
          </td>
        </tr>
        @endif
        @endforeach

      </tbody>
    </table>
  </div>




@endsection