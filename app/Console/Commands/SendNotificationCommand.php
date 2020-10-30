<?php

namespace App\Console\Commands;

use App\Http\MailerProviders\SesProvider;
use App\Http\Services\NotificationService;
use App\Models\User;
use Illuminate\Console\Command;
use App\Http\Traits\farmResponser;

class SendNotificationCommand extends Command
{
    use farmResponser;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendNotification:to {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to user';

    protected $notificationService;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        // Para commands se utiliza el proveedor con protocolo ses
        $this->notificationService = new NotificationService(new SesProvider());

        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = [
            'id' => $this->argument('user'),
            'email' => config('farm.test.defaultTo'), //$this->>user->email,
            'message' => config('farm.test.message'),
            'result' => $this->notificationService->notify($this->getUser(), config('farm.test.message'))
        ];

        $this->responseConsole($response);
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
