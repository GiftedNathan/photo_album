<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];
    // protected $fillable = ['albums_id', 'title', 'description', 'image', 'size'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
