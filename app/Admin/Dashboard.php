<?php

namespace App\Admin;

class Dashboard
{
    public function items()
    {
        return $this->all();
    }

    protected function all()
    {
        return [
            'tokens.index',
            'notifications',
            'summary',
        ];
    }
}
