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

    /**
     * 组内包含的签到事项
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signEvents()
    {
        return $this->hasMany('App\SignEvent', 'group_id', 'id');
    }

    /**
     * 本组管理的其他组实例
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adminAtGroups()
    {
        return $this->hasMany('App\Group', 'admin_group_id', 'id');
    }
}
