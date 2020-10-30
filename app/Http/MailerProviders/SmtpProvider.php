<?php
/**
 * Proveedor de servicios que usa protocolo smtp
 *
 * @author Manuel
 * @since 30/10/2020
 * @version 1.0
 *
 */

namespace App\Http\MailerProviders;


use App\Http\Interfaces\MailerProviderInterface;

class SmtpProvider implements MailerProviderInterface
{

    public function send(string $email, string $message)
    {
        return true;
    }
}