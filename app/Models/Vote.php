<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Vote extends Model
{
    use LogsActivity;
    use UsesUuid;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable)
            ->logOnlyDirty()
            ->useLogName('Votes');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'election_id', 'candidate_id', 'position_id', 'voted_at', 'user_id', 'order_of_appearance', 'ref', 'agent', 'ip', 'platform', 'browser', 'device', 'mac_address', 'robot',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
