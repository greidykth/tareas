<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    private const MESSAGE = 'Algo anda mal';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::get();

        return response()->json(['tareas' => $tareas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $tarea = new Tarea();
            $tarea->description = $request->description;
            $tarea->importance = $request->importance;
            $tarea->save();

            return response()->json(['tarea' => $tarea], 201);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th, 'message' => self::MESSAGE]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        return response()->json(['tarea' => $tarea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        try {
            $tarea->description = $request->description;
            $tarea->importance = $request->importance;
            $tarea->save();

            return response()->json(['tarea' => $tarea], 201);

        } catch (\Throwable $th) {
            return response()->json(['error' => $th, 'message' => self::MESSAGE]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        try {
            $tarea->delete();
            return response()->json(['tarea' => $tarea]);
        
        } catch (\Throwable $th) {
            return response()->json(['error' => $th, 'message' => self::MESSAGE]);
        }
    }
}
