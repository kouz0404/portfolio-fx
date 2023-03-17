<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'nickname',
        'email',
        'password',
        'image_name',
        'introduce'
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
    protected $casts = ['email_verified_at' => 'datetime',];

            // 「１対多」の「多」側 → メソッド名は複数形
            public function posts()
            {
              return $this->hasMany('App\Models\Post');
            }
            public function likes()
            {
              return $this->hasMany('App\Models\Like');
            }
          
            public function follows()
            {
              return $this->hasMany('App\Models\Follow');
            }


            public function notifications()
            {
              return $this->hasMany('App\Models\Notification');
            }

}
