<?php

namespace App\Http\Controllers\Games;

use App\GameHeroes;
use App\GameServerStats;
use App\User;
use Illuminate\Routing\Controller as BaseController;
use App\GameServerPlayerStats;


class GamesController extends BaseController
{
    public function list()
    {
        $uniquegames = GameServerStats::distinct()->select('gid')->get();

        $activegames = [];

        foreach ($uniquegames as $game) {
            $stats = GameServerStats::where('gid', $game->gid)->get();
            $activegames[$game->gid] = [];
            foreach ($stats as $stat) {
                $activegames[$game->gid][$stat->statsKey] = $stat;
                if ($stat->statsKey == 'B-U-server_ip')
                {
                    $activegames[$game->gid]['geoip'] = geoip($stat->statsValue);
                }
            }
        }

        return view('games.list', compact('activegames'));
    }

    public function details($gid)
    {
        $gamestats = GameServerStats::where('gid', $gid)->get();
        $game = [];
        foreach ($gamestats as $stat) {
            $game[$stat->statsKey] = $stat;
        }

        $uniqueplayers = GameServerPlayerStats::distinct()->select('pid')->where('gid', $gid)->get();

        $activeplayers = [];
        foreach ($uniqueplayers as $player)
        {
            $stats = GameServerPlayerStats::where('pid', $player->pid)->get();
            $pl = [];
            foreach ($stats as $stat) {
                $pl[$stat->statsKey] = $stat;
                if ($stat->statsKey == 'P-ip')
                {
                    $pl['geoip'] = geoip($stat->statsValue);
                }
                $best_time = strtotime($stat->created_at);
                if (isset($stat->updated_at) && strtotime($stat->updated_at) > $best_time)
                {
                        $best_time = strtotime($stat->updated_at);
                }
                if (!isset($pl['updated_at']) || $best_time > $pl['updated_at'])
                {
                        $pl['updated_at'] = $best_time;
                }
            }
            $hero = GameHeroes::where('id', $player->pid)->first();
            $pl['hero'] = $hero;
            $pl['user'] = User::where('id', $hero->user_id)->first();
            $activeplayers[$player->pid] = $pl;
        }

        $playersByTeam = ['team1' => [], 'team2' => []];
        foreach ($activeplayers as $pid => $player)
        {
            if (!isset($player['P-team']))
            {
                continue;
            }

            if ((time() - $player['updated_at']) > 120)
            {
                continue;
            }

            $playersByTeam['team'.$player['P-team']->statsValue][$pid] = $player;
        }

        return view('games.details', compact('playersByTeam', 'game'));
    }
}
