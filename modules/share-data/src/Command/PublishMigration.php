<?php

namespace Luccui\ShareData\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PublishMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'luccui:publish-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish database migration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate', [
            '--path' => '../modules/share-data/database/migrations'
        ]);
        $this->info('Running...');
        return Command::SUCCESS;
    }
}
