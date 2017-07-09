<?php
/**
 * Created by PhpStorm.
 * User: Hazriel
 * Date: 10-Jul-17
 * Time: 00:06
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    protected $table = 'groups';
    public $timestamps = false;
}