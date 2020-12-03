<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('tbl_categorias')
        ->select(
            'id_categoria_trabajo',
            'nombre_categoria',
            'alias'
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
        DB::table('tbl_categorias')->insert(
            [
                'nombre_categoria' => $request['nombre_categoria'],
                'alias' => $request['alias'],
                'descripcion' => $request['descripcion'],
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
        return  DB::table('tbl_categorias')
        ->join('tbl_usuario', 'tbl_categorias.id_categoria_trabajo', '=', 'tbl_usuario.id_categoria_trabajo')
        ->join('tbl_datos_usuario', 'tbl_usuario.id_datos_usuario', '=', 'tbl_datos_usuario.id_datos_usuario')
        ->join('tbl_portafolio_user', 'tbl_usuario.id_portafolio_user', '=', 'tbl_portafolio_user.id_portafolio_user')
        ->where([
            ['tbl_categorias.id_categoria_trabajo', '=', $id]
        ])->select(
            'tbl_categorias.id_categoria_trabajo',
            'id_usuario',
            'tbl_usuario.id_portafolio_user',
            'nombre',
            'apellido',
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
        DB::table('tbl_categorias')
        ->where([
            ['id_categoria_trabajo', '=', $id]
        ])
        ->update([
            'nombre_categoria' => $request['nombre_categoria'],
            'alias' => $request['alias'],
            'descripcion' => $request['descripcion'],
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
