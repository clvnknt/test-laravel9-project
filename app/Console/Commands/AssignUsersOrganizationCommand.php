<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Organization;
use App\Models\User;

class AssignUsersOrganizationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ccs:set_user_org';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set users organizations';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $organizations = Organization::all();
        // SELECT * FROM users
        $users = User::all();
        foreach ($users as $user) {
            $random_id = rand(25, 300);
            $organization = Organization::find($random_id);
            if (!is_null($organization)) {
                $user->setOrganization($organization);
                error_log($user->getName() . ' -> ' . $organization->getName());
            }
        }
        return 0;
    }
}
