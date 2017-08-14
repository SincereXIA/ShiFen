<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * 属于该用户组中的用户们
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_group', 'group_id', 'user_id');
    }

    public function signEvents()
    {
        return $this->hasMany('App\SignEvent', 'group_id', 'id');
    }

}
