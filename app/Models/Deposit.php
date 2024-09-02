<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getway() {
        return $this->hasOne(Getway::class, 'id', 'getway_id');
    }
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
