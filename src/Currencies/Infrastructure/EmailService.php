<?php

namespace Hoyvoy\Currencies\Infrastructure;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendCurrencyUpdateMail()
    {
        $to = 'cambio@moneda.es';
        $from = 'lebrero.leon@gmail.com';
        $subject = 'Actualización de Divisas';
        $message = 'Se han actualizado las divisa.';

        Mail::raw($message, function ($mail) use ($to, $subject, $from) {
            $mail->to($to)
                ->from($from)
                ->subject($subject);
        });
    }
}
