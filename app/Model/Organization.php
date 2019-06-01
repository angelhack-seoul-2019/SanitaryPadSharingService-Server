<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	protected $table = 'organization';
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $fillable = ['name', 'lat', 'lon', 'address', 'phone', 'type', 'opentime', 'curcount', 'totalcount'];
}
