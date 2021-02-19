<?php

namespace App\Http\Controllers;
 
use App\Estudiante;
use App\Grupo;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $datos ['estudiantes'] = Estudiante::paginate(4);
        $dato2 ['grupos'] = Grupo::paginate(4);
        return view('estudiante.index',$datos,$dato2);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosEstudiante = request()->all();
        
        $campos=[
            'nombre'=>'required|string|max:25',
            'apellido_pa'=>'required|string|max:25',
            'apellido_ma'=>'required|string|max:25',
            'edad'=>'required|string|max:25',
            'email'=>'required|email|max:20',
            'telefono'=>'required|string|max:15',
            'id_grupo'=>'required|integer|max:11'
        ];
        $mensaje=[
            'required' =>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosEstudiante = request()->except('_token');
        Estudiante::insert($datosEstudiante);

      //return response()->json($datosEstudiante);
      return redirect('estudiante')->with('mensaje','Estudiante registrado con èxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id_estudiante)
    {
        //
        $estudiante = Estudiante::findOrFail($id_estudiante);

        return view('estudiante.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_estudiante)
    {
        //
        
        $campos=[
            'nombre'=>'required|string|max:25',
            'apellido_pa'=>'required|string|max:25',
            'apellido_ma'=>'required|string|max:25',
            'edad'=>'required|string|max:25',
            'email'=>'required|email|max:20',
            'telefono'=>'required|string|max:15',
            'id_grupo'=>'required|integer|max:11'
        ];
        $mensaje=[
            'required' =>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);
        
        $datosEstudiante = request()->except(['_token','_method']);
        Estudiante::where('id_estudiante','=',$id_estudiante)->update($datosEstudiante);

        $estudiante = Estudiante::findOrFail($id_estudiante);
        //eturn view('estudiante.edit', compact('estudiante'));
        return redirect('estudiante')->with('mensaje','Estudiante actualizado con èxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_estudiante)
    {
        //
        Estudiante::destroy($id_estudiante);
        return redirect('estudiante')->with('mensaje','Estudiante eliminado con èxito');

    }
}
