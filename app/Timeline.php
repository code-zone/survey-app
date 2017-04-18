<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = ['title', 'details', 'ip', 'user_id', 'user_agent', 'icon', 'group', 'type'];
}
