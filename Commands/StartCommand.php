<?php
namespace Modules\TgBot\Commands;

use Telegram\Bot\Keyboard\Keyboard;
use Modules\TgBot\Entities\TgTokens;

class StartCommand extends AbstractCommand
{
    /** @inheritdoc */
    protected $name = 'start';

    /** @inheritdoc */
    protected $pattern = 'start{token?}';

    public function __construct() {
        $this->description = __('tgbot::commands.start.description');
    }

    protected function start() {
        if (
            !empty($this->arguments['token']) &&
            TgTokens::where('token', $this->arguments['token'])->exists()
        ) {
            $token = TgTokens::where('token', $this->arguments['token'])->first();
            $this->triggerCommand($token->command);
            return;
        }

        $this->replyWithMessage([
            'text'          => $this->description,
            'reply_markup'  => new Keyboard([
                'inline_keyboard' => [
                    [
                        Keyboard::button([
                            'text'          => __('tgbot::commands.start.who.novice'),
                            'callback_data' => 'channel  novice'
                        ])
                    ],
                    [
                        Keyboard::button([
                            'text'          => __('tgbot::commands.start.who.profi'),
                            'callback_data' => 'channel  profi'
                        ])
                    ],
                    [
                        Keyboard::button([
                            'text'          => __('tgbot::commands.start.who.parent'),
                            'callback_data' => 'channel  parent'
                        ])
                    ],
                    [
                        Keyboard::button([
                            'text'          => __('tgbot::commands.start.who.member'),
                            'callback_data' => 'channel  member'
                        ])
                    ],
                ]
            ]),
            'parse_mode'    => 'HTML'
        ]);
    }
}
