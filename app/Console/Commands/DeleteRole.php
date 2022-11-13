<?php

namespace App\Console\Commands;

use App\Models\UserRole;
use Illuminate\Console\Command;


class DeleteRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:delete {role_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a role';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $role_name = $this->argument('role_name');
        $role = UserRole::where( 'role_name', $role_name )->first();
        if ( ! $role ) {
            $this->error('No such role');
            return Command::FAILURE;
        }

        $role->delete();
        $this->info('Role deleted');

        return Command::SUCCESS;
    }
}
