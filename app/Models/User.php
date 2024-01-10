<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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



    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class)->latest();
    }

    protected function subscriptionsRelation(): HasMany
    {
        return $this->hasMany(Follower::class);
    }

    public function subscriptions()
    {
        $arr = $this->subscriptionsRelation->pluck('follow_id')->toArray();
        return User::query()->where('id', $arr)->get();
    }


    protected function followersRelation(): HasMany
    {
        return $this->hasMany(Follower::class, 'follow_id');
    }

    public function followers()
    {
        $arr = $this->followersRelation->pluck('user_id')->toArray();

        return User::query()->where('id', $arr)->get();
    }


    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }
}
