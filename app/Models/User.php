<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    protected $guarded = [];
    use HasFactory;

    public function news()
    {
        return $this->hasmany('App\Models\news', 'user_id', 'id');
    }
}
