<?php

namespace App\Http\Controllers;

use App\Mail\SamobilidadeEmail as Email;
use App\Models\Contato;
use App\Models\Legislacao;
use App\Models\Noticia;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        // Validação dos dados
        $data = $request->validate([
            'nome' => 'required|string|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'assunto' => 'required|string|min:3|max:80',
            'telefone' => 'required|regex:/^\(\d{2}\) \d{5}-\d{4}$/',
            'mensagem' => 'required',
        ], [
            'nome.required' => 'O CAMPO NOME É OBRIGATÓRIO',
            'nome.string' => 'O CAMPO NOME DEVE SER UM TEXTO',
            'nome.min' => 'O CAMPO NOME DEVE TER NO MÍNIMO 3 LETRAS',
            'nome.max' => 'O CAMPO NOME DEVE TER NO MÁXIMO 255 CARACTERES',

            'email.required' => 'O CAMPO EMAIL É OBRIGATÓRIO',
            'email.email' => 'O CAMPO EMAIL DEVE SER UM EMAIL VÁLIDO',
            'email.min' => 'O CAMPO EMAIL DEVE TER NO MÍNIMO 3 CARACTERES',
            'email.max' => 'O CAMPO EMAIL DEVE TER NO MÁXIMO 255 CARACTERES',

            'assunto.required' => 'O CAMPO ASSUNTO É OBRIGATORIO',
            'assunto.string' => 'O CAMPO ASSUNTO DEVE SER UM TEXTO',
            'assunto.min' => 'O CAMPO ASSUNTO DEVE TER NO MINIMO 3 LETRAS',
            'assunto.max' => 'O CAMPO ASSUNTO DEVE TER NO MAXIMO 80 LETRAS',

            'telefone.required' => 'O CAMPO TELEFONE É OBRIGATÓRIO',
            'telefone.regex' => 'O CAMPO TELEFONE DEVE SER DO FORMATO (00) 00000-0000',
            'telefone.unique' => 'ESTE TELEFONE JÁ ESTÁ CADASTRADO',

            'mensagem.required' => 'O CAMPO MENSAGEM É OBRIGATÓRIO',
        ]);

        // Validação de DNS do e-mail
        $validator = new EmailValidator;
        $isValid = $validator->isValid($request->input('email'), new DNSCheckValidation);

        if (! $isValid) {
            return redirect()->back()->withErrors(['email' => 'O e-mail fornecido é inválido.']);
        }

        // Criar o registro de contato no banco de dados
        $contact = Contato::create($data);

        // Enviar o e-mail usando o e-mail do formulário
        Mail::to('EMAIL_DESEJADO_PARA_O_PROJETO')
            ->send(new Email($contact->nome, $contact->mensagem, $contact->assunto, $contact->telefone, $contact->email));

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
