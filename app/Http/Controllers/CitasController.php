<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicio;
use App\Models\User;

class CitasController extends Controller
{
    /* *  
     * index para mostrar todo
     * store para guarddar
     * update para actualizar
     * destroy para eliminar
     * edit para mostrar el formulario de edicion
     */

    public function show()
    {
        if (Auth::check()) {
            $alias = Auth::user()->alias;

            if (Auth::user()->alias == 'admin') {
                $citas = Evento::all()->reverse();
            } else {
                $citas = Evento::where('cliente', $alias)->get()->reverse();
            }
            $servicios = Servicio::all();

            // Envia los datos de las variables "servicios" y "citas".
            return (view('auth.citas', compact('servicios', 'citas')));
        }
        return view('auth.login');
    }

    public function destroy($id)
    {
        $cita = Evento::find($id);
        $cita->delete();


        return redirect()->route('citas')->with('success', 'Cita eliminada');
    }

    // * obtiene las citas de la ultima semana

    public function getWeek()
    {
        $alias = Auth::user()->alias;
        $citas = Evento::where('cliente', $alias)->get();
        $semana = 8;

        $fechaActual = date('o-m-d');
        // ymd = año(0), mes(1), dia(2). Actual
        $ymdActual = explode("-", $fechaActual);

        $citasSemana = array();

        foreach ($citas as $cita) {
            $fechaCita = $cita->day;
            $ymd = explode("-", $fechaCita);

            if ($ymdActual[1] == $ymd[1]) {
                if ($ymd[2] < $ymdActual[2]) {
                    if (($ymd[2] + $semana) > $ymdActual[2]) {
                        array_push($citasSemana, $cita);
                    }
                }
            } elseif (($ymdActual[1] - 1) == ($ymd[1])) {
                /* * 
                dias faltantes para que se acomplete la semaana
                dias que se encuentran en un mes anterior
                */
                $diasRestantes = $semana - $ymdActual[2];
                $numDiasMes = cal_days_in_month(CAL_GREGORIAN, $ymd[1], $ymd[0]);
                if ($ymd[2] + $diasRestantes > $numDiasMes) {
                    array_push($citasSemana, $cita);
                }
            }
        }

        return $citasSemana;
    }

    public function getMonth()
    {
        $alias = Auth::user()->alias;
        $citas = Evento::where('cliente', $alias)->get();
        $mes = 30;

        $fechaActual = date('o-m-d');
        // ymd = año(0), mes(1), dia(2). Actual
        $ymdActual = explode("-", $fechaActual);

        $citasMes = array();

        foreach ($citas as $cita) {
            $fechaCita = $cita->day;
            $ymd = explode("-", $fechaCita);

            if ($ymdActual[1] == $ymd[1]) {
                if ($ymd[2] < $ymdActual[2]) {
                    if (($ymd[2] + $mes) > $ymdActual[2]) {
                        array_push($citasMes, $cita);
                    }
                }
            } elseif (($ymdActual[1] - 1) == ($ymd[1])) {
                /* * 
                dias faltantes para que se acomplete la semaana
                dias que se encuentran en un mes anterior
                */
                $diasRestantes = $mes - $ymdActual[2];
                $numDiasMes = cal_days_in_month(CAL_GREGORIAN, $ymd[1], $ymd[0]);
                if ($ymd[2] + $diasRestantes > $numDiasMes) {
                    array_push($citasMes, $cita);
                }
            }
        }

        return $citasMes;
    }

    public function getYear()
    {
        $alias = Auth::user()->alias;
        $citas = Evento::where('cliente', $alias)->get();
        $year = 365;

        $fechaActual = date('o-m-d');
        // ymd = año(0), mes(1), dia(2). Actual
        $ymdActual = explode("-", $fechaActual);

        $citasYear = array();

        foreach ($citas as $cita) {
            $fechaCita = $cita->day;
            $ymd = explode("-", $fechaCita);

            if ($ymdActual[0] == $ymd[0]) {
                if ($ymdActual[1] == $ymd[1]) {
                    if ($ymd[2] < $ymdActual[2]) {
                        array_push($citasYear, $cita);
                    }
                }
                if ($ymd[1] < $ymdActual[1]) {
                    array_push($citasYear, $cita);
                }
            } elseif (($ymdActual[0] - 1) == ($ymd[0])) {
                /* * 
                dias faltantes para que se acomplete la semaana
                dias que se encuentran en un mes anterior
                */
                $diasRestantes = $year - $ymdActual[2];
                $numDiasMes = cal_days_in_month(CAL_GREGORIAN, $ymd[1], $ymd[0]);
                if ($ymd[2] + $diasRestantes > $numDiasMes) {
                    array_push($citasYear, $cita);
                }
            }
        }

        return $citasYear;
    }

    public function getFrecuencia()
    {
        $citasSemana = count($this->getWeek());
        $citasMes = count($this->getMonth());
        $citasYear = count($this->getYear());

        $citasTotal = $citasSemana + $citasMes + $citasYear;

        $descuentoSemanal = 0.03;
        $descuentoMensual = 0.05;
        $descuentoAnual = 0.08;

        $cliente = User::find(Auth::user()->id);

        

        if ($citasTotal >= 15) {
            $cliente->frecuente = "si";
            $cliente->save();
            
            if ($citasYear >= 25) {
                return $descuentoAnual;
            } elseif ($citasMes >= 8) {
                return $descuentoMensual;
            } elseif ($citasSemana >= 3) {
                return $descuentoSemanal;
            }
        } elseif ($citasTotal < 15) {
            $cliente->frecuente = "no";
            $cliente->save();
        }


        return 0;
    }
}
// 