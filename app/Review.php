<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
        'customer', 'star', 'review'
    ];
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that made the review.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
