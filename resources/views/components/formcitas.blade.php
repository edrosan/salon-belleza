<form id="form_citas" action="{{ route('set-cita') }}" method="POST">
  @csrf

  <div class="mb-6">
    <label for="fecha_inicio" name="fecha_inicio" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha</label>
    <input type="text" id="fecha_inicio" name="fecha_inicio" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="AAA-MM-DD" readonly>
  </div>

  <!-- //* Hora -->
  <div class=" mb-6">
    <label for="lista-horas" class="block mb-2 text-sm font-medium text-gray-900 ">Hora</label>
    <select required id="lista-horas" name="hora" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
      <option selected>Elige una hora</option>
    </select>
  </div>

  <div id="seccion-servicios" class="mb-6 p-3  bg-white border border-gray-200 rounded-lg shadow">

    <div id="servicio-0" class="servicios">
      <label for="lista-servicios" class="block mb-1 text-sm font-medium text-gray-900 ">Servicio</label>
      <select required id="lista-servicios-0" name="servicio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-1">
        <option selected>Elige un servicio</option>

        <!-- //* Agrega los servicios disponible en la tienda -->
        @foreach ($servicios as $servicio)
        <option value="{{ $servicio->servicio}}" class="text-gray-900">{{ $servicio->servicio }} - ${{$servicio->precio}}</option>
        @endforeach
      </select>

      <a id="eliminar-0" href="#" class=" btn-eliminar-servicio inline-flex items-center text-red-600 hover:underline">
        Eliminar servicio
        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
        </svg>
      </a>
    </div>

  </div>

  <!-- //todo -->
  <div id="duracion-servicio" class="mb-6">
    <a id="agregar-servicio" href="#" class="inline-flex items-center text-blue-600 hover:underline">
      Agregar otro servicio
      <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
      </svg>
    </a>
  </div>

  <!-- //* Servicios elegidos -->
  <!-- //todo -->
  <div class="mb-6">
    <label for="servicios-elegidos" name="servicio" class="block mb-2 text-sm font-medium text-gray-900 ">Servicios elegidos</label>

    <input required type="text" id="servicios-elegidos" name="servicio" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Sin servicios" readonly>
  </div>

  <!-- //* Duracion -->
  <div class="mb-6">
    <label for="duracion" name="duracion" class="block mb-2 text-sm font-medium text-gray-900 ">Duración total</label>

    <input required type="text" id="duracion" name="duracion" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="0 min" readonly>
  </div>

  <!-- //* Precio -->
  <div class="mb-6">
    <label for="precio" name="precio" class="block mb-2 text-sm font-medium text-gray-900 ">Precio total</label>

    <input required type="text" id="precio" name="precio" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="$0" value="0" readonly>
  </div>

  <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl group relative flex w-full justify-center rounded-md border border-transparent  py-2 px-4 text-sm font-medium ">Crear cita</button>


</form>

<script>
  function listaServicioListener(listaServicios) {
    listaServicios.addEventListener('change', () => {
      //* Obtiene la informacion de los servicios de la base de datos
      obtenerDatos();
    });
  }

  // Obtiene los datos desde la URL de los servicios
  function obtenerDatos() {
    fetch(url)
        .then((response) => response.json())
        .then((data) => {

          let serviciosSeleccionados = '';
          let duracionTotal = 0;
          let precioTotal = 0;
          let index = 0;

          seccionServicios.childNodes.forEach(element => {
            if (index / 2 !== 0 && index / 2 !== 1) {
              servicioElegido = element.childNodes[3].value;
              if (servicioElegido === 'Elige un servicio') {
                servicioElegido = '';
              }else{
                serviciosSeleccionados += servicioElegido + ", ";
              }
              console.log(servicioElegido);

              // obtiene la duracion y el precio del servicio elegido.
              for (var i = 0; i < data.length; i++) {
                if (servicioElegido == data[i].servicio) {
                  let duracionServicio = data[i].duracion;
                  let precioServicio = data[i].precio;
                  
                  precioTotal += parseInt(precioServicio);
                  duracionTotal += parseInt(duracionServicio);
                }
              }
            }
            index++;

          });

          // Se eliminar la coma y el espacio final
          serviciosSeleccionados = serviciosSeleccionados.slice(0, serviciosSeleccionados.length - 2);

          inputServiciosElegidos.value = serviciosSeleccionados;
          inputPrecio.value = precioTotal;
          inputDuracion.value = duracionTotal;

        });
  }

  function btnEliminar(botonEliminar, seccionServicios, servicio){
    botonEliminar.addEventListener("click", () => {

      if(servicio.id === "servicio-0"){
        servicio.childNodes[3].options[0].selected = servicio.childNodes[3].options[0];
        
      }else{
        servicio.remove();
      }
      obtenerDatos();
    });
  }
</script>

<!-- //? codigo para obtener los servicios y agregarlos al formulario -->
<script>
  //* URL para obtener los servicios
  let url = "http://127.0.0.1:8000/get/servicios";

  let $ = selector => document.getElementById(selector);

  let listaServicios = $("lista-servicios-0");
  const primerServicio = $("servicio-0");
  const primerBotonEliminar = $("eliminar-0");
  let inputPrecio = $("precio");
  let inputDuracion = $("duracion");
  let selectHorasDisponibles = $("lista-horas")
  const seccionServicios = $("seccion-servicios");

  listaServicioListener(listaServicios);

  btnEliminar(primerBotonEliminar, seccionServicios, primerServicio);

</script>


<script>
  const agregarServicio = document.getElementById("agregar-servicio");
  const servicios = document.getElementById("servicio-0");
  
  const contenedorServicio = document.getElementsByClassName("contenedor-servicio");
  const inputServiciosElegidos = document.getElementById("servicios-elegidos");
  let idNum = 0;

  agregarServicio.addEventListener("click", (e) => {
    let nuevoServicio = servicios.cloneNode(true);
    let servicioId = ++idNum;;
    let hijos = nuevoServicio.childNodes;
    let botonEliminar = hijos[5];
    const listaServicios = hijos[3];

    listaServicios.id = `lista-servicios-${servicioId}`;
    nuevoServicio.id = `servicio-${servicioId}`;
    botonEliminar.id = `eliminar-${servicioId}`;

    listaServicioListener(listaServicios);

    btnEliminar(botonEliminar, seccionServicios, nuevoServicio);

    seccionServicios.appendChild(nuevoServicio);

  });
</script>
