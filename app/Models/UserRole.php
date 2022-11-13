<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role_name',
        'role_description',
        'active',
    ];


    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'role_description' => '',
        'active' => true,
    ];
    // has many assigments
    // has many permissions

    /**
     * Get the comments for the blog post.
     */
    public function assignments()
    {
        return $this->hasMany(UserRoleAssignment::class,'user_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function permissions()
    {
        return $this->hasMany(UserRolePermission::class,'role_id');
    }


}
