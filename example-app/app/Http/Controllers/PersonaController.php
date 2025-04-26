<?php

namespace App\Http\Controllers;


use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Persona::all();
        return response()
        ->json(['data'=>$rows], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(); //traer todos los elementos
        $newPersona = new Persona(); //crea un objeto de la clase personas
        $newPersona->nombre=$data['name']; //  crear un registro
        $newPersona->email=$data['email'];
        $newPersona->edad=$data['age'];
        $newPersona->save();    //guardar 

        return response()->json(['data' => 'Datos guardados'], 201); // retorna un mesaje datos guardados
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Persona::find($id); //busca el id que el usurio selecciona para consultarlo
        if(empty($row)){
            return response()->json(['data'=>'no existe'], 404);

        }
        return response()->json(['data' => $row], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Persona::find($id); //busca el id que el usurio selecciona para consultarlo
        if(empty($row)){
            return response()->json(['data'=>'no existe'], 404);

        }
         
        $data = $request->all();
        $row->nombre = $data['name'];
        $row->email = $data['email'];
        $row->edad = $data['age'];
        $row->save();
        return response()->json(['data' => 'Datos guardados'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $row = Persona::find($id); //busca el id que el usurio selecciona para consultarlo
            if(empty($row)){
                return response()->json(['data'=>'no existe'], 404);
    
            }
            $row->delete();
            return response()->json(['data' => 'Datos eliminados'], 200);
    }
}
