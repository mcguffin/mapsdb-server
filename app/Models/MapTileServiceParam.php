<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapTileServiceParam extends Model
{
    use HasFactory;

    /*

    param_type:
        access_token, // tokens
        integer, // version
        rect, // bounds
        string, // variants
        decimal, //
        timestamp,
        iso_language_code, // iso-639-2 language code
        select, //
        static, //
    */

    protected $table = 'map_tile_service_params';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $fillable = [

        'service_id',
        'param_name',
        'param_type',
        'param_value',
        'param_description',
    ];

}
