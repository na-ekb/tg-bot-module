<?php

namespace Modules\TgBot\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;

use Laravel\Nova\Fields\ActionFields;
use Brightspot\Nova\Tools\DetachedActions\DetachedAction;

class SetUpWebhook extends DetachedAction
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @return mixed
     */
    public function handle(ActionFields $fields)
    {
        return DetachedAction::message('It worked!');
    }

    /**
     * Get the displayable label of the button.
     *
     * @return string
     */
    public function label()
    {
        return __('asdasdas');
    }
}
