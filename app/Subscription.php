<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * the mass assignable fields.
     *
     * @var array
     */
    protected $fillable = ['email'];
}
