<?php

namespace Shorty;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'link_id',
        'referer',
        'ip'
    ];
}
