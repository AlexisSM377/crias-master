<?php

namespace App\Http\Controllers;

use App\Models\Cria;
use App\Models\SensorRegistro;
use Illuminate\Http\Request;

class SensorRegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensores = SensorRegistro::has('cria')->where('saludable', false)->get();
        return view('sensor.index', [
            'sensores' => $sensores
        ]);
    }

    public function sensoresEliminadas()
    {
        $sensores = SensorRegistro::onlyTrashed()->get();
        return view('sensor.borrados', [
            'sensores' => $sensores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crias = Cria::doesntHave('dieta')->where('clasificacion_carne_id', 2)->where('cria_cuarentena', false)->get();
        return view('sensor.crear', [
            'crias' => $crias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cria_id' => 'required|numeric',
            'frecuencia_cardiaca' => 'required|numeric',
            'frecuencia_respiratoria' => 'required|numeric',
            'frecuencia_sanguinea' => 'required|numeric',
            'temperatura' => 'required|numeric'
        ], [
            'cria_id.required' => 'La cría es obligatoria.',
            'frecuencia_cardiaca.required' => 'La frecuencia cardiaca es obligatoria.',
            'frecuencia_cardiaca.numeric' => 'La frecuencia cardiaca debe ser un número.',
            'frecuencia_respiratoria.required' => 'La frecuencia repiratoria es obligatoria.',
            'frecuencia_respiratoria.numeric' => 'La frecuencia repiratoria debe ser un número.',
            'frecuencia_sanguinea.required' => 'La frecuencia sanguinea es obligatoria.',
            'frecuencia_sanguinea.numeric' => 'La frecuencia sanguinea debe ser un número.',
            'temperatura.required' => 'La temperatura es obligatoria.',
            'temperatura.numeric' => 'La temperatura debe ser un número.'
        ], [
            'cria_id' => 'cría',
            'frecuencia_cardiaca' => 'frecuencia cardiaca',
            'frecuencia_respiratoria' => 'frecuencia respiratoria',
            'frecuencia_sanguinea' => 'frecuencia sanguínea',
            'temperatura' => 'temperatura'
        ]);

        $saludable = $this->criaSaludable($request->temperatura, $request->frecuencia_cardiaca, $request->frecuencia_respiratoria, $request->frecuencia_sanguinea);

        $sensorRegistro = new SensorRegistro();
        $sensorRegistro->frecuencia_cardiaca = $request->frecuencia_cardiaca;
        $sensorRegistro->frecuencia_sanguinea = $request->frecuencia_sanguinea;
        $sensorRegistro->frecuencia_respiratoria = $request->frecuencia_respiratoria;
        $sensorRegistro->temperatura= $request->temperatura;
        $sensorRegistro->saludable = $saludable;
        $sensorRegistro->cria_id = $request->cria_id;

        $sensorRegistro->save();

        return redirect('sensores')->with('correcto', '¡Datos de sensor registrados correctamente!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sensor = SensorRegistro::find($id);
        return view('sensor.ver', [
            'sensor' => $sensor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sensor = SensorRegistro::find($id);
        $crias = Cria::where('clasificacion_carne_id', 2)->where('cria_cuarentena', false)->get();
        return view('sensor.editar', [
            'sensor' => $sensor,
            'crias' => $crias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
                    'frecuencia_cardiaca' => 'required|numeric',
                    'frecuencia_respiratoria' => 'required|numeric',
                    'frecuencia_sanguinea' => 'required|numeric',
                    'temperatura' => 'required|numeric'
                ], [
                    'frecuencia_cardiaca.required' => 'La frecuencia cardiaca es obligatoria.',
                    'frecuencia_cardiaca.numeric' => 'La frecuencia cardiaca debe ser un número.',
                    'frecuencia_respiratoria.required' => 'La frecuencia repiratoria es obligatoria.',
                    'frecuencia_respiratoria.numeric' => 'La frecuencia repiratoria debe ser un número.',
                    'frecuencia_sanguinea.required' => 'La frecuencia sanguinea es obligatoria.',
                    'frecuencia_sanguinea.numeric' => 'La frecuencia sanguinea debe ser un número.',
                    'temperatura.required' => 'La temperatura es obligatoria.',
                    'temperatura.numeric' => 'La temperatura debe ser un número.'
                ], [
                    'frecuencia_cardiaca' => 'frecuencia cardiaca',
                    'frecuencia_respiratoria' => 'frecuencia respiratoria',
                    'frecuencia_sanguinea' => 'frecuencia sanguínea',
                    'temperatura' => 'temperatura'
                ]);

        $saludable = $this->criaSaludable($request->temperatura, $request->frecuencia_cardiaca, $request->frecuencia_respiratoria, $request->frecuencia_sanguinea);

        $sensorRegistro = SensorRegistro::find($id);
        $sensorRegistro->frecuencia_cardiaca = $request->frecuencia_cardiaca;
        $sensorRegistro->frecuencia_sanguinea = $request->frecuencia_sanguinea;
        $sensorRegistro->frecuencia_respiratoria = $request->frecuencia_respiratoria;
        $sensorRegistro->temperatura= $request->temperatura;
        $sensorRegistro->saludable = $saludable;

        $sensorRegistro->update();

        return redirect('sensores')->with('correcto', '¡Datos de sensor actualizado correctamente!');
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SensorRegistro::find($id)->delete();

        return redirect('sensores')->with('error', '¡Datos de sensor eliminado correctamente!');
        ;
    }

    public static function criaSaludable($temperatura, $corazon, $respiracion, $sangre)
    {
        if ($temperatura >= 37.5 && $temperatura <= 39.5 && $corazon >= 70 && $corazon <= 80 && $respiracion >= 15 && $respiracion <= 20 && $sangre >= 8 && $sangre <= 10) {
            return true;
        }

        return false;
    }
}
