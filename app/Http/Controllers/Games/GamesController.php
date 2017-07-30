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
            $activeplayers[$player->pid] = [];
            foreach ($stats as $stat) {
                $activeplayers[$player->pid][$stat->statsKey] = $stat;
            }
            $hero = GameHeroes::where('id', $player->pid)->first();
            $activeplayers[$player->pid]['hero'] = $hero;
            $activeplayers[$player->pid]['user'] = User::where('id', $hero->user_id)->first();
        }

        $playersByTeam = ['team1' => [], 'team2' => []];
        foreach ($activeplayers as $pid => $player)
        {
            $playersByTeam['team'.$player['P-team']->statsValue][$pid] = $player;
        }

        return view('games.details', compact('playersByTeam', 'game'));
    }
}
