<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignEvent extends Model
{
    /**
     * 签到项目所属的用户组
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id');
    }

    /**
     * 签到项目所拥有的签到记录
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signLogs()
    {
        return $this->hasMany('App\SignLog', 'event_id', 'id');
    }
}