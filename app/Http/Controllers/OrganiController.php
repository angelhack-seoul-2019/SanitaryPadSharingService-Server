<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Organization;
use App\Model\Calender;

class OrganiController extends Controller
{
	const RESULT_SUC = 200;
	const RESULT_ERR = 404;

	public function getList(){
		$list = Organization::get();
		if($list->isEmpty()){
			return array(
				"result"=>self::RESULT_ERR,
				"data"=>araay()
			);
		}

		return array(
			"result"=>self::RESULT_SUC,
			"data"=>$list
		);
	}

	public static function _deg2rad($deg){
		$radians = 0.0;
		$radians = $deg * M_PI/180.0;
		return($radians);
	}

	#현위치 주변 리스트
	public function getAround($lat, $lon, $type){
		$lists = Organization::get();
		$count = count($lists);	
		$i = 0;
		$arr = [];
		while($count > $i){
			$list_lat = $lists[$i]->lat;
			$list_lon = $lists[$i]->lon;
			$theta = $lon - $list_lon;

			$dist = sin(self::_deg2rad($lat)) * sin(self::_deg2rad($list_lat)) + cos(self::_deg2rad($lat)) * cos(self::_deg2rad($list_lat)) * cos(self::_deg2rad($theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$miles = $dist * 60 * 1.1515;

			if( $miles < 1 && $lists[$i]->type == $type){
				
				$a = array(
					"id"=>$lists[$i]->id,
					"name"=>$lists[$i]->name,
					"lat"=>$lists[$i]->lat,
					"lon"=>$lists[$i]->lon,
					"address"=>$lists[$i]->address,
					"phone"=>$lists[$i]->phone,
					"type"=>$lists[$i]->type,
					"opentime"=>$lists[$i]->opentime,
					"curcount"=>$lists[$i]->curcount,
					"totalcount"=>$lists[$i]->totalcount,
					"dist"=>$miles
				);
				array_push($arr, $a);
			}

			$i++;
		}
		return array(
			"result"=>self::RESULT_SUC,
			"data"=>$arr,
		);

	}

	#해당 가게 일정
	public function getSchedule($organi_id, $today){
		$lists = Calender::where('organi_id', $organi_id)
			->where('schedule', $today)->get();

		if($lists->isEmpty()){
			return array(
				"result"=>self::RESULT_ERR,
				"data"=>array()
			);
		}

		return array(
			"result"=>self::RESULT_SUC,
			"data"=>$lists
		);
	}
}
