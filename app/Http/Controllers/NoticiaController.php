<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function noticiario()
    {
        $noticias = Noticia::all();
        
        return view('noticias.noticiario', compact("noticias"))->with('noticias', $noticias);
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
        if($request->has('search')){
            $search = $request->get('search');
            $query->where('titulo', 'LIKE', "%$search%")
                ->orWhere('subtitulo', 'LIKE', "%$search%")
                ->orWhere('texto', 'LIKE', "%$search%");
        }

        $noticias = $query->paginate(5);
    

        return view('noticias.noticia_index', compact("noticias"))->with('noticias', $noticias);
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
            'titulo' => 'required|max:255',
            'subtitulo' => 'required|max:255',
            'texto' => 'required|max:2000',
            'imagem' => 'required|image', 
        ]);

        $noticiaData = $request->all(); 

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagem = $request->file('imagem');
            $imagemName = md5($imagem->getClientOriginalName() . strtotime("now") . "." . $imagem->getClientOriginalExtension());
            
            $imagem->move(public_path('img/imagens'), $imagemName);

            $noticiaData['imagem'] = $imagemName; // Atualiza o nome da imagem no array de dados
        }

        Noticia::create($noticiaData); 
        return redirect()->route('noticias')->with('success', 'Noticia criada com sucesso.');
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
            'texto' => 'required|max:2000',
            'imagem|image',
        ]);

        $noticia = Noticia::find($id);

        $noticiaData = $request->except('imagem'); // cria um array e exclui o campo 'imagem' para que não sobrescrever a imagem que já tem

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $imagem = $request->file('imagem');
            $imagemName = md5($imagem->getClientOriginalName() . strtotime("now") . "." . $imagem->getClientOriginalExtension());
            
            $imagem->move(public_path('img/imagens'), $imagemName);
    
            $noticiaData['imagem'] = $imagemName; // Adiciona a nova imagem aos dados
        }


        $noticia->update($noticiaData);

        return redirect()->route('noticias')->with('success', 'noticia atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id);

        if (!$noticia) {
            return redirect()->route('noticias')->with('error', 'Noticia não encontrada.');
        }
    
        $noticia->delete();

        return redirect()->route('noticias')->with('success','Noticia deletada com sucesso.');
    
    }
}
