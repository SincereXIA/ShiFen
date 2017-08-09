<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgressLog extends Model
{
    protected $table = 'progresslog';

    protected $fillable = [
        'body','user_id',
    ];
}
