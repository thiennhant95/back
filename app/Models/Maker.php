<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    protected $table = 'maker';
    public $timestamps = false;
    protected $fillable = [
		'name',
		
    ];
}
