<?php

namespace Shorty;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'url',
        'hash'
    ];

    public $timestamps = false;
}
