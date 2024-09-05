@component('mail::message')
# Fale Conosco - Samobilidade

Olá, você recebeu uma nova mensagem de contato.

---

**Nome:** {{ $nome }}

**Mensagem:**  
{{ $mensagem }}

---

**Informações de Contato:**

- **Telefone:** {{ $telefone }}
- **Email:** {{ $email }}

---

@component('mail::button', ['url' => 'mailto:' . $email])
Responder por Email
@endcomponent


@endcomponent
