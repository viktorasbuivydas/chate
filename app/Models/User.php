<?php

namespace App\Models;

use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function stats()
    {
        return $this->hasMany(Stat::class);
    }

    public static function boot()
    {
        parent::boot();

        User::observe(UserObserver::class);
    }

    public function ratings()
    {
        return $this->hasMany(SuggestionRating::class);
    }

    public function receivedMessages()
    {
        return $this->hasMany(Inbox::class, 'receiver_id', 'id');
    }

    public function lastReceivedUserMessage()
    {
        return $this->hasOne(Inbox::class, 'receiver_id')->latestOfMany();
    }

    public function lastSentUserMessage()
    {
        return $this->hasOne(Inbox::class, 'receiver_id')->latestOfMany();
    }

    public function sentMessages()
    {
        return $this->hasMany(Inbox::class, 'sender_id');
    }
}
