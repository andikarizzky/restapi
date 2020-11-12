<?php

// PS D:\Program Files\7.4\htdocs\tutorial aplikasi\api\latihan-rest-api-1> php artisan passport:install
// Encryption keys already exist. Use the --force option to overwrite them.
// Personal access client created successfully.
// Client ID: 1
// Client secret: NLVI5NEOrAc9vqaBoOTkceJn6Uh9XKtHJUloDpQR
// Password grant client created successfully.
// Client ID: 2
// Client secret: UiQ4yq7ZcFM0YNEKKv4icdDi7aGtDvdGZhcQfMq3
// PS D:\Program Files\7.4\htdocs\tutorial aplikasi\api\latihan-rest-api-1> php artisan passport:install --force
// Encryption keys generated successfully.
// Personal access client created successfully.
// Client ID: 3
// Client secret: Kq8BkZgfPZ6GCj9bsmp7DLICvjDgobPeR7H2KRlB
// Password grant client created successfully.
// Client ID: 4
// Client secret: hurlRtehEk2j5yyylXNWv3aQBlD5mKsF2n2dfNqw

// Call login or register apis put $accessToken.

// ‘headers’ => [
// ‘Accept’ => ‘application/json’,
// ‘Authorization’ => ‘Bearer ‘.$accessToken,

// ]

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books()
    {
      return $this->hasMany(Book::class);
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
    * Get the reviews the user has made.
    */
    public function reviews()
    {
   return $this->hasMany('App\Review');
    }

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class);
    }
}
