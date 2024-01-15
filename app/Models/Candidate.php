<?php

namespace App\Models;

use App\Traits\SaveToUpper;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Candidate extends Model implements HasMedia
{
    use InteractsWithMedia;
    use SaveToUpper;
    use UsesUuid;

    protected $appends = ['avatar', 'pic'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'election_id', 'position_id', 'color', 'first_name', 'other_names', 'email', 'phone', 'about', 'social_media_handles', 'is_active', 'order_of_appearance', 'tally',
    ];

    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable)
            ->logOnlyDirty()
            ->useLogName('Candidate');
        // Chain fluent methods for configuration options
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'social_media_handles' => 'array',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->useDisk('media')
            ->onlyKeepLatest(1)
            ->useFallbackUrl(asset('img/avatar.png'))
            ->registerMediaConversions(function (?Media $media = null) {
                $this->addMediaConversion('mini')
                    ->crop('crop-center', 70, 70)
                    ->optimize();
                // ->nonQueued();
            });
    }

    public function avatar()
    {
        return $this->hasOne(Media::class, 'model_id', 'id');
    }

    public function getAvatarAttribute()
    {
        if ($this->media->isEmpty()) {
            return asset('img/avatar.png');
        } else {
            return str_replace(config('app.url'), config('electo.electo_admin_url'), $this->getFirstMediaUrl('avatar'));
        }
    }

    public function getPicAttribute()
    {

        if ($this->getFirstMedia()) {
            return $this->getMedia('avatar')[0]->getPath();
        }

        return asset('img/avatar.jpg');

        if ($this->media == null) {
            return asset('img/avatar.jpg');
        } else {
            return $pic = $this->getMedia('avatar')[0]->getPath();
        }
    }

    public function votes()
    {
        return $this->hasMany(Vote::class)->WhereNotNull('voted_at')->count();
    }
}
