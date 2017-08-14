<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignExcuse extends Model
{
    protected $table = 'sign_excuses';

    /**
     * 属于的用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * 属于的审核者
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function censor()
    {
        return $this->belongsTo('App\User', 'censor_id', 'id');
    }

    /**
     * 受该假条影响的签到记录
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signLogs()
    {
        return $this->hasMany('App\SignLog', 'excuse_id', 'id');
    }
}
