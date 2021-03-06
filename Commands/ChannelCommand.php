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
    protected $name = 'channel{action?}';

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
        $arguments['action'] = $arguments['action'] ?? 'addToChannel';

        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->{$arguments['action']}($arguments);

        return true;
    }

    public function addToChannel(array $arguments = [])
    {

    }

    public function postToChannel(array $arguments = [])
    {

    }
}
