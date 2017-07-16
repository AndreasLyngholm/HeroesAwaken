<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   	protected $table = 'news';

   	protected $fillable = ['title', 'text', 'date', 'user_id'];

    protected $dates = ['date'];
}
