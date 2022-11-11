<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapTileService extends Model
{
    use HasFactory;

    protected $table = 'map_tile_services';

    public $timestamps = true;

}
