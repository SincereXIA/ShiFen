<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignAppeal extends Model
{
    protected $fillable = ['log_id', 'censor_id', 'status', 'reason', 'user_id'];

    /**
     * 当前申诉所对应的签到记录
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function signLog()
    {
        return $this->belongsTo('App\SignLog', 'log_id', 'id');
    }
}
