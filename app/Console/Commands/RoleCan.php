<?php

namespace App\Console\Commands;

use App\Models\UserRole;
use App\Models\UserRolePermission;

use Illuminate\Console\Command;

class RoleCan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:can {role_name} {permission_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add permission to role';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $role_name = $this->argument('role_name');
        $permission_name = $this->argument('permission_name');

        $role = UserRole::where( 'role_name', $role_name )->first();
        if ( ! $role ) {
            $this->error('No such role');
            return Command::FAILURE;
        }

        $permission = UserRolePermission::where( [ 'role_id' => $role->id, 'permission_name' => $permission_name ] )->first();
        if ( $permission ) {
            $this->error('Permission already exists');
            return Command::FAILURE;
        }
        $permission = new UserRolePermission();
        $permission->permission_name = $permission_name;
        $permission->role_id = $role->id;
        $permission->save();

        $this->info('Permission granted');

        return Command::SUCCESS;
    }
}
