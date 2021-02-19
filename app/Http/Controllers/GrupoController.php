<?php

namespace App\Http\Controllers;

use App\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos ['grupos'] = Grupo::paginate(5);
        return view('grupo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos=[
            'semestre'=>'required|string|max:10',
            'grupo'=>'required|string|max:5',
            'turno'=>'required|string|max:10'
        ];

        $mensaje=[
            'required' =>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosGrupo = request()->except('_token');
        Grupo::insert($datosGrupo);
        
        //return response()->json($datosGrupo);
        return redirect('grupo')->with('mensaje','Grupo registrado con èxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit($id_grupo)
    {
        //
        $grupo = Grupo::findOrFail($id_grupo);

        return view('grupo.edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_grupo)
    {
        //
        
        $campos=[
            'semestre'=>'required|string|max:10',
            'grupo'=>'required|string|max:5',
            'turno'=>'required|string|max:10'
        ];

        $mensaje=[
            'required' =>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);



        $datosGrupo = request()->except(['_token','_method']);
        Grupo::where('id_grupo','=',$id_grupo)->update($datosGrupo);

        $grupo = Grupo::findOrFail($id_grupo);
        //return view('grupo.edit', compact('grupo'));
        return redirect('grupo')->with('mensaje','Grupo actualizado con èxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_grupo)
    {
        //
        Estudiante::destroy($id_grupo);
        return redirect('grupo')->with('mensaje','Grupo eliminado con èxito');
    }
}
