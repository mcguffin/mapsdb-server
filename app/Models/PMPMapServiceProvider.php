<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMPMapServiceProvider extends Model
{
    use HasFactory;

    protected $table = 'map_service_providers';

    public $timestamps = true;

}
