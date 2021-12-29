<?php

namespace Modules\TgBot\Entities;

use Illuminate\Database\Eloquent\Model;

class TgJft extends Model
{
    public $table = 'tg_jft';
    protected $guarded = [
        'id'
    ];
}
