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

    public function getPairForVote(string $model): array
    {
        return $this->auctionItemRepository
            ->getRandomPairByModels($model)
            ->map(fn($item) => [
                'auction_item_id' => $item->auction_item_id,
                'image_url' => asset('storage/images/' . $item->image),
            ])
            ->all();
    }
}
