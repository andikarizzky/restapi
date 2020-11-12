<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
        'name', 'detail', 'stock','price','discount', 'user_id'
    ];
    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }

    /**
     * Get the user that added the product.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
