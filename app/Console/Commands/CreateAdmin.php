<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ate:admin {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::findOrFail($this->argument('id'));
        $role = Role::where('name', 'admin')->first();
        $user->role()->associate($role);
        $user->save();
    }
}
