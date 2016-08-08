<?php

namespace Shorty;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'url',
        'hash',
        'user_id'
    ];

    public function clicks() {
        return $this->hasMany('Shorty\Click');
    }

    public function user() {
        return $this->belongsTo('Shorty\User');
    }

}
