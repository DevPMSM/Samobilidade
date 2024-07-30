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
            'imagem' => 'required',
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
            'imagem',
        ]);

        $noticia = Noticia::find($id);
        $noticia->update($request->all());


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
