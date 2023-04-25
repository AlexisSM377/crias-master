<?php

namespace App\Http\Controllers;

use App\Models\Corral;
use App\Models\Cria;
use App\Models\Dieta;
use Illuminate\Http\Request;

class DietaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dietas = Dieta::all();
        return view('dieta.index', [
            'dietas' => $dietas,
        ]);
    }

    public function dietasEliminadas()
    {
        $dietas = Dieta::onlyTrashed()->get();
        return view('dieta.borrados', [
            'dietas' => $dietas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cria = Cria::find($id);
        return view('dieta.crear', [
            'cria' => $cria,
            'corrales' => Corral::where('corral_tipos_id', 2)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
                    'dieta' => 'required',
                    'tratamiento' => 'required'
                ], [
                    'dieta.required' => 'La dieta es obligatoria.',
                    'tratamiento.required' => 'El tratamiento es obligatorio.'
                ], [
                    'dieta' => 'dieta',
                    'tratamiento' => 'tratamiento'
                ]);

        $dieta = new Dieta();
        $dieta->cria_id = $id;
        $dieta->dieta = $request->dieta;
        $dieta->tratamiento = $request->tratamiento;

        $dieta->save();

        return redirect('dietas')->with('correcto', 'Dieta creada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dieta = Dieta::find($id);
        return view('dieta.ver', [
            'dieta' => $dieta
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
        $dieta = Dieta::find($id);
        return view('dieta.editar', [
            'dieta' => $dieta
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
                            'dieta' => 'required',
                            'tratamiento' => 'required'
                        ], [
                            'dieta.required' => 'La dieta es obligatoria.',
                            'tratamiento.required' => 'El tratamiento es obligatorio.'
                        ], [
                            'dieta' => 'dieta',
                            'tratamiento' => 'tratamiento'
                        ]);

        $dieta = Dieta::find($id);
        $dieta->dieta = $request->dieta;
        $dieta->tratamiento = $request->tratamiento;

        $dieta->update();

        return redirect('dietas')->with('correcto', 'Dieta actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dieta::find($id)->delete();

        return redirect('dietas')->with('error', 'Dieta eliminada correctamente!');
        ;
    }
}
