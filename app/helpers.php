<?php

function flash($message = null, $title = null, $type = null)
{
    if (!(func_get_args())) {
        return app('App\Http\Flash');
    }

    return app('App\Http\Flash')->message($message)->title($title)->type($type)->make();
}
