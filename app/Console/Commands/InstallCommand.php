<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:install'; //app:install-command

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installation';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {

        $this->call('key:generate');
        $this->call('storage:link');
        $this->call('migrate');
        $this->call('db:seed');
        $this->call('moonshine:user');
        return self::SUCCESS;
    }
}
