<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
      <tr>
        @role('admin')
        <th scope="col" class="px-6 py-3">
          Cliente
        </th>
        @endrole
        <th scope="col" class="px-6 py-3">
          Servicio
        </th>
        <th scope="col" class="px-6 py-3">
          Fecha
        </th>
        <th scope="col" class="px-6 py-3">
          Duración
        </th>
        <th scope="col" class="px-6 py-3">
          Precio
        </th>
        <th scope="col" class="px-6 py-3">
          Modificar
        </th>
      </tr>
    </thead>

    <tbody>

      @foreach ($citas as $cita)
      <tr class="bg-white border-b ">
        @role('admin')
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
          {{ $cita-> cliente }}
        </th>
        @endrole

        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
          {{ $cita-> title }}
        </th>
        <td class="px-6 py-4 text-gray-900">
          {{ str_replace("T", " ", $cita-> start ) }}
        </td>
        <td class="px-6 py-4 text-gray-900">
          {{ $cita-> duracion }} min
        </td>
        <td class="px-6 py-4 text-gray-900">
          ${{ $cita-> precio }}
        </td>
        <td class="px-6 py-4 text-gray-900">


          <!-- //* $cita viene desde el controlador "CitasController" -->
          <form action="{{ route('delete-citas', ['id' => $cita->id]) }}" method="POST">
            @method('DELETE')
            @csrf

            @if (date(str_replace("T", " ", $cita-> start )) < str_replace("T", " ", date("c")))
            <button type="button" class=" bt-eliminar w-full  text-white bg-gradient-to-br from-[#9CA3AF] to-[#D1D5DB] font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>Eliminar</button>
            @else
            <button type="submit" class=" bt-eliminar w-full  text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center">Eliminar</button>
            @endif

          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>