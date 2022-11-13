<?php

namespace App\Console\Commands;

use App\Models\UserRole;
use Illuminate\Console\Command;

class CreateRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:create {role_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a role';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $role_name = $this->argument('role_name');

        if ( UserRole::where( 'role_name', $role_name )->first() ) {
            $this->error('Role exists');
            return Command::FAILURE;
        }

        $role = new UserRole();
        $role->role_name = $role_name;
        $role->save();

        $this->info('Role created');

        return Command::SUCCESS;
    }
}
