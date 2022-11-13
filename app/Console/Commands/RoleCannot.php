<?php

namespace App\Console\Commands;

use App\Models\UserRole;
use App\Models\UserRolePermission;

use Illuminate\Console\Command;

class RoleCannot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
     protected $signature = 'role:cannot {role_name} {permission_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove permission from role';

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
        if ( ! $permission ) {
            $this->error('Permission not granted');
            return Command::FAILURE;
        }
        $permission->delete();

        $this->info('Permission removed');

        return Command::SUCCESS;
    }
}
