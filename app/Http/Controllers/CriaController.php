<?php

namespace App\Http\Controllers;

use App\Models\ClasificacionCarne;
use App\Models\Corral;
use App\Models\Cria;
use App\Models\Proveedor;
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
        $crias = Cria::all();
        return view('cria.index', [
            'crias' => $crias
        ]);
    }
    public function criasEliminadas()
    {
        $crias = Cria::onlyTrashed()->get();
        return view('cria.borrados', [
            'crias' => $crias
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        $corrales = Corral::all();
        return view('cria.crear', [
            'proveedores' => $proveedores,
            'corrales' => $corrales,
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
        $request->validate(
            [
            'nombre' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'descripcion' => 'required',
            'peso' => 'required|numeric',
            'color_muscular' => 'required|numeric|between:1,7',
            'marmoleo' => 'required|numeric|between:1,5',
            'costo' => 'required|numeric',
            'proveedor' => 'required',
            'corral' => 'required',
        ],
            [
                'nombre.required' => 'El nombre es requerido',
                'imagen.required' => 'La imagen es requerida',
                'descripcion.required' => 'La descripcion es requerida',
                'peso.required' => 'El peso es requerido',
                'peso.numeric' => 'El peso debe ser un número',
                'color_muscular.required' => 'El color muscular es requerido',
                'color_muscular.numeric' => 'El color muscular debe ser numero',
                'color_muscular.between' => 'El color muscular debe ser entre el 1 y el 7',
                'marmoleo.required' => 'El marmoleo es requerido',
                'marmoleo.numeric' => 'El marmoleo debe ser numero',
                'marmoleo.between' => 'El marmoleo debe ser entre el 1 y el 5',
                'costo.required' => 'El costo es requerido',
                'costo.numeric' => 'El costo debe ser numero',
                'proveedor.required' => 'El proveedor es requerido',
                'corral.required' => 'EL corral es requerido.',
            ]
        );
        //creacion del nombre de la imagen subida
        $imageName = time().'.'.$request->imagen->extension();
        //guarddado de la imagen en la carpetas imagenes
        $request->imagen->move(public_path('images'), $imageName);
        $calf = new Cria();
        $calf->nombre = $request->nombre;
        $calf->url_imagen = $imageName;
        $calf->descripcion = $request->descripcion;
        $calf->color_muscular = $request->color_muscular;
        $calf->marmoleo = $request->marmoleo;
        $calf->peso = $request->peso;
        $calf->costo = $request->costo;
        $calf->cria_cuarentena = false;
        $calf->proceso_id = 2;
        $calf->proveedor_id = $request->proveedor;
        $calf->corral_id = $request->corral;
        $calf->clasificacion_carne_id = $this->obtenerClasificacionCarne($request->peso, $request->color_muscular, $request->marmoleo);
        ;
        $calf->save();
        return redirect('crias')->with('correcto', '¡Cría guardada correctamente!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cria = Cria::find($id);
        return view('cria.ver', [
            'cria' => $cria
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
        $cria = Cria::find($id);
        $proveedores = Proveedor::all();
        $corrales = Corral::all();
        return view('cria.editar', [
            'cria' => $cria,
            'proveedores' => $proveedores,
            'corrales' => $corrales
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
            'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            'descripcion' => 'required',
            'peso' => 'required|numeric',
            'color_muscular' => 'required|numeric|between:1,7',
            'marmoleo' => 'required|numeric|between:1,5',
            'costo' => 'required|numeric',
            'proveedor' => 'required',
            'corral' => 'required',
                ],
            [
                'nombre.required' => 'El nombre es requerido',
                'descripcion.required' => 'La descripcion es requerida',
                'peso.required' => 'El peso es requerido',
                'peso.numeric' => 'El peso debe ser un número',
                'color_muscular.required' => 'El color muscular es requerido',
                'color_muscular.numeric' => 'El color muscular debe ser numero',
                'color_muscular.between' => 'El color muscular debe ser entre el 1 y el 7',
                'marmoleo.required' => 'El marmoleo es requerido',
                'marmoleo.numeric' => 'El marmoleo debe ser numero',
                'marmoleo.between' => 'El marmoleo debe ser entre el 1 y el 5',
                'costo.required' => 'El costo es requerido',
                'costo.numeric' => 'El costo debe ser numero',
                'proveedor.required' => 'El proveedor es requerido',
                'corral.required' => 'EL corral es requerido.',
            ]
        );
        //guardar la cria con la informacion del formulario
        $calf = Cria::find($id);
        if ($request->imagen != null) {
            //eliminar la imganen anterior para guardar la nueva imagen
            if ($calf->url_imagen != null) {
                unlink("images/".$calf->url_imagen);
            }
            //creacion del nombre de la nueva imagen subida
            $imageName = time().'.'.$request->imagen->extension();
            //guardddo de la nueva imagen en la carpetas imagenes
            $request->imagen->move(public_path('images'), $imageName);
        }
        $calf->nombre = $request->nombre;
        if ($request->imagen != null) {
            $calf->url_imagen = $imageName;
        }
        $calf->nombre = $request->nombre;
        $calf->descripcion = $request->descripcion;
        $calf->color_muscular = $request->color_muscular;
        $calf->marmoleo = $request->marmoleo;
        $calf->peso = $request->peso;
        $calf->costo = $request->costo;
        $calf->cria_cuarentena = false;
        $calf->proceso_id = 2;
        $calf->proveedor_id = $request->proveedor;
        $calf->corral_id = $request->corral;
        $tipoCarne = $this->obtenerClasificacionCarne($request->peso, $request->color_muscular, $request->marmoleo);
        $clasificacionCarne = ClasificacionCarne::find($tipoCarne);
        $calf->clasificacion_carne_id = $clasificacionCarne->id;
        $calf->update();
        return redirect('crias')->with('correcto', '¡Cría actualizada correctamente!');
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
        return redirect('crias')->with('error', '¡Se elimino correctamente!');
    }
    public static function obtenerClasificacionCarne($peso, $colorMuscular, $marmoleo)
    {
        $tipoDeCarne = 0;
        // Clasificación de carne GRASA TIPO 1.
        if ($peso >= 15 && $peso <= 25 && $colorMuscular >= 3 && $colorMuscular <= 5 && $marmoleo <= 2) {
            $tipoDeCarne = 1;
            return $tipoDeCarne;
        }
        // Clasificación de carne GRASA TIPO 2.
        $tipoDeCarne = 2;
        return $tipoDeCarne;
    }
}
