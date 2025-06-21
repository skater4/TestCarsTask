<?php

namespace App\Console\Commands;

use App\Adapters\JsonFileAuctionItemAdapter;
use App\Services\AuctionItemImportService;
use Illuminate\Console\Command;

class ImportAuctionItemsFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auction:import {directory : Path to JSON files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import auction items from JSON files';

    /**
     * Execute the console command.
     */
    public function handle(AuctionItemImportService $auctionItemService): void
    {
        $adapter = app(JsonFileAuctionItemAdapter::class, ['directory' => $this->argument('directory')]);
        $auctionItemService->importAll($adapter);
    }
}
