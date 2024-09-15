<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $userId = 1;

        
        $user = \App\Models\User::find($userId);

        
        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado na base de dados',
                'success' => false
            ], 404);
        }

        $mensagens = Mensagem::where('id_usuario', $user->id)
            ->orWhereNull('id_usuario')
            ->with('assunto')
            ->get();

        
        return response()->json([
            'data' => $mensagens,
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
            'conteudo' => 'nullable|string',
            'idAssunto' => 'nullable|exists:assunto,id',
            'id_usuario' => 'required|exists:users,id', 
        ]);

        $mensagem = Mensagem::create($validatedData);

      
        return response()->json([
            'data' => $mensagem,
            'success' => true
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
        $mensagem = Mensagem::find($id);

        
        if (!$mensagem) {
            return response()->json([
                'message' => 'Mensagem não encontrada',
                'success' => false
            ], 404);
        }

        
        return response()->json([
            'data' => $mensagem,
            'success' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $mensagem = Mensagem::find($id);


        if (!$mensagem) {
            return response()->json([
                'message' => 'Mensagem não encontrada',
                'success' => false
            ], 404);
        }


        $validatedData = $request->validate([
            'titulo' => 'nullable|string|max:128',
            'conteudo' => 'nullable|string',
            'idAssunto' => 'nullable|exists:assunto,id',
            'id_usuario' => 'nullable|exists:users,id',
        ]);


        $mensagem->update($validatedData);

        
        return response()->json([
            'data' => $mensagem,
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $mensagem = Mensagem::find($id);


        if (!$mensagem) {
            return response()->json([
                'message' => 'Mensagem não encontrada',
                'success' => false
            ], 404);
        }

        // Remove a mensagem
        $mensagem->delete();


        return response()->json([
            'message' => 'Mensagem removida com sucesso',
            'success' => true
        ]);
    }
}
