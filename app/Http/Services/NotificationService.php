<?php

/**
 * Servicio de notificaión. Envia un email de usuario. Acepta proveedores de envío
 * que implementen MailerProviderInterface
 *
 * @author Manuel
 * @since 30/10/2020
 * @version 1.0
 *
 */
namespace App\Http\Services;


use App\Http\Interfaces\MailerProviderInterface;
use App\Models\User;

class NotificationService
{

    /**
     * @var MailerProviderInterface
     */
    protected $mailerProvider;

    /**
     * NotificationService constructor.
     * @param MailerProviderInterface $mailerProvider
     */
    public function __construct(MailerProviderInterface $mailerProvider)
    {
        $this->mailerProvider = $mailerProvider;
    }

    public function notify(User $user, string $text)
    {
        $userEmail = config('farm.test.defaultTo'); // $user->email

        return $this->mailerProvider->send($userEmail, $text);
    }
}