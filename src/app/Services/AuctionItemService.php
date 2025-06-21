<?php

namespace App\Services;

use App\Repositories\AuctionItemRepository;
use Illuminate\Support\Collection;

readonly class AuctionItemService
{
    public function __construct(
        private AuctionItemRepository $auctionItemRepository
    )
    {}

    public function getModels(): Collection
    {
        return $this->auctionItemRepository->getModels();
    }
}
