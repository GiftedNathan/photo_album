<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // protected $fillable = ['name', 'description', 'cover_image'];
    protected $guarded = [];

    public function photos()
    {
        // return $this->hasMany('App\Photo', 'foreign_key', 'local_key');
        return $this->hasMany(Photo::class);
    }
}
