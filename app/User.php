<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()//投稿しているユーザーのリレーション
    {
        return $this->hasMany('App\Post');
    }
   
    //フォロー機能  リレーション
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id','following_id');
    }
    //フォロー解除  リレーション
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows','following_id','followed_id');
    }
    
    public function follow(Int $user_id)
    {
        return $this->followers()->attach($user_id);
    }

    public function unfollow(Int $user_id)
    {
        return $this->followers()->detach($user_id);
    }
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->followers()->where('followed_id', $user_id)->exists();
    }

    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followings()->where('following_id', $user_id)->exists();
    }
}
