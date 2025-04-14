<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        return Persona::all(); // Obtiene todas las personas
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:personas,email',
        ]);

        return Persona::create($request->all()); // Crea una nueva persona
    }

    public function show(Persona $persona)
    {
        return $persona; // Muestra una persona específica
    }

    public function update(Request $request, Persona $persona)
    {
        $persona->update($request->all()); // Actualiza la persona
        return $persona;
    }

    public function destroy(Persona $persona)
    {
        $persona->delete(); // Elimina una persona
        return response()->json(null, 204);
    }
}
