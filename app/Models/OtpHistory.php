<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpHistory extends Model
{
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'otp',
        'otp_expires_at',
    ];

    protected $casts = [
        'otp_expires_at' => 'datetime:M d, Y g:i:s a',
        'created_at' => 'datetime:M d, Y g:i:s a',
    ];
}
