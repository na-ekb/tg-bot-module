<?php
namespace Modules\TgBot\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

use Modules\TgBot\Helpers\AdminCheck;

use Telegram\Bot\Keyboard\Keyboard;

abstract class AbstractCommand extends Command
{
    /** @var string Default action method name */
    protected $defaultAction = 'start';

    /** @var string Arguments parsed from bot */
    protected $arguments = [];

    /** @var string Command Argument Pattern */
    protected $pattern;

    /** @var string Command Name */
    protected $name;

    /** @var string Command Description */
    protected $description;

    /**
     * @inheritdoc
     */
    public function handle(array $arguments = [])
    {
        dd($arguments);
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        $arguments['action'] = $arguments['action'] ?? $this->defaultAction;
        $this->arguments = $arguments;

        $this->{$arguments['action']}();
        return true;
    }

    abstract protected function start();
}
