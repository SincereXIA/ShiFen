<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_infos';

    /**
     * 该用户信息对应的用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
