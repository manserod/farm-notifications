<?php
/**
 * Mailer Provider Interface
 *
 * @author Manuel
 * @since 30/10/2020
 * @version 1.0
 *
 */

namespace App\Http\Interfaces;


interface MailerProviderInterface
{
    public function send(string $email, string $message);
}