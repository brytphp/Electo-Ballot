<?php

namespace App\Models;

use App\Traits\SaveToUpper;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Position extends Model
{
    use SaveToUpper;
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'election_id', 'position', 'slug', 'can_skip', 'order_of_appearance', 'votes_per_voter', 'is_active', 'color',
        'unopposed',
        'next',
        'skip',
        'previous',
    ];

    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(
                [
                    'election_id', 'position', 'slug', 'can_skip', 'order_of_appearance', 'votes_per_voter', 'is_active', 'color',
                    'unopposed',
                    'next',
                    'skip',
                    'previous',
                ]
            )
            ->logOnlyDirty()
            ->useLogName('Position');
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class)->where('is_active', 1)->orderBy('order_of_appearance', 'Asc');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class)
            ->WhereNotNull('voted_at')
            ->WhereNotNull('candidate_id')->count();
    }

    public function skipped_votes()
    {
        return $this->hasMany(Vote::class)
            ->WhereNotNull('voted_at')
            ->WhereNull('candidate_id');
    }

    public function top_candidates()
    {
        $votes = DB::table('candidates')->where('is_active', 1)->wherePosition_id($this->id)
            ->distinct()->orderBy('tally', 'DESC')->limit($this->votes_per_voter)->pluck('tally');

        foreach ($votes as $votes) {
            $top_votes[] = $votes;

            $elected = $this->hasMany(Candidate::class)->where('is_active', 1)->whereIn('tally', $top_votes)->orderBy('tally', 'Desc');

            if ($elected->count() >= $this->votes_per_voter) {
                return $elected;
            }
        }
    }

    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $model['slug'] = Str::slug($model->position);
        });
    }
}
