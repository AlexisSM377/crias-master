<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.index', [
            'proveedores' => $proveedores
        ]);
    }

    public function proveedoresEliminados()
    {
        $proveedores = Proveedor::onlyTrashed()->get();
        return view('proveedor.index', [
            'proveedores' => $proveedores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required'
                ],
            [
                'nombre.required' => 'El nombre es requerido',
                'email.required' => 'El email es requerido',
                'email.email' => 'El email debe ser un correo electronico valido',
                'telefono.required' => 'El telefono es requerido',
                'direccion.required' => 'La direccion es requerida'
            ]
        );

        Proveedor::create($request->all());

        return redirect('proveedores')->with('correcto', 'Proveedor creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedor.ver', [
            'proveedor' => $proveedor
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
        $proveedor = Proveedor::find($id);
        return view('proveedor.editar', [
            'proveedor' => $proveedor
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
        $request->validate(
            [
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required'
                ],
            [
                'nombre.required' => 'El nombre es requerido',
                'email.required' => 'El email es requerido',
                'email.email' => 'El email debe ser un correo electronico valido',
                'telefono.required' => 'El telefono es requerido',
                'direccion.required' => 'La direccion es requerida'
            ]
        );

        Proveedor::find($id)->update($request->all());

        return redirect('proveedores')->with('correcto', 'Proveedor actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::find($id)->delete();

        return redirect('proveedores')->with('error', '¡Proveedor eliminado correctamente!');
    }
}
