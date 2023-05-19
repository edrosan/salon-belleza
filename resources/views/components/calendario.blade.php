<div class="min-w-full" x-data="{open: false}">
  <div id="calendar" class=""></div>

  <div x-show="open" id="modal1" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">

      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative w-full transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 w-full text-center sm:mt-0  sm:text-left">
                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Programar una cita</h3>
                <div class="mt-2 w-full">

                  <!-- Componente formulario para crear cita -->
                  <x-formcitas :servicios="$servicios"></x-formcitas>

                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">

            <form id="form_citas" class="w-full" action="{{ route('agendar') }}" method="">
              @csrf
              <button type="submit" id="btn-cancelar" x-on:click="open = !open" class=" bt-eliminar w-full  text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancelar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- //* Javascript -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>

<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.4/locales-all.global.min.js"></script>
<script>
  let modal = document.getElementById('modal1');
  let calendarEl = document.getElementById('calendar');

  let formulario = document.getElementById('form_citas');

  var initialLocaleCode = 'es';

  let calendar = new FullCalendar.Calendar(calendarEl, {
    locale: initialLocaleCode,

    // * Agrega las citas al calendario
    events: {
      url: "http://127.0.0.1:8000/citas/get",
      type: 'GET',
      color: '#5145CD',
    },

    headerToolbar: {
      left: 'prev,next today',
      right: 'dayGridMonth,listWeek'
    },

    dateClick: function(info) {
      document.getElementById('calendar').setAttribute('x-show', "open=true");
      formulario['fecha_inicio'].value = info.dateStr;

      //* "fecha seleccion completa" y "fecha actual completa"
      let fsc = new Date(info.date);
      let fac = new Date();
      let fechaSeleccionada = fsc.getFullYear() + "-" + (fsc.getMonth() + 1) + "-" + fsc.getDate();
      let fechaActual = fac.getFullYear() + "-" + (fac.getMonth() + 1) + "-" + fac.getDate();
      let horaActual = fac.getHours();

      console.log(horaActual);

      var child = selectHorasDisponibles.lastElementChild;
      while (child) {
        selectHorasDisponibles.removeChild(child);
        child = selectHorasDisponibles.lastElementChild;
      }

      // Obtiene las horas disponibles en el dia seleccionado
      if (new Date(fechaSeleccionada) < new Date(fechaActual)) {
        console.log("Fecha pasada")
        console.log(fechaSeleccionada);
        console.log(fechaActual);
      } else {
        // * Obtiene las horas disponibles en un dia determinado
        let dia = document.getElementById("fecha_inicio").value;
        let urlHorasDisponibles = `http://127.0.0.1:8000/citas/get/time/${dia}`;

        fetch(urlHorasDisponibles)
          .then((response) => response.json())
          .then((data) => {
            horas = Object.values(data)

            for (let i = 0; i < horas.length; i++) {
              let opcionHora = document.createElement('option');
              if (horas[i] > horaActual && fechaActual === fechaSeleccionada) {
                opcionHora.value = horas[i];
                opcionHora.innerHTML = horas[i];
                selectHorasDisponibles.appendChild(opcionHora);
              } else if (fechaActual != fechaSeleccionada) {
                opcionHora.value = horas[i];
                opcionHora.innerHTML = horas[i];
                selectHorasDisponibles.appendChild(opcionHora);
              }
            }
          });

        let buttonCerrar = document.getElementById('btn-cancelar');
        buttonCerrar.addEventListener('click', (e) => {
          formulario.reset();
          selectHorasDisponibles
        });
      }
    },
  })

  // calendar.render();

  calendar.render();
  calendar.updateSize();
  // window.dispatchEvent(new Event('resize'));
</script>