<?php

namespace App\Services;

use App\Repositories\AuctionItemRepository;

readonly class StatisticService
{
    public function  __construct(
        private AuctionItemRepository $auctionItemRepository)
    {

    }
    public function getVoteStats(string $model, int $yearFrom, int $yearTo): array
    {
        return $this->auctionItemRepository->getVoteStats($model, $yearFrom, $yearTo);
    }
}
