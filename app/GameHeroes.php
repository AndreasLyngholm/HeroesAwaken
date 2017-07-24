<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameHeroes extends Model
{
    protected $fillable = ['user_id', 'heroName', 'online', 'ip_address'];

    public function stats()
    {
        $stats = new Collection();
        foreach (GameStats::where('user_id', $this->user_id)->where('heroID', $this->id)->get() as $stat)
            $stats->push($stat);
            
        return $stats;
    }
}