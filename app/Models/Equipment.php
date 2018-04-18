<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipment';
    public $timestamps = false;
    protected $fillable = [
		'name',
		
    ];
}

