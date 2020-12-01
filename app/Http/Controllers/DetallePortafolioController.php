<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetallePortafolioController extends Controller
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
        DB::table('tbl_detalle_portafolio')->insert(
            [
                'id_portafolio_user' => $request['id_portafolio_user'],
                'fecha_creacion' => $request['fecha_creacion'],
                'n_post' => $request['n_post'],
                'multimedia' => $request['multimedia']
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
        return  DB::table('tbl_detalle_portafolio')
        ->where([
            'id_portafolio_user' => $id
        ])
        ->orderBy('fecha_creacion', 'desc')
        ->orderBy('n_post', 'desc')
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
        // DB::table('tbl_detalle_portafolio')
        // ->where([
        //     'id_detalle_portafolio' => $id
        // ])
        // ->update([
        // ]);
        
        // return response()->json([
        //     'res' => true,
        //     'message' => 'Registro actualizado correctamente'
        // ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_detalle_portafolio')
        ->where([
            'id_detalle_portafolio' => $id
        ])->delete();

        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado correctamente'
        ], 200);
    }
}
