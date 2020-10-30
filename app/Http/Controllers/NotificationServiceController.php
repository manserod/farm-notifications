<?php
/**
 * Controlador de notificaciones de usuario
 *
 * @author Manuel
 * @since 30/10/2020
 * @version 1.0
 *
 */

namespace App\Http\Controllers;


use App\Http\Services\NotificationService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\farmResponser;

class NotificationServiceController
{

    /**
     * Utilizamos nuestro helper de response
     */
    use farmResponser;

    /**
     * @var NotificationService
     */
    protected $notificationService;
    /**
     * @var int
     */
    private $id;


    /**
     * @param int $id
     * @param NotificationService $notificationService
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id, NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
        $this->id = $id;

        return $this->sendNotification();
    }

    /**
     * Enviamos notificacion al cliente usando protocolo smtp
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendNotification()
    {

        $response = [
            'id' => $this->id,
            'email' => config('farm.test.defaultTo'), //$user->email,
            'message' => config('farm.test.message'),
            'result' => $this->notificationService->notify($this->getUser(), config('farm.test.message'))
        ];

        return $this->response($response);

    }

    /**
     * Encuentra el usuario al que enviar el email
     *
     * @return User
     */
    private function getUser(){

        return new User();
    }
}