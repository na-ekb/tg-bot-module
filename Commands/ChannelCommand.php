<?php
namespace Modules\TgBot\Commands;


use Illuminate\Support\Collection;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

use Telegram\Bot\Keyboard\Keyboard;

class ChannelCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'channel';

    /**
     * @var string Command Description
     */
    protected $description;

    public function __construct() {
        $this->description = __('tgbot::commands.channel.description');
    }

    /**
     * @inheritdoc
     */
    public function handle(array $arguments = [])
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        $arguments['action'] = $arguments['action'] ?? 'adding';
        
        $this->replyWithMessage([
            'text'          => $this->description,
            'reply_markup'  => new Keyboard([
                'inline_keyboard' => [
                    [
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                    ],
                    [
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                        Keyboard::button([
                            'text'          => 'Текст',
                            'callback_data' => 'start'
                        ]),
                    ]
                ],
            ])
        ]);

        return true;
    }
}
