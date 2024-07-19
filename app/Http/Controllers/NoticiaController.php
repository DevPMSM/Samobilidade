<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view("pages.noticias.create_noticia.blade.php", compact("noticas"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tile' => 'required|max:255',
            'subtitulo' => 'required|max:255',
            'texto' => 'required',
            'imagem' => 'required'
        ]);
        Noticia::create($request->all());
        return redirect()->route('noticias.index')
                ->with('success', 'Noticia Criado com Sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
