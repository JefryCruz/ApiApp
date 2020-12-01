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
        return  DB::table('tbl_usuario')
        ->join('tbl_datos_usuario', 'tbl_usuario.id_datos_usuario', '=', 'tbl_datos_usuario.id_datos_usuario')
        ->where([
            'tbl_usuario.usuario' => $request['usuario'],
            'tbl_usuario.password' => $request['password']
        ])
        ->orWhere([
            'tbl_datos_usuario.correo' => $request['usuario'],
            'tbl_usuario.password' => $request['password']
        ])
        ->select(
            'id_usuario',
            'usuario',
            'imagen_usuario',
            'tbl_usuario.id_datos_usuario',
            'id_detalle_categorias',
            'id_portafolio_user',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'telefono',
            'correo'
        )
        ->get();
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
                'id_datos_usuario' => DB::table('tbl_datos_usuario')
                                        ->latest('id_datos_usuario')
                                        ->first(),
                'id_detalle_categorias' => $request['id_detalle_categorias'],
                'id_portafolio_user' => DB::table('tbl_portafolio_user')
                                            ->latest('id_portafolio_user')
                                            ->first()
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
        ->where([
            'id_usuario' => $id
        ])->select()
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
            'id_usuario' => $id
        ])
        ->update([
            'usuario' => $request['usuario'],
            'password' => $request['password'],
            'imagen_usuario' => $request['imagen_usuario'],
            'id_detalle_categorias' => $request['id_detalle_categorias'],
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
        //
    }
}
