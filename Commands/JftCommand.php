<?php
namespace Modules\TgBot\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

use Modules\TgBot\Entities\TgJft;

class JftCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'jft';

    /**
     * @var string Command Description
     */
    protected $description;

    public function __construct() {
        $this->description = __('tgbot::commands.jft.description');
    }

    /**
     * @inheritdoc
     */
    public function handle(array $arguments = [])
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        $jft = TgJft::first();

        $text = "{$this->description}:" . PHP_EOL . PHP_EOL;
        $text .= "<b>{$jft->header}</b>" . PHP_EOL . PHP_EOL;
        $text .= "<i>{$jft->quote}</i>" . PHP_EOL;
        $text .= "<b>{$jft->from}</b>";

        $this->replyWithMessage([
            'text' => $text,
            'reply_markup' => new Keyboard([
                'inline_keyboard' => [
                    [
                        Keyboard::button([
                            'text'  => __('tgbot::commands.jft.more'),
                            'url'   => config('TgBot.tg_eg_link', 'https://na-russia.org/eg')
                        ]),
                        Keyboard::button([
                            'text'          => __('tgbot::commands.main'),
                            'callback_data' => 'start'
                        ])
                    ]
                ]
            ]),
            'parse_mode'    => 'HTML'
        ]);
        
        return true;
    }
}
