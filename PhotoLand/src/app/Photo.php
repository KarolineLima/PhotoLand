<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'user_id',
        'fotografo',
        'local',
        'pictureDate',
        'fileUpload'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
