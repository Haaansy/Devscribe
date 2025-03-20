<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SetupDatabase extends Command
{
    protected $signature = 'devscribe:setup-db';
    protected $description = 'Set up the database with all required tables';

    public function handle()
    {
        // Make sure the database file exists
        $dbPath = database_path('database.sqlite');
        if (!File::exists($dbPath)) {
            $this->info('Creating SQLite database file...');
            File::put($dbPath, '');
        }

        // Run the migrations
        $this->info('Running migrations...');
        $this->call('migrate:fresh');

        $this->info('Database setup completed successfully!');
        return Command::SUCCESS;
    }
}
