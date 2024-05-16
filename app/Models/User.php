<?php

namespace App\Models;

use App\Traits\SaveToUpper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Propaganistas\LaravelPhone\Casts\RawPhoneNumberCast;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use InteractsWithMedia;
    use Notifiable;
    use SaveToUpper;
    use UsesUuid;

    protected $appends = ['avatar', 'masked_email', 'masked_phone'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'other_names', 'email', 'voter_id', 'election_id', 'session_id', 'phone', 'verified_at', 'voted_at', 'attempted_at', 'access_role', 'password', 'id',  'email_checked_at', 'phone_checked_at', 'country_code', 'international_phone', 'otp', 'otp_expires_at', 'otp_attempts', 'system_checked_phone_at', 'fcm_token', 'receipt_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified_at' => 'datetime:M d, Y g:i:s a',
        'details_confirmed_at' => 'datetime:M d, Y g:i:s a',
        'voted_at' => 'datetime:M d, Y g:i:s a',
        'otp_expires_at' => 'datetime',
        'attempted_at' => 'datetime',
        // 'phone' => RawPhoneNumberCast::class.':GH',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->useDisk('media')
            ->onlyKeepLatest(1)
            ->useFallbackUrl(asset('img/avatar.jpg'));
    }

    public function getAvatarAttribute()
    {
        //Check if media has collection and return default.jpg if false
        if ($this->media == null) {
            return asset('img/avatar.jpg');
        } else {
            return $this->getFirstMediaUrl('avatar');
        }
    }

    public function getMaskedEmailAttribute()
    {
        return mask_email($this->email);
    }

    public function getMaskedPhoneAttribute()
    {
        return mask($this->phone, 3, 3);
    }

    public function routeNotificationForHellioSMS()
    {
        return $this->phone; // where phone is a column in your users table;
    }

    public function logins()
    {
        return $this->hasMany(Login::class, 'model_id', 'id')->latest();
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class)->orderBy('created_at');
    }

    public function otps()
    {
        return $this->hasMany(OtpHistory::class)->latest();
    }
}
