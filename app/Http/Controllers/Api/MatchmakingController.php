<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class MatchmakingController extends Controller
{
    public function findgame($shard, $heroid, $ipint)
    {
        $ip = long2ip($ipint);
        $geo = geoip($ip);


        echo "1";
    }
}
