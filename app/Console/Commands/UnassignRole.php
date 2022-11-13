<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserRole;
use App\Models\UserRoleAssignment;

use Illuminate\Console\Command;

class UnassignRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:unassign {role_name} {user_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $role_name = $this->argument('role_name');
        $user_name = $this->argument('user_name');
        $role = UserRole::where( 'role_name', $role_name )->first();
        if ( ! $role ) {
            $this->error('No such role');
            return Command::FAILURE;
        }

        $user = User::where( 'github_login', $user_name )->first();
        if ( ! $user ) {
            $this->error('No such user');
            return Command::FAILURE;
        }

        $assignment = UserRoleAssignment::where(['user_id'=> $user->id,'role_id'=>$role->id])->first();
        if ( ! $user ) {
            $this->error('Role not assigned');
            return Command::FAILURE;
        }
        $assignment->delete();

        $this->info('Assignment removed');

        return Command::SUCCESS;
    }
}
