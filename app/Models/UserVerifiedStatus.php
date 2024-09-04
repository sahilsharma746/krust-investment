<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerifiedStatus extends Model
{
    use HasFactory;

    protected $table = 'user_verified_status';

    protected $fillable = [
        'user_id',
        'kyc_verify_status',
        'email_verify_status',
        'phone_verify_status',
        'upgrade_prompt',
        'certificate_prompt',
        'identity_prompt',
        'custom_prompt',
        'demo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
