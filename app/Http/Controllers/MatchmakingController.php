<?php

namespace App\Http\Controllers;

class MatchmakingController extends Controller
{
    public function findgame($shard, $heroid, $ipint)
    {
        $ip = long2ip($ipint);
        $geo = geoip($ip);



    }
}
