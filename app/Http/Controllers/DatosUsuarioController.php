<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosUsuario as _DatosUsuario;
use Illuminate\Support\Facades\DB;

class DatosUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return _DatosUsuario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tbl_datos_usuario')->insert(
            [
                'nombre' => $request['nombre'],
                'apellido' => $request['apellido'],
                'fecha_nacimiento' => $request['fecha_nacimiento'],
                'telefono' => $request['telefono']
            ]
        );

        return response()->json([
            DB::table('tbl_portafolio_user')->latest('id_portafolio_user')->first('id_portafolio_user')
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
        return  DB::table('tbl_datos_usuario')
        ->where([
            ['id_datos_usuario', '=', $id]
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
        DB::table('tbl_datos_usuario')
        ->where([
            ['id_datos_usuario', '=', $id]
        ])
        ->update([
            'nombre' => $request['nombre'],
            'apellido' => $request['apellido'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'telefono' => $request['telefono'],
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
        // DB::table('tbl_datos_usuario')
        // ->where([
        //     'id_datos_usuario' => $id
        // ])->delete();

        // return response()->json([
        //     'res' => true,
        //     'message' => 'Registro eliminado correctamente'
        // ], 200);
    }
}
