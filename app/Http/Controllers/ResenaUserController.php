<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResenaUserController extends Controller
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
        DB::table('tbl_resena_user')->insert(
            [
                'fecha' => $request['fecha'],
                'id_usuario' => $request['id_usuario'],
                'id_usuario_receptor' => $request['id_usuario_receptor'],
                'descripcion' => $request['descripcion'],
                'calificacion' => $request['calificacion']
            ]
        );

        return response()->json([
            'res' => true,
            'message' => 'Registro creado correctamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Todavia no esta terminada, falta darle formato al retorno de datos
        return  DB::table('tbl_resena_user')
        ->join('tbl_usuario', 'tbl_resena_user.id_usuario', '=', 'tbl_usuario.id_usuario')
        ->where([
            'id_usuario' => $id
        ])->select()->get();
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
