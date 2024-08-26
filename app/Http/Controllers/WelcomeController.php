<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Legislacao;
use App\Models\Noticia;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legislacoes = Legislacao::all();
        $noticias = Noticia::all();

        return view('welcome', compact('legislacoes', 'noticias'));
    }

    public function contato(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'telefone' => 'required|integer',
            'assunto' => 'required|string|min:3|max:255',
            'mensagem' => 'required|string',
        ], [
            'nome.required' => 'O CAMPO NOME É OBRIGATORIO',
            'nome.string' => 'O CAMPO NOME DEVE SER UM TEXTO',
            'nome.min' => 'O CAMPO NOME DEVE TER NO MINIMO 3 LETRAS',
            'nome.max' => 'O CAMPO NOME DEVE TER NO MAXIMO 3 LETRAS',

            'email.required' => 'O CAMPO EMAIL É OBRIGATORIO',
            'email.string' => 'O CAMPO EMAIL DEVE SER UM TEXTO',
            'email.min' => 'O CAMPO EMAIL DEVE TER NO MINIMO 3 LETRAS',
            'email.max' => 'O CAMPO EMAIL DEVE TER NO MAXIMO 3 LETRAS',

            'assunto.required' => 'O CAMPO ASSUNTO É OBRIGATORIO',
            'assunto.string' => 'O CAMPO ASSUNTO DEVE SER UM TEXTO',
            'assunto.min' => 'O CAMPO ASSUNTO DEVE TER NO MINIMO 3 LETRAS',
            'assunto.max' => 'O CAMPO ASSUNTO DEVE TER NO MAXIMO 3 LETRAS',

            'telefone.required' => 'O CAMPO TELEFONE É OBRIGATORIO',
            'telefone.integer' => 'O CAMPO TELEFONE DEVE SER UM TEXTO',

            'mensagem.required' => 'O CAMPO MENSAGEM É OBRIGATORIO',
            'mensagem.string' => 'O CAMPO MENSAGEM DEVE SER UM TEXTO',
        ]);

        $validator = new EmailValidator;
        $isValid = $validator->isValid($request->input('email'), new DNSCheckValidation);

        if (! $isValid) {
            return redirect()->back()->withErrors(['email' => 'O e-mail fornecido é inválido.']);
        }

        Contato::create($request->all());

        return redirect()->back()->with('success', 'Contato enviado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
