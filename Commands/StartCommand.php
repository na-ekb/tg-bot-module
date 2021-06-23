<?php
namespace Modules\TgBot\Commands;

use morphos\Russian\GeographicalNamesInflection;
use morphos\Russian\Cases;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Exceptions\TelegramResponseException;

use Modules\TgBot\Helpers\AdminCheck;

class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'start';

    /**
     * @var string Command Description
     */
    protected $description;

    public function __construct() {
        $this->description = __('tgbot::commands.start.description');
    }

    /**
     * @inheritdoc
     */
    public function handle(array $arguments = [])
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        $keyboard = [];

        if (!empty(config('TgBot.tg_default_city'))) {
            $where = GeographicalNamesInflection::getCase(config('TgBot.tg_default_city'), Cases::LOCATIVE);
            $keyboard[] = [
                Keyboard::button([
                    'text'          => __('tgbot::commands.start.groups_in') . " {$where}",
                    'callback_data' => 'groups  0'
                ]),
                Keyboard::button([
                    'text'          => __('tgbot::commands.start.groups_region'),
                    'callback_data' => 'groups  1'
                ])
            ];
        } else {
            $keyboard[] = [
                Keyboard::button([
                    'text'          => __('tgbot::commands.start.groups'),
                    'callback_data' => 'groups  0'
                ])
            ];
        }

        $keyboard[] = [
            Keyboard::button([
                'text'          => __('tgbot::commands.start.geo'),
                'callback_data' => 'groups  2'
            ])
        ];

        $keyboard[2][] = Keyboard::button([
            'text'          => __('tgbot::commands.start.clean_time'),
            'callback_data' => 'cleanTime'
        ]);

        $row = 3;
        if (!empty(config('TgBot.tg_channel'))) {
            // Проверка подписан ли человек на рассылку
            $user_id = $this->getUpdate()->getMessage()->getFrom()->getId();
            $chatMember = $this->getTelegram()->getChatMember([
                'chat_id' => config('TgBot.tg_channel'),
                'user_id' => $user_id
            ]);

            if ($chatMember == false) {
                $keyboard[$row][] = Keyboard::button([
                    'text'          => __('tgbot::commands.start.channel'),
                    'callback_data' => 'addToChannel'
                ]);
            } else {
                $keyboard[$row][] = Keyboard::button([
                    'text'          => __('tgbot::commands.start.channel_post'),
                    'callback_data' => 'postToChannel'
                ]);
            }
            $row++;
        }

        // Проверка на админа
        if (!empty(config('TgBot.tg_channel')) && AdminCheck::isAdmin(config('TgBot.tg_channel'), $user_id)) {
            $keyboard[$row][] = Keyboard::button([
                'text'          => __('tgbot::commands.start.admin'),
                'callback_data' => 'admin'
            ]);
            $row++;
        }

        $this->replyWithMessage([
            'text'          => $this->description,
            'reply_markup'  => new Keyboard([
                'inline_keyboard' => $keyboard
            ]),
            'parse_mode'    => 'HTML'
        ]);

        return true;
    }
}
