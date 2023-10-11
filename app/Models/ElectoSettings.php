<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectoSettings extends Model
{
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value',
    ];
}
