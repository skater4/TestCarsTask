<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperAuctionItem
 */
class AuctionItem extends Model
{
    public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class);
    }
}
