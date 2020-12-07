<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return DB::table('tbl_usuario')
        ->join('tbl_datos_usuario', 'tbl_usuario.id_datos_usuario', '=', 'tbl_datos_usuario.id_datos_usuario')
        ->where([
            ['tbl_usuario.usuario', '=', $request['usuario']],
            ['tbl_usuario.password', '=', $request['password']]
        ])
        ->select(
            'id_usuario',
            'usuario',
            'imagen_usuario',
            'tbl_usuario.id_datos_usuario',
            'id_categoria_trabajo',
            'id_portafolio_user',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'telefono'
        )
        ->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
