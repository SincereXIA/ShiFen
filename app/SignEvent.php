<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignEvent extends Model
{

    protected $fillable = ['event_name', 'group_id', 'event_time', 'censor_id'];
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

    /**
     * 签到项目的创建者
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function censor()
    {
        return $this->belongsTo('App\User', 'censor_id');
    }

}
