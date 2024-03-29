<?php

namespace App\Console\Commands;

use App\Interfaces\Services\UnisenderServiceInterface;
use Illuminate\Console\Command;

class CreateUnisenderContactCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unisender:import-contact';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import contact from local db to unisender';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $unisenderService = app(UnisenderServiceInterface::class);

        $this->info('start');

        $unisenderService->importUserEmails();

        $this->info('stop');

        return Command::SUCCESS;
    }
}
