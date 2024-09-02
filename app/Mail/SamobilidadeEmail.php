<?php

// App\Mail\SamobilidadeEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SamobilidadeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;

    public $mensagem;

    public $email;

    public $telefone;

    public $assunto;

    public function __construct($nome, $mensagem, $assunto, $telefone, $email)
    {
        $this->nome = $nome;
        $this->mensagem = $mensagem;
        $this->assunto = $assunto;
        $this->telefone = $telefone;
        $this->email = $email;
    }

    public function build()
    {
        return $this->from('EMAIL_DESEJADO_PARA_O_PROJETO', $this->nome)
            ->to('EMAIL_DESEJADO_PARA_O_PROJETO')
            ->subject($this->assunto)
            ->markdown('emails.mensagem')
            ->with([
                'mensagem' => $this->mensagem,
                'telefone' => $this->telefone,
                'email' => $this->email,
                'nome' => $this->nome,
            ]);
    }
}
