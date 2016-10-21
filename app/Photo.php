<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title', 'photo_0', 'photo_1', 'thumbnail'];
}
