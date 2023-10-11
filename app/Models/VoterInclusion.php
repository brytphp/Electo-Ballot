<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class VoterInclusion extends Model
{
    use LogsActivity;
    use UsesUuid;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(
                [
                    'voter_id',
                    'level',
                    'surname',
                    'other_names',
                    'email',
                    'phone',
                    'status',
                    'email_update',
                    'phone_update',
                    'voter_id_update',
                    'voter_inclusion',
                ]
            )
            ->logOnlyDirty()
            ->useLogName('Voter Inclusion');
        // Chain fluent methods for configuration options
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voter_id',
        'level',
        'surname',
        'other_names',
        'email',
        'phone',
        'status',
        'email_update',
        'phone_update',
        'voter_id_update',
        'voter_inclusion',
    ];
}
