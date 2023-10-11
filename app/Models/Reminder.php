<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Reminder extends Model
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(
                [
                    'voters',
                    'from',
                    'to',
                    'sms',
                    'email',
                    'status',
                    'first_name',
                    'phone',
                    'mail',
                    'batch',
                ]
            )
            ->logOnlyDirty()
            ->useLogName('Reminder');
        // Chain fluent methods for configuration options
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'voters',
        'from_date',
        'to_date',
        'sms',
        'email',
        'status',
    ];

    protected $casts = [
        'from_date' => 'datetime:M d, Y g:i:s a',
        'to_date' => 'datetime:M d, Y g:i:s a',
    ];
}
