<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;


class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.noticia_index', compact("noticias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.noticia_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|mas:255',
            'subtitulo' => 'required|mas:255',
            'texto' => 'required|mas:255',
            'imagem',
        ]);

        Noticia::create($request->all());
        return redirect()->route('noticias')->with('success', 'Noticia criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $noticia = Noticia::find($id);
        return view('noticias.noticia_edit', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $noticia = Noticia::find($id);

        return view('noticias.noticia_edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|mas:255',
            'subtitulo' => 'required|mas:255',
            'texto' => 'required|mas:255',
            'imagem' => 'required',
        ]);

        $noticia = Noticia::find($id);
        $noticia->update($request->all());

        return redirect()->route('noticias')
        ->with('success', 'noticia atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $noticia = Noticia::find($id);

        if (!$noticia) {
            return redirect()->route('noticias')->with('error', 'Noticia não encontrada.');
        }
    
        $secretaria->delete();
    
        return redirect()->route('noticias')->with('success','Noticia deletada com sucesso.');
    
    }
}
