<label for="lista-servicios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>

<select id="lista-servicios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
  <option selected>Elige un servicio</option>
  @foreach ($servicios as $servicio)
    <option value="{{ $servicio['servicio'] }}">{{ $servicio['servicio'] }}</option>
  @endforeach

</select>