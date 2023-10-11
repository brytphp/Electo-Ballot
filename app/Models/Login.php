<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable = [
        'model_id', 'agent', 'ip', 'platform', 'browser', 'device', 'mac_address', 'robot',
    ];

    protected $casts = [
        'created_at' => 'datetime:M d, Y g:i:s a',
    ];
}
