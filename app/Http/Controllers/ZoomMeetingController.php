<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ZoomJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZoomMeetingController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function list(Request $request) {
    	$path = 'users/me/meetings';
	    $response = $this->zoomGet($path);

	    $data = json_decode($response->body(), true);
	    $data['meetings'] = array_map(function (&$m) {
	        $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
	        return $m;
	    }, $data['meetings']);

	    return [
	        'success' => $response->ok(),
	        'data' => $data,
	    ];
    }
}
