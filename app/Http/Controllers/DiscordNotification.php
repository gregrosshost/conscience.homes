<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiscordNotification extends Controller
{
    public function notification()
    {
        return Http::post('https://discord.com/api/webhooks/1220548811106160670/lj2IFdyWoIhlFlw44Qq8zoEzP7un6Eg42UHpBb31iaQgECC0BE7pok1QAKIjqIqKRRNC', [
            'content' => "Member.\n DateTime.\n Fellowship.\n Topic.\n Location.\n",
        ]);
    }
}
