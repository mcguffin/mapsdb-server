<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserRolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User $user
     * @return boolean
     */
    public function exist( User $user ) {
        return true;
    }

    /**
     * @param string $permission
     * @param array $args
     * @return boolean
     */
    public function __call( $permission, $args ) {

        $permission = Str::kebab($permission);
var_dump($permission);exit();
        return $this->allowed($permission, ...$args );

    }

    /**
     * @param string $permission
     * @param User $user
     * @param Model $model
     * @return boolean
     */
    public function allowed( string $permission, User $user, Model $model = null ) {

        // normalize permission name
        $permission = preg_replace( '/-own$/', '', $permission );
        $userPermissions = array_map(function($permission) {
            return $permission->permission_name;
        }, $user->permissions());

        $allowed = in_array( $permission, $userPermissions );

        if ( $allowed || is_null( $model ) ) {
            return $allowed;
        }

        $ownAllowed = in_array( "{$permission}-own", $userPermissions );

        if ( ! $ownAllowed ) {
            return false;
        }

        return $user->id = $model->owner;

    }

}
