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
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }
    //フォロー解除  リレーション
    public function follower()
    {
        return $this->belongsToMany(User::class, 'follows','following_id','followed_id');
    }

    //フォローしているかの確認
    public function isFollowing(User $user)
    {
        return (boolean) $this->followers()->where('followed_id', $user_id)->exists();
    }
    //フォロー解除しているかの確認
    public function isFollowed(User $user)
    {
        return (boolean) $this->followings()->where('following_id', $user_id)->exists();
    }
}
