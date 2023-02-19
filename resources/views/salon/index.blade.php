@extends('app')

@section('content')


<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32 rounded-xl ">
  <img src="https://images.unsplash.com/photo-1535428245347-3ab06a1b100a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="" class="opacity-70 absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
  <svg viewBox="0 0 1097 845" aria-hidden="true" class="hidden transform-gpu blur-3xl sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:w-[68.5625rem]">
    <path fill="url(#10724532-9d81-43d2-bb94-866e98dd6e42)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
    <defs>
      <linearGradient id="10724532-9d81-43d2-bb94-866e98dd6e42" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
        <stop stop-color="#776FFF" />
        <stop offset="1" stop-color="#FF4694" />
      </linearGradient>
    </defs>
  </svg>
  <svg viewBox="0 0 1097 845" aria-hidden="true" class="absolute left-1/2 -top-52 -z-10 w-[68.5625rem] -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0">
    <path fill="url(#8ddc7edb-8983-4cd7-bccb-79ad21097d70)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
    <defs>
      <linearGradient id="8ddc7edb-8983-4cd7-bccb-79ad21097d70" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
        <stop stop-color="#776FFF" />
        <stop offset="1" stop-color="#FF4694" />
      </linearGradient>
    </defs>
  </svg>
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Salón de Belleza</h2>
      <p class="mt-6 text-lg leading-8 text-gray-300">
        En nuestro salón de belleza realizamos todo tipo de servicios de estética, peluquería, manicura y depilación. Nuestro equipo de profesionales cuidan cada detalle para que disfrutes al máximo de la belleza.
      </p>
    </div>
    <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">

      <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-3">
        <div class="flex flex-col-reverse">
          <dt class="text-base leading-7 text-gray-300">Visitas</dt>
          <dd class="text-2xl font-bold leading-9 tracking-tight text-white">1000+</dd>
        </div>

        <div class="flex flex-col-reverse">
          <dt class="text-base leading-7 text-gray-300">Experiencia hrs</dt>
          <dd class="text-2xl font-bold leading-9 tracking-tight text-white">500+</dd>
        </div>

        <div class="flex flex-col-reverse">
          <dt class="text-base leading-7 text-gray-300">Trabajos realizados</dt>
          <dd class="text-2xl font-bold leading-9 tracking-tight text-white">600+</dd>
        </div>
      </dl>
    </div>
  </div>
</div>

@endsection