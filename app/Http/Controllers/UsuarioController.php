<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos = DB::table('tbl_usuario')
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

        return response()->json([
            $datos
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tbl_usuario')->insert(
            [
                'usuario' => $request['usuario'],
                'password' => $request['password'],
                'imagen_usuario' => $request['imagen_usuario'],
                'id_datos_usuario' =>  $request['id_datos_usuario'],
                'id_categoria_trabajo' => $request['id_categoria_trabajo'],
                'id_portafolio_user' => $request['id_portafolio_user'],
            ]
        );

        return response()->json([
            'res' => true,
            'message' => 'Registro creado correctamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     * param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  DB::table('tbl_usuario')
        ->join('tbl_portafolio_user', 'tbl_usuario.id_portafolio_user', '=', 'tbl_portafolio_user.id_portafolio_user')
        ->join('tbl_datos_usuario', 'tbl_usuario.id_datos_usuario', '=', 'tbl_datos_usuario.id_datos_usuario')
        ->where([
            ['tbl_usuario.id_usuario', '=', $id]
        ])->select(
            'id_usuario',
            'usuario',
            'imagen_usuario',
            'tbl_usuario.id_portafolio_user',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'telefono',
            'descripcion_portafolio'
        )
        ->get();
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
        DB::table('tbl_usuario')
        ->where([
            ['id_usuario', '=', $id]
        ])
        ->update([
            'imagen_usuario' => $request['imagen_usuario'],
            'id_categoria_trabajo' => $request['id_categoria_trabajo'],
            'id_datos_usuario' => $request['id_datos_usuario'],
        ]);
        
        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
