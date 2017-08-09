<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class MessageBoard extends Model
{
    protected $table = 'message_board';

    protected $fillable = [
        'body', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
