<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup App - Run db:make, swagger install, passport';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $this->info("Setup");
        $this->info("=======================");

        \Artisan::call('key:generate');
        $this->info("Generate key");

        \Artisan::call('db:make');
        $this->info("Database");

        \Artisan::call('l5-swagger:generate');
        $this->info("Swagger");

        \Artisan::call('passport:install');
        $this->info("Passport");

        \Artisan::call('passport:keys');
        $this->info("Passport");
    }
}
