<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class MatchmakingController extends Controller
{
    public function findgame($shard, $heroid, $ipint)
    {
        $ip = long2ip($ipint);
        $geo = geoip($ip);

        // I know this isn't the best yet

        $games = \DB::select("SELECT a.gid, b.statsValue as `percent_full`
            FROM games a
            LEFT JOIN game_server_regions ON a.game_ip = game_server_regions.game_ip
            LEFt JOIN game_server_stats b ON b.gid = a.gid
            WHERE a.shard = ?
                AND (region = ? OR region IS NULL)
                AND (b.statsKey = 'B-U-percent_full' AND b.statsValue != '100')
            ORDER BY region DESC, percent_full DESC
            ", [$shard, $geo['continent']]);

        $results = [];

        foreach ($games as $game)
        {
            $results[] = $game->gid;
        }

        echo join(',', $results);
    }
}
