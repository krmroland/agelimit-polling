<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollResultIp extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        foreach (['creating', 'deleting', 'updating'] as $event) {
            static::$event(function () {
                cache()->forget('poll_results_details');
            });
        }
    }
}
