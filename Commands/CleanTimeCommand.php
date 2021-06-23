<?php
namespace Modules\TgBot\Commands;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

use Modules\TgBot\Entities\TgCleanDate;

class CleanTimeCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'cleanTime{action?}{date?}';

    /**
     * @var string Command Description
     */
    protected $description;

    public function __construct() {
        if (empty(config('TgBot.tg_channel'))) {
            $this->description = __('tgbot::commands.clean_time.description');
        } else {
            $this->description = __('tgbot::commands.clean_time.description_channel');
        }
    }

    /**
     * @inheritdoc
     */
    public function handle(array $arguments = [])
    {
        $arguments['action'] = $arguments['action'] ?? 'start';

        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->$arguments['action']($arguments);

        return true;
    }

    protected function start(array $arguments = [])
    {
        $user_id = $this->getUpdate()->getMessage()->getFrom()->getId();
        if (TgCleanDate::where('tg_user_id', $user_id)->exists()) {
            $from = TgCleanDate::where('tg_user_id', $user_id)->first()->date;
            $to = Carbon::now();
            $years = $to->diffInYears($from);
            $months = $to->diffInMonths($from);
            $days = $to->diffInDays($from);
            $text = "Вы чисты: {$years} лет, {$months} месяцев, {$days} дней.";
            $keyboard = [
                [
                    Keyboard::button([
                        'text' => 'Удалить дату',
                        'callback_data' => 'cleanTime del'
                    ]),
                ]
            ];
        } else {
            if (empty(config('TgBot.tg_channel'))) {
                $text = __('tgbot::commands.clean_time.set');
            } else {
                $text = __('tgbot::commands.clean_time.set_channel');
            }

            $keyboard = [
                [
                    Keyboard::button([
                        'text' => 'Установить дату',
                        'callback_data' => 'cleanTime set'
                    ]),
                ]
            ];
        }

        $this->replyWithMessage([
            'text' => $text,
            'reply_markup' => new Keyboard([
                'inline_keyboard' => $keyboard
            ])
        ]);
    }

    protected function set(array $arguments = [])
    {
        $user_id = $this->getUpdate()->getMessage()->getFrom()->getId();
        if (TgCleanDate::where('tg_user_id', $user_id)->exists()) {
            $from = TgCleanDate::where('tg_user_id', $user_id)->first()->date;
            $to = Carbon::now();
            $years = $to->diffInYears($from);
            $months = $to->diffInMonths($from);
            $days = $to->diffInDays($from);
            $text = "Вы чисты: {$years} лет, {$months} месяцев, {$days} дней.";
            $keyboard = [
                [
                    Keyboard::button([
                        'text' => 'Удалить дату',
                        'callback_data' => 'cleanTime delete'
                    ]),
                ]
            ];
        } else {
            if (empty(config('TgBot.tg_channel'))) {
                $text = __('tgbot::commands.clean_time.set');
            } else {
                $text = __('tgbot::commands.clean_time.set_channel');
            }

            $keyboard = [
                [
                    Keyboard::button([
                        'text' => 'Установить дату',
                        'callback_data' => 'cleanTime set'
                    ]),
                ]
            ];
        }

        $this->replyWithMessage([
            'text' => $text,
            'reply_markup' => new Keyboard([
                'inline_keyboard' => $keyboard
            ])
        ]);
    }

    protected function parseDate(array $arguments = []) {

    }

    protected function del(array $arguments = [])
    {
        $user_id = $this->getUpdate()->getMessage()->getFrom()->getId();
        TgCleanDate::where('tg_user_id', $user_id)->delete();
        

        $this->replyWithMessage([
            'text' => __(),
            'reply_markup' => new Keyboard([
                'inline_keyboard' => $keyboard
            ])
        ]);
    }
}
