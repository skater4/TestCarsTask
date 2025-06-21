<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperVote
 */
class Vote extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'auction_item_id',
    ];
}
