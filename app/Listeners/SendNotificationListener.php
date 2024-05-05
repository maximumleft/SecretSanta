<?php

namespace App\Listeners;

use App\Models\Notification;
use App\Models\Result;
use App\Models\User;

class SendNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(): void
    {
        $results = Result::query()->get();
        foreach ($results as $result) {
            $firstUser = User::find($result['first_id']);
            $secondUser = User::find($result['second_id']);
            Notification::create([
                'user_id' => $firstUser->id,
                'message' => "Вы выбраны тайным сантой для $secondUser->id"]);
        }
    }
}
