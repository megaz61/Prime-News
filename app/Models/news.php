<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $guarded = [];
    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        // 'updated_at' => 'datetime',
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
