<?php

namespace App\Http\Controllers\Games;

use App\GameHeroes;
use App\GameServerStats;
use App\User;
use Illuminate\Routing\Controller as BaseController;
use App\GameServerPlayerStats;
use Ramsey\Uuid\Codec\TimestampFirstCombCodec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set("UTC");

class GamesController extends BaseController
{

    public function list(Request $req)
    {

        if ($req->isMethod('post'))
        {
            $region = $req->input('region', 'AUTO');

            if ($region == 'AUTO')
            {
                DB::delete('DELETE FROM game_player_regions WHERE userid=?', [Auth::id()]);
            }
            else
            {
                DB::statement('INSERT INTO game_player_regions (userid, region, created_at, updated_at)
                VALUES (?, ?, NOW(), NOW()) ON DUPLICATE KEY UPDATE region=?, updated_at=NOW()', [Auth::id(), $region, $region]);
            }
            return redirect('/games');
        }

        $region = DB::select('SELECT region FROM game_player_regions WHERE userid = ?', [Auth::id()]);
        $selectedregion = '';
        if (count($region) > 0)
        {
            $selectedregion = $region[0]->region;
        }
        //$region

        $uniquegames = GameServerStats::distinct()->select('gid')->get();

        $activegames = [];

        foreach ($uniquegames as $game) {
            $stats = GameServerStats::where('gid', $game->gid)->get();
            $gameData = [];
            foreach ($stats as $stat) {
                $gameData[$stat->statsKey] = $stat;
                if ($stat->statsKey == 'B-U-server_ip')
                {
                    $gameData['geoip'] = geoip($stat->statsValue);
                }
            }

            if (isset($gameData['geoip']) && isset($gameData['NAME']))
            {
                $gameData['NAME']->statsValue = preg_replace("/\([^)]+\)/","",$gameData['NAME']->statsValue);
                $activegames[$game->gid] = $gameData;
            }
        }

        usort($activegames, function($a, $b) {
            if ($a === $b) return 0;

            if (floatval($a['B-U-percent_full']->statsValue) > floatval($b['B-U-percent_full']->statsValue))
                return -1;
            else
                return 1;
        });

        return view('games.list', compact('activegames', 'selectedregion'));
    }

    public function details($gid)
    {
        $gamestats = GameServerStats::where('gid', $gid)->get();
        $game = [];
        foreach ($gamestats as $stat) {
            $game[$stat->statsKey] = $stat;
        }

        $uniqueplayers = GameServerPlayerStats::distinct()->select(['pid', 'gid'])->where('gid', $gid)->get();

        $activeplayers = [];
        foreach ($uniqueplayers as $player)
        {
            $stats = GameServerPlayerStats::where('pid', $player->pid)->get();
            $pl = [];
            $pl['GID'] = $player->gid;
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
            if ($player['GID'] !== $gid)
            {
                continue;
            }

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
