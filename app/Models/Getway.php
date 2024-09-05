<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Getway extends Model
{
    use HasFactory;
    protected $guarded = [];


    public static function getAdminGatewayID(){
         return Getway::select('id')->where('name', 'admin')->first();

    }


}
