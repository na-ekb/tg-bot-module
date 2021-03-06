<?php

namespace Modules\TgBot\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

use Telegram\Bot\Laravel\Facades\Telegram;

use Modules\TgBot\Entities\TgState;

class TgBotController extends Controller
{
    /**
     * Recive update from bot api.
     * @var
     * @return void
     */
    public function handle(Request $request, string $token) :string
    {
        try {
            if ($token == config('telegram.webhook_secret_token')) {
                $commands = Telegram::commandsHandler(true);
                $update = Telegram::getWebhookUpdates();

                if ($update->has('message') || $update->has('callback_query')) {
                    $message = $update->getMessage();
                    $user_id = $message->getChat()->getId();

                    if (empty($commands)) {
                        $state = TgState::where('tg_user_id', $user_id)->first();
                        if ($state) {
                            Telegram::bot()->triggerCommand($state->state, $update, null, true);
                        }
                    } else {
                        if (Cache::has("TgBot.withoutState.{$user_id}")) {
                            Cache::forget("TgBot.withoutState.{$user_id}");
                        } else {
                            TgState::updateOrCreate([
                                'tg_user_id' => $user_id
                            ], [
                                'state' => array_pop($commands)
                            ]);
                        }
                    }
                }

                if ($update->has('callback_query')) {
                    try {
                        Telegram::bot()->answerCallbackQuery(['callback_query_id' => $update->callbackQuery->get('id')]);
                    } catch (\Throwable $e) {
                        //
                    }
                }
            }

            return 'OK';
        } catch (\Throwable $e) {
            throw $e;
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ], 500);
        }

    }
}
