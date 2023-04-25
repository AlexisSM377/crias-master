<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cria;
use Illuminate\Http\Request;

class CriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'crias' => Cria::select(('crias.id AS criaId'), 'crias.nombre', 'peso', ('proveedors.nombre AS proveedor'), ('procesos.nombre AS proceso'), ('clasificacion_carnes.nombre AS clasificacionCarne'), ('corrals.nombre AS corral'))
            ->join('proveedors', 'crias.proveedor_id', 'proveedors.id')
            ->join('procesos', 'crias.proceso_id', 'procesos.id')
            ->join('clasificacion_carnes', 'crias.clasificacion_carne_id', 'clasificacion_carnes.id')
            ->join('corrals', 'crias.corral_id', 'corrals.id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cria::create($request->all());

        return response()->json([
                            'mensaje' => 'Cria creada con exito'
                        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
                    'cria' => Cria::find($id)
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
        //
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
        Cria::find($id)->update($request->all());

        return response()->json([
                            'mensaje' => 'Cria actualizada con exito'
                        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cria::find($id)->delete();

        return response()->json([
                            'mensaje' => 'Cria borrado con exito'
                        ]);
    }
}
