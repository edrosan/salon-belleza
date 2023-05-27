<!DOCTYPE html>
<html lang="es" class="h-full">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="Content-Type" content="Mime-Type; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="//unpkg.com/alpinejs" defer></script>
  <title>Salón de belleza</title>
</head>

<body class=" bg-white min-h-screen flex flex-col">

  <div class="min-h-full">
    <nav class="bg-white" x-data="{ open: false}">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">

                <a href="{{ route('inicio') }}" class="bg-white text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] px-3 py-2 rounded-md text-sm font-medium">Inicio</a>

                <a href="{{ route('galeria') }}" class="bg-white text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] px-3 py-2 rounded-md text-sm font-medium">Galería</a>

                <a href="{{ route('servicios') }}" class="bg-white text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] px-3 py-2 rounded-md text-sm font-medium">Servicios</a>

                <a href="{{ route('productos') }}" class="bg-white text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] px-3 py-2 rounded-md text-sm font-medium">Productos</a>

                @auth
                <a href="{{ route('citas') }}" class="bg-white text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] px-3 py-2 rounded-md text-sm font-medium">Citas</a>

                <a href="{{ route('agendar') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-sm font-medium">Agendar</a>
                @role('admin')
                <a href="{{ route('clientes') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-sm font-medium">Clientes</a>
                @endrole
                @endauth

                <a href="{{ route('contacto') }}" class="bg-white text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] px-3 py-2 rounded-md text-sm font-medium">Contacto</a>
              </div>
            </div>
          </div>

          @auth
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">

              <div class="relative ml-3" x-data="{open: false}">
                <div>
                  <button x-on:click="open = !open" type="button" class="flex max-w-xs items-center rounded-full  text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                  </button>
                </div>

                <div x-show="open" x-on:click.away="open =false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <div class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">{{ auth()->user()->alias }}</div>

                  <a href="{{ route('perfil') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>

                  <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Salir</a>
                </div>
              </div>
            </div>
          </div>

          @else
          <div>
            <a href="{{ route('register') }}" class="bg-white text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] px-3 py-2 rounded-md text-sm font-medium">Registro</a>
            <a href="{{ route('login') }}" class="bg-white text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] px-3 py-2 rounded-md text-sm font-medium">Login</a>
          </div>
          @endauth

          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-center rounded-md bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl p-2 text-[#ffffff]  " aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <!--
              Heroicon name: outline/bars-3

              Menu open: "hidden", Menu closed: "block"
            -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!--
              Heroicon name: outline/x-mark

              Menu open: "block", Menu closed: "hidden"
            -->
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div x-show="open" x-on:click.away="open = false" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">

          <a href="{{ route('inicio') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-base font-medium">Inicio</a>

          <a href="{{ route('galeria') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-base font-medium">Galería</a>

          <a href="{{ route('servicios') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-base font-medium">Servicios</a>

          <a href="{{ route('productos') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-base font-medium">Productos</a>

          @auth
          <a href="{{ route('citas') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-base font-medium">Citas</a>

          <a href="{{ route('agendar') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-base font-medium">Agendar</a>
          @role('admin')
          <a href="{{ route('clientes') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-base font-medium">Clientes</a>
          @endrole
          @endauth

          <a href="{{ route('contacto') }}" class="text-[#1b1b1f] hover:bg-[#dfe0ff] hover:text-[#000d5f] block px-3 py-2 rounded-md text-base font-medium">Contacto</a>
        </div>
        @auth

        <div class="border-t border-gray-700 pt-4 pb-3">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>

            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-[#1b1b1f]">{{ auth()->user()->name}}{{auth()->user()->apellido_paterno }}</div>
              <div class="text-sm font-medium my-2 leading-none text-gray-400">{{ auth()->user()->email }}</div>
            </div>

          </div>
          <div class="mt-3 space-y-1 px-2">

            <div class="block rounded-md px-3 py-2 text-base font-medium text-[#1b1b1f] hover:bg-[#dfe0ff]  hover:text-[#000d5f]">{{ auth()->user()->alias }}</div>

            <a href="{{ route('perfil') }}" class="block rounded-md px-3 py-2 text-base font-medium text-[#1b1b1f] hover:bg-[#dfe0ff]  hover:text-[#000d5f]">Perfil</a>

            <a href="{{ route('logout') }}" class="block rounded-md px-3 py-2 text-base font-medium text-[#1b1b1f] hover:bg-[#dfe0ff]  hover:text-[#000d5f]">Salir</a>

          </div>
        </div>
        @endauth
      </div>
    </nav>

    <main>
      <div class=" mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 ">

        @yield('content')

      </div>
    </main>
  </div>

  <footer class="mt-auto p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline"></a>.
    </span>

    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">Av. libertad 423, Puebla, México<a href="https://flowbite.com/" class="hover:underline"></a>.
    </span>

    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">

      <li>
        <a href="{{ route('contacto') }}" class="hover:underline">Contáctanos</a>
      </li>
    </ul>
  </footer>
</body>

</html>