<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function noticiario()
    {
        $noticias = Noticia::all();

        return view('noticias.noticiario', compact('noticias'))->with('noticias', $noticias);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$noticias = Noticia::all();
        //$noticias = Noticia::paginate(5);

        $query = Noticia::query();

        //busca por palavra chave
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('titulo', 'LIKE', "%$search%")
                ->orWhere('subtitulo', 'LIKE', "%$search%")
                ->orWhere('texto', 'LIKE', "%$search%")
                ->orWhere('categoria', 'LIKE', "%$search%");
        }

        $noticias = $query->paginate(5);

        return view('noticias.noticia_index', compact('noticias'))->with('noticias', $noticias);
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
            'titulo' => 'required',
            'subtitulo' => 'required',
            'texto' => 'required|string',
            'imagem' => 'required|image',
            'categoria' => 'required|string',
        ]);

        $noticiaData = $request->all();

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagem = $request->file('imagem');
            $imagemName = $imagem->hashName();
            $imagem->move(public_path('img/imagens'), $imagemName);
            $noticiaData['imagem'] = $imagemName; // Atualiza o nome da imagem no array de dados
        }

        Noticia::create($noticiaData);

        return redirect()->route('noticias.index')->with('success', 'Noticia criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $noticia = Noticia::find($id);

        return view('noticias.noticia', compact('noticia'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'subtitulo' => 'required|max:255',
            'texto' => 'required|string|max:4294967295',
            'imagem|image',
            'categoria' => 'required|string|max:255',
        ]);

        $noticia = Noticia::find($id);

        $noticiaData = $request->except('imagem'); // cria um array e exclui o campo 'imagem' para que não sobrescrever a imagem que já tem

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagem = $request->file('imagem');
            $imagemName = md5($imagem->getClientOriginalName().strtotime('now').'.'.$imagem->getClientOriginalExtension());

            $imagem->move(public_path('img/imagens'), $imagemName);

            $noticiaData['imagem'] = $imagemName; // Adiciona a nova imagem aos dados
        }

        $noticia->update($noticiaData);

        return redirect()->route('noticias.index')->with('success', 'noticia atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);

        if (! $noticia) {
            return redirect()->route('noticias.index')->with('error', 'Noticia não encontrada.');
        }

        $noticia->delete();

        return redirect()->route('noticias.index')->with('success', 'Noticia deletada com sucesso.');

    }

    public function categorias($categoria)
    {
        // Busca todas as notícias que pertencem à categoria informada
        $noticias = Noticia::where('categoria', $categoria)->get();

        return view('noticias.noticias_categorias', compact('noticias', 'categoria'));
    }
}
