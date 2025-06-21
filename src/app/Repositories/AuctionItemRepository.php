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
}
