<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapServiceProvider extends Model
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
    ];

    protected $table = 'map_service_providers';

    public $timestamps = true;

    /**
     * Get the comments for the blog post.
     */
    public function tileServices()
    {
        return $this->hasMany(MapTileService::class);
    }

}
