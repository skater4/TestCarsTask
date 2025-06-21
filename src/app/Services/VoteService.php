<?php

namespace App\Services;

use App\Models\Vote;

class VoteService
{
    public function vote(int $auctionItemId): void
    {
        Vote::create([
            'auction_item_id' => $auctionItemId,
        ]);
    }
}
