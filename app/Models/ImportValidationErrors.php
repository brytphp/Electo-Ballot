<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportValidationErrors extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['row', 'attribute', 'errors', 'value', 'election_id'];

    protected static $logOnlyDirty = true;
}
