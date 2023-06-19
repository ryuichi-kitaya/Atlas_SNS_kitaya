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
        'username', 'mail', 'password','bio','images'
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
   
    //フォローしている  リレーション
    //第3引数→自分のID
    //第4引数→相手のIDが入る
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }
    //フォローされている  リレーション
    public function followed()
    {
        return $this->belongsToMany(User::class, 'follows','followed_id','following_id');
    }

    //フォローしているの確認
    //自分のID＝followed
    public function isFollowing(User $user)
    {
        return (boolean) $this->following()->where('followed_id', $user->id)->exists();
    }
    //フォローされているかの確認
    //相手のID＝following
    public function isFollowed(User $user)
    {
        return (boolean) $this->followed()->where('following_id', $user->id)->exists();
    }
}
