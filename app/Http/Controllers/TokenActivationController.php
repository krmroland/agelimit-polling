<?php

namespace App\Http\Controllers;

use App\Admin\AuthyToken;

class TokenActivationController extends Controller
{
    public function update(AuthyToken $token)
    {
        return $token->toggleState();
    }
}
