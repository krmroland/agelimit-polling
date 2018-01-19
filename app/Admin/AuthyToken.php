<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\NoUnUsedTokensException;

class AuthyToken extends Model
{
    protected $guarded = [];

    public function getAll()
    {
        return  cache()->remember('authyTokens', 1440, function () {
            return $this->all();
        });
    }

    public static function boot()
    {
        foreach (['creating', 'deleting', 'updating'] as $event) {
            static::$event(function () {
                cache()->forget('authyTokens');
            });
        }
    }

    public static function getNextToken()
    {
        return (new static())->nextToken();
    }

    protected function nextToken($message = null)
    {
        // $this
        $this->flushOldTokens();

        $token = static::where(['state' => 'Un Used'])->oldest('created_at')->first();
        if ($token) {
            $token->state = 'Active';
            $token->modeOfActivation = 'Automatic';
            $token->save();

            return $token->value;
        }
        throw new NoUnUsedTokensException($message ?: 'No unused tokens');
    }

    public function scopeCanBeActivated($builder)
    {
        return $builder->whereDate('updated_at', '<', today());
    }

    protected function flushOldTokens()
    {
        return $this->canBeActivated()->update(['state' => 'Un Used']);
    }

    public static function activeToken()
    {
        return cache()->rememberForever('activeToken', function () {
            $token = static::where(['state' => 'Active'])->first();

            return $token ? $token->value : static::getNextToken();
        });
    }

    public function toggleState()
    {
        return tap($this, function ($token) {
            $token->state == 'Active' ? $token->state = 'Used Up' : $token->state = 'Active';
            $token->modeOfActivation = 'Manual';
            $token->save();
            cache()->forget('activeToken');
        });
    }
}
