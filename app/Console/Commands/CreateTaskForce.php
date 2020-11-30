<?php

namespace App\Console\Commands;

use App\Models\TaskForce;
use Illuminate\Console\Command;

class CreateTaskForce extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ate:createTaskForce {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crate a new task force';

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
        TaskForce::create(['name' => $this->argument('name')]);
    }
}
