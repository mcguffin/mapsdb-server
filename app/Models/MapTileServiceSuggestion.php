<?php

namespace App\Models;

use App\Enums\ProviderStatus;
use App\Enums\SuggestionStatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapTileServiceSuggestion extends Model
{
    use HasFactory;

    protected $table = 'map_tile_service_suggestions';

    public $timestamps = true;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $fillable = [

        'provider_id',
        'provider_suggestion_id',
        'service_name',
        'service_slug',
        'provider_description',

        'service_tile_format',
        'service_status',
        'service_api_schema',
        'service_api_host',
        'service_api_path',
        'max_zoom',
        'min_zoom',
        'zoom_offset',
        'is_transparent',
        'is_inverse_y',
        'is_inverse_z',
        'attribution',

        'suggestion_comment',
        'suggestion_status',
        'owner',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'suggestion_status' => SuggestionStatus::Draft->value,
    ];

}
