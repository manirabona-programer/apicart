<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    use HasFactory;

    public const IS_USER = 1;
    public const IS_MANAGER = 2;

    public function user() {
        return $this->belongsToMany(User::class);
    }
}
