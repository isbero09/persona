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
    
        return view('persona.index', ['persona' => Persona::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('persona.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([ 
            "nombre" => ["required","string"],
            "apellido"=> ["required","string"],
            "cedula"=> ["required","string"],
        ]);
        Persona::create([
            "nombre"=>$request->input("nombre"),
            "apellido"=>$request->input("apellido"),
            "cedula"=>$request->input("cedula"),
        ]);
        
        return redirect()->route("persona.index")->with("success", "Persona creado exitosamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $persona = Persona::findOrFail($id);
        return view('persona.show', ['persona' => $persona]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $personas = Persona::findOrFail($id);
        return view('persona.edit', ['persona' => $personas]);
    }

    /**s
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $persona = Persona::findOrFail($id);


        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:255'],
            'apellido' => ['nullable', 'string', 'max:255'],
            'cedula' => ['nullable', 'string', 'max:10'],
        ]);


        $persona->update($validated);
        return redirect()->route("persona.index")->with("sucess","Registro actualizado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Persona::destroy($id);
        return redirect()->route("persona.index")->with("sucess","Registro borrado exitosamente");
    }
}
