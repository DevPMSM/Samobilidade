<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Legislacao;


class LegislacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Legislacao::query();
        //busca por palavra chave
        if($request->has('search')){
            $search = $request->get('search');
            $query->where('titulo', 'LIKE', "%$search%")
                ->orWhere('resumo', 'LIKE', "%$search%");
        }

        $legislacoes = $query->paginate(5);

        return view('legislacoes.legislacao_index', compact("legislacoes"))->with('legislacoes', $legislacoes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('legislacoes.legislacao_create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'resumo' => 'required|max:300',
            'url' => 'required',
        ]);

        Legislacao::create($request->all());
        return redirect()->route('legislacoes')->with('success', 'Legislação criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $legislacao = Legislacao::find($id);
        return view('legislacoes.legislacao_edit', compact('legislacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $legislacao = Legislacao::find($id);

        return view('legislacoes.legislacao_edit', compact('legislacao'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'resumo' => 'required|max:300',
            'url' => 'required',
        ]);

        $legislacao = Legislacao::find($id);
        $legislacao->update($request->all());


        return redirect()->route('legislacoes')->with('success', 'Legislação atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $legislacao = Legislacao::find($id);

        if (!$legislacao) {
            return redirect()->route('legislacoes')->with('error', 'Legislação não encontrada.');
        }
    
        $legislacao->delete();

        return redirect()->route('legislacoes')->with('success','Legislação deletada com sucesso.');
    }
}
