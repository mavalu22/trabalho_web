<?php

namespace App\Http\Controllers;

use App\Models\Assunto;
use Illuminate\Http\Request;

class AssuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $assuntos = Assunto::all();

        
        return response()->json([
            'data' => $assuntos,
            'success' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:128',
        ]);

       
        $assunto = Assunto::create($validatedData);

        
        return response()->json([
            'data' => $assunto,
            'success' => true
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $assunto = Assunto::find($id);

        
        if (!$assunto) {
            return response()->json([
                'message' => 'Assunto não encontrado',
                'success' => false
            ], 404);
        }

        
        return response()->json([
            'data' => $assunto,
            'success' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $assunto = Assunto::find($id);

        
        if (!$assunto) {
            return response()->json([
                'message' => 'Assunto não encontrado',
                'success' => false
            ], 404);
        }

        
        $validatedData = $request->validate([
            'titulo' => 'nullable|string|max:128',
        ]);

       
        $assunto->update($validatedData);

        // Retorna o assunto atualizado
        return response()->json([
            'data' => $assunto,
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $assunto = Assunto::find($id);

       
        if (!$assunto) {
            return response()->json([
                'message' => 'Assunto não encontrado',
                'success' => false
            ], 404);
        }

        
        $assunto->delete();

       
        return response()->json([
            'message' => 'Assunto removido com sucesso',
            'success' => true
        ]);
    }
}
