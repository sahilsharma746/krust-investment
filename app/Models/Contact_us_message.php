<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_us_message extends Model
{
    use HasFactory;
    protected $fillable =['email','message'] ;
}
