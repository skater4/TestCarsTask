<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $auction_item_id
 * @property int $auction_id
 * @property int $current_high_pre_bid
 * @property string|null $custom_status
 * @property int|null $my_pre_bid
 * @property bool $is_watched
 * @property int $sequence_number
 * @property string|null $last_custom_status_set_at
 * @property int|null $year
 * @property int $make_id
 * @property string|null $model
 * @property int|null $odometer
 * @property string|null $units
 * @property string|null $vehicle_location
 * @property string|null $engine
 * @property string|null $transmission
 * @property string|null $color
 * @property string|null $brand
 * @property string|null $external_auction_item_id
 * @property int $winning_bid_amount
 * @property string|null $winning_bid_location
 * @property bool $is_biddable
 * @property int $status
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereAuctionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereAuctionItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereCurrentHighPreBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereCustomStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereEngine($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereExternalAuctionItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereIsBiddable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereIsWatched($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereLastCustomStatusSetAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereMakeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereMyPreBid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereOdometer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereSequenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereTransmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereVehicleLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereWinningBidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereWinningBidLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuctionItem whereYear($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAuctionItem {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Make newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Make newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Make query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Make whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Make whereName($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperMake {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

