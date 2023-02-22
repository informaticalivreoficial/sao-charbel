<?php

namespace App\Mail\Web;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Markdown;

class Atendimento extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->data['reply_email'], $this->data['reply_name'])
            ->to($this->data['siteemail'], $this->data['sitename'])
            ->cc(['suporte@informaticalivre.com.br','reservas@hotelsaocharbel.com.br'])
            ->from($this->data['siteemail'], $this->data['sitename'])
            ->subject('#Atendimento: ' . $this->data['reply_name'])
            ->markdown('emails.atendimento', [
                'nome' => $this->data['reply_name'],
                'email' => $this->data['reply_email'],
                'mensagem' => $this->data['mensagem']
        ]);
    }
}
