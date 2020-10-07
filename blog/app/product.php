<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class product extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'category_id', 'user_id', 'description', 'condition', 'location_id', 'price', 'image',
    ];

    public function message()
    {
        return $this->hasMany('App\message');
    }

    public function location()
    {
        return $this->belongsTo('App\location');
    }

    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
