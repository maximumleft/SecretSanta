<?php

namespace App\Services;

use App\Events\SendNotificationEvent;
use App\Models\Contest;
use App\Models\Result;

class SantaService
{
    public function addUserToContest($user)
    {
        $contest = Contest::query()
            ->where('user_id', $user->id)
            ->exists();
        if (!$contest) {
            Contest::create([
                'user_id' => $user->id,
            ]);
        }
    }

    public function deleteUserFromContest($user)
    {
        $contest = Contest::query()
            ->where('user_id', $user->id)
            ->exists();
        if ($contest) {
            Contest::query()
                ->where('user_id', $user->id)
                ->delete();
        }
    }
    public function mixingUsers()
    {
        $users = Contest::all();
        $participants = $users->shuffle();
        $count = count($participants);
        $result = Result::query()->exists();
        if($result)
        {
            Result::query()->delete();
            for ($i = 0; $i < $count; $i++) {
                Result::create([
                    'first_id' => $participants[$i]->user_id,
                    'second_id' => $participants[($i + 1) % $count]->user_id,
                ]);
            }
        } else{
            for ($i = 0; $i < $count; $i++) {
                Result::create([
                    'first_id' => $participants[$i]->user_id,
                    'second_id' => $participants[($i + 1) % $count]->user_id,
                ]);
            }
        }
        event(new SendNotificationEvent());
    }
}
