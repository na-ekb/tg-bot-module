<?php

namespace Modules\TgBot\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

use Modules\TgBot\Jobs\SendMeetingsToChannel;

class ScheduleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->job(new SendMeetingsToChannel)->dailyAt('08:00');
        });
    }

    public function register()
    {
    }
}