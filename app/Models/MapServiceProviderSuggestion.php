<?php

namespace App\Models;

use App\Enums\ProviderStatus;
use App\Enums\SuggestionStatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapServiceProviderSuggestion extends Model
{
    use HasFactory;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $fillable = [
        'provider_name',
        'provider_slug',
        'provider_url',
        'provider_description',
        'license_text',
        'license_type',
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
        'suggestion_status' => SuggestionStatus::Draft,
    ];

    protected $table = 'map_service_provider_suggestions';

    public $timestamps = true;

    /**
     * Get the comments for the blog post.
     */
    public function tileServices()
    {
        return $this->hasMany(MapTileServiceSuggestion::class);
    }

}
