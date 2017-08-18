<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignLog extends Model
{
    protected $table = 'sign_logs';
    protected $fillable = ['user_id', 'event_id', 'status', 'excuse_id'];

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
     * 记录对应的请假条
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function excuse()
    {
        return $this->belongsTo('App\SignExcuse', 'excuse_id', 'id');
    }

    /**
     * 签到记录对应的签到项目
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function signEvent()
    {
        return $this->belongsTo('App\SignEvent', 'event_id', 'id');
    }

}
