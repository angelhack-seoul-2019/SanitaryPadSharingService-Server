<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Organization;

class OrganiController extends Controller
{
	const RESULT_SUC = 200;
	const RESULT_ERR = 404;

	public function getList(){
		$list = Organization::get();
		if($list->isEmpty()){
			return array(
				"result"=>self::RESULT_ERR
			);
		}

		return array(
			"result"=>self::RESULT_SUC,
			"data"=>$list
		);
	}
		
}
