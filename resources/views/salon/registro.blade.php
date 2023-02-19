@extends('app')

@section('content')

<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-50">
  <body class="h-full">
  ```
-->
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">
    <div>
      <!-- <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
        Registro
      </h2>

    </div>
    <form class="mt-8 space-y-6" action="{{ route('registro') }}" method="POST">
      @csrf

      @if (session('success'))
        <h6>{{ session('success')}}</h6>
      @endif
      <input type="hidden" name="remember" value="true">
      <div class=" rounded-md shadow-sm">

        <div class="my-2 gap-2 flex">
          <label for="nombre" class="sr-only">Nombre</label>
          <input id="nombre" name="nombre" type="text" autocomplete="" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Nombre">

          <input id="apellidos" name="apellidos" type="text" autocomplete="" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Apellidos">
        </div>

        <div class="my-2">
          <label for="alias" class="sr-only">Alias</label>
          <input id="alias" name="alias" type="text" autocomplete="" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Alias">

        </div>
        <div class="my-2">
          <label for="calle" class="sr-only">Calle</label>
          <input id="calle" name="calle" type="text" autocomplete="" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Calle">

        </div>
        <div class="my-2">
          <label for="numero" class="sr-only">Numero</label>
          <input id="numero" name="numero" type="text" autocomplete="" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Numero">

        </div>
        <div class="my-2">
          <label for="colonia" class="sr-only">Colonia</label>
          <input id="colonia" name="nombre" type="text" autocomplete="" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Colonia">

        </div>
        <div class="my-2">
          <label for="cp" class="sr-only">Codigo postal</label>
          <input id="cp" name="cp" type="text" autocomplete="" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="C.P.">

        </div>
        <div class="my-2">
          <label for="celular" class="sr-only">Numero celular</label>
          <input id="celular" name="celular" type="number" autocomplete="" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Numero celular">

        </div>
        <div class="my-2">
          <label for="local" class="sr-only">Numero local</label>
          <input id="local" name="local" type="number" autocomplete="" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Numero Local">

        </div>
        <div class="my-2">
          <label for="correo" class="sr-only">Correo electronico</label>
          <input id="correo" name="correo" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Correo electronico">
        </div>
        <div class="my-2">
          <label for="password" class="sr-only">Contraseña</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Contraseña">
        </div>
      </div>



      <div>
        <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <!-- Heroicon name: mini/lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
            </svg>
          </span>
          Registrarte
        </button>
      </div>
    </form>
  </div>
</div>


@endsection