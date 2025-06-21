<?php

namespace App\Repositories;

use App\Models\AuctionItem;
use Illuminate\Support\Collection;

/** @extends BaseRepository<AuctionItem> */
class AuctionItemRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return AuctionItem::class;
    }

    public function getModels(): Collection
    {
        return $this->model
            ->select('model')
            ->distinct()
            ->orderBy('model')
            ->get();
    }

    public function getRandomPairByModels(string $model): Collection
    {
        return $this->model
            ->where('model', $model)
            ->inRandomOrder()
            ->take(2)
            ->get(['auction_item_id', 'image']);
    }

    public function getVoteStats(string $model, int $yearFrom, int $yearTo): array
    {
        return $this->model
            ->where('model', $model)
            ->whereBetween('year', [$yearFrom, $yearTo])
            ->withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->get()
            ->map(fn($item) => [
                'auction_item_id' => $item->auction_item_id,
                'year' => $item->year,
                'image' => asset('storage/images/' . $item->image),
                'votes_count' => $item->votes_count,
            ])
            ->all();
    }
}
