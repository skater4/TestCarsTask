<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperAuctionItem
 */
class AuctionItem extends Model
{
    public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'auction_item_id', 'auction_item_id');
    }
}
