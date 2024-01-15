<?php

namespace App\Models;

use App\Traits\SaveToUpper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Election extends Model implements HasMedia
{
    use InteractsWithMedia;
    use LogsActivity;
    use SaveToUpper;
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'election', 'slug', 'authentication', 'start_date', 'app_start_date', 'end_date', 'app_end_date', 'enable_exhibition', 'exhibition_start_date', 'exhibition_end_date', 'is_active', 'is_sealed', 'status', 'email', 'email_sender_name', 'sms', 'sms_sender_name', 'ref', 'about_election', 'username_title', 'password_title', 'banner_title', 'banner_subtitle', 'auto_election', 'provisional_results', 'how_to_vote', 'voters_name',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable)
            ->logOnlyDirty()
            ->useLogName('Election');
        // Chain fluent methods for configuration options
    }

    protected $appends = ['logo', 'banner'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime:M d, Y g:i:s a',
        'app_start_date' => 'datetime:M d, Y g:i:s a',
        'end_date' => 'datetime:M d, Y g:i:s a',
        'app_end_date' => 'datetime:M d, Y g:i:s a',
        'exhibition_start_date' => 'datetime:M d, Y g:i:s a',
        'exhibition_end_date' => 'datetime:M d, Y g:i:s a',

    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('register')
            ->useDisk('media');

        $this->addMediaCollection('banner')
            ->onlyKeepLatest(1)
            ->useDisk('media');

        $this->addMediaCollection('logo')
            ->useDisk('media')
            ->onlyKeepLatest(1)
            ->useFallbackUrl(asset('img/logo.png'))
            ->registerMediaConversions(function (Media $media = null) {
                $this->addMediaConversion('mini')
                    ->crop('crop-center', 200, 200)
                    ->optimize();
                // ->nonQueued();
            });
    }

    public function getBannerAttribute()
    {
        return str_replace(config('app.url'), config('electo.electo_admin_url'), $this->getFirstMediaUrl('banner'));
        return $this->getFirstMediaUrl('banner');
    }

    public function getLogoAttribute()
    {
        return str_replace(config('app.url'), config('electo.electo_admin_url'), $this->getFirstMediaUrl('logo', 'mini'));
    }

    public function positions()
    {
        return $this->hasMany(Position::class)->orderBy('order_of_appearance', 'Asc');
    }

    public function contestants()
    {
        return $this->hasManyThrough(Candidate::class, Position::class)->orderBy('order_of_appearance', 'Asc');
    }

    public function register()
    {
        return $this->hasMany(User::class)->where([
            'access_role' => 'user',
        ])->orderBy('first_name');
    }

    public function verified_voters()
    {
        return $this->hasMany(User::class)->where([
            'access_role' => 'user',
        ])
            ->whereNotNull('verified_at')
            ->orderBy('first_name');
    }

    public function voted()
    {
        return $this->hasMany(User::class)->where([
            'access_role' => 'user',
        ])
            ->whereNotNull('voted_at')
            ->orderBy('first_name');
    }

    public function votes()
    {
        return $this->hasMany(User::class, 'election_id')->whereNotNull('voted_at')->count();
    }

    public function total_vote_cast()
    {
        return $this->hasMany(Vote::class)->whereNotNull('voted_at');
    }

    public function skipped_votes()
    {
        return $this->hasMany(Vote::class)->whereNotNull('voted_at')->WhereNull('candidate_id');
    }

    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $request['start_date'] = Carbon::parse($model->start_date);
            $model['end_date'] = Carbon::parse($model->end_date);
            $model['exhibition_start_date'] = $model->enable_exhibition != 'no' ? Carbon::parse($model->exhibition_start_date) : null;
            $model['exhibition_end_date'] = $model->enable_exhibition != 'no' ? Carbon::parse($model->exhibition_end_date) : null;
            $model['slug'] = Str::slug($model->election);
        });
    }
}
