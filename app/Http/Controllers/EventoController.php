<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'servicio' => 'required',
            'duracion' => 'required',
            'fecha_inicio' => 'required',
            'hora' => 'required',
            'precio' => 'required',

        ]);

        $cita = new Evento;
        $f_i = $request->fecha_inicio . 'T' . $request->hora;
        $start = $request->fecha_inicio . ' ' . $request->hora;

        $tiempo = $request->duracion;

        $horaFinal = date('Y-m-d H:i', strtotime('+0 hour +' . $tiempo . ' minutes', strtotime($start)));
        $horaFinal = str_replace(" ", "T", $horaFinal);

        $f_f = $horaFinal;

        $cita->cliente = $request->user()->alias;
        $cita->title = $request->servicio;
        $cita->duracion = $request->duracion;
        $cita->day = $request->fecha_inicio;
        $cita->start = $f_i;
        $cita->end = $f_f;
        $cita->hora = $request->hora;
        $cita->precio = $request->precio;
        $cita->completado = false;

        $cita->save();

        return redirect()->route('citas')->with('success', 'Cita creada');

    }


    public function getTime($diaActual)
    {
        // dd($diaActual);
        $citas = Evento::where('day', $diaActual)->get();

        $horas = array();
        for ($i = 10; $i <= 17; $i++) {
            array_push($horas, $i . ':00', $i . ':15', $i . ':30', $i . ':45');
        }

        array_push($horas, '18:00');

        foreach ($citas as $cita) {
            $start = str_replace("T", " ", $cita->start);
            $end = str_replace("T", " ", $cita->end);

            $start_fecha = date("Y-m-d H:i:s", strtotime($start));
            $end_fecha = date("Y-m-d H:i:s", strtotime($end));

            $hora_quitar = explode(" ", $start)[1];
            $index = array_search($hora_quitar, $horas);

            $horas_quitar = array();

            while ($start_fecha < $end_fecha) {
                unset($horas[$index]);

                $hora_quitar = explode(" ", $start_fecha)[1];
                array_push($horas_quitar, $hora_quitar);
                $start_fecha = date('Y-m-d H:i', strtotime('+0 hour +15 minutes', strtotime($start_fecha)));

                $index++;
            }
        }


        return ($horas);
    }

    public function show()
    {
        $citas = Evento::all();
        $user = Auth::user();

        foreach ($citas as $cita) {
            if ($user->hasRole('admin')) {
                $cita->title = $cita->cliente . " - " . $cita->title;
                $cita->description = $cita->title . " - " . $cita->cliente;
            } elseif ($user->alias == $cita->cliente) {
                $cita->title = $cita->cliente . " - " . $cita->title;
            } else {
                $cita->title = 'Ocupado';
            }
        }
        return json_encode($citas);
    }

    public function getUser($alias)
    {
        $citas = Evento::where('alias', $alias)->get();
        return $citas;
    }
}
