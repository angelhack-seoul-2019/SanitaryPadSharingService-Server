<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
	protected $table = 'calender';
	public $timestamps = false;
	protected $fillable = ['organi_id', 'schedule', 'memo', 'title'];
}
