@extends('app')

@section('content')

<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">

    <div class=" mb-8 block  p-6 bg-white border border-gray-200 rounded-lg shadow ">
      <div>
        <!-- <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Contáctanos</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Envíanos tus dudas u opiones
        </p>
      </div>

      <form class="mt-8 space-y-6" action=" {{ route('contacto') }}" method="POST">
        @csrf
        @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <input type="hidden" name="remember" value="true">
        <div class=" rounded-md shadow-sm">
          <div class="my-2">
            <label for="nombre" class="sr-only">Nombre</label>
            <input id="nombre" name="nombre" type="text" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Nombre">
          </div>

          <div class="my-2">
            <label for="appellidos" class="sr-only">Apellidos</label>
            <input id="apellidos" name="apellidos" type="text" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Apellidos">
          </div>

          <div class="my-2">
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Correo electronico">
          </div>

          <div class="my-2">
            <label for="comentarios" class="sr-only">Email address</label>
            <textarea class="h-[100px] relative block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" name="comentarios" placeholder="Comentarios"></textarea>
          </div>

          <div class="my-2">
            <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl group relative flex w-full justify-center rounded-md border border-transparent  py-2 px-4 text-sm font-medium ">
              <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <!-- Heroicon name: mini/lock-closed -->
                <svg class="h-5 w-5 text-purple-600 group-hover:text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
              </span>
              Enviar
            </button>
          </div>
        </div>
      </form>

    </div>
  </div>

  @endsection