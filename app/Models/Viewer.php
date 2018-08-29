<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Viewer extends Model
{
    protected $fillable = [
        'name', 'email','address',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','email','email');
    }
}
