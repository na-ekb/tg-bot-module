<?php

namespace Modules\TgBot\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Telegram\Bot\Laravel\Facades\Telegram;

class TgBotController extends Controller
{
    /**
     * Recive update from bot api.
     * @var
     * @return void
     */
    public function handle(Request $request, string $token) :string
    {
        if ($token == config('telegram.webhook_secret_token')) {
            $commands = Telegram::commandsHandler(true);

            dump($commands);

            $updates = Telegram::getWebhookUpdates();
            if ($updates->has('message')) {
                $message = $updates->getMessage();
                if ($message->has('location')) {
                    Telegram::bot()->triggerCommand('geo', $updates, null, true);
                }
            }
        }

        return 'OK';
    }
}
