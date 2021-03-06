<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'student_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 用户在留言板中的留言
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messagesOnBoard()
    {
        return $this->hasMany('App\Messageboard', 'user_id');
    }

    /**
     * 用户详细信息
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userInfo()
    {
        return $this->hasOne('App\UserInfo', 'user_id');
    }

    /**
     * 用户所属用户组
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany('App\Group', 'user_group', 'user_id', 'group_id');
    }

    /**
     * 用户点名记录
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signLogs()
    {
        return $this->hasMany('App\SignLog', 'user_id');
    }

    /**
     * 用户请假条
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signExcuses()
    {
        return $this->hasMany('App\SignExcuse', 'user_id');
    }

    /**
     * 审批过的请假条
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function approvalExcuses()
    {
        return $this->hasMany('App\SignExcuse', 'censor_id');
    }

    /**
     * 用户拥有的，具有管理权限的组
     *
     * @return $this
     */
    public function adminGroups()
    {
        return $this->groups()->whereIn('group_id', \DB::table('groups')->whereNotNull('admin_group_id')->pluck('admin_group_id'));
    }

    /**
     * 用户申诉
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signAppeals()
    {
        return $this->hasMany('App\SignAppeal', 'user_id');
    }
}
