<?php

namespace App\Dto;

class AuctionItemImportDto
{
    public function __construct(
        public int    $auctionItemId,
        public string $auctionId,
        public string $make,
        public string $model,
        public int    $year,
        public int    $odometer,
        public string $units,
        public string $engine,
        public string $transmission,
        public string $color,
        public string $brand,
        public string $customStatus,
        public int    $currentHighPreBid,
        public int    $myPreBid,
        public bool   $isWatched,
        public int    $sequenceNumber,
        public string $lastCustomStatusSetAt,
        public string $externalAuctionItemId,
        public int    $winningBidAmount,
        public string $winningBidLocation,
        public bool   $isBiddable,
        public int    $status,
        public string $image
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            auctionItemId: (int)   $data['AuctionItemId'],
            auctionId:      (string) $data['AuctionId'],
            make:           trim($data['Make'] ?? 'UNKNOWN'),
            model:          trim($data['Model'] ?? 'UNKNOWN'),
            year:           isset($data['Year']) ? (int) $data['Year'] : 0,
            odometer:       isset($data['Odometer']) ? (int) $data['Odometer'] : 0,
            units:          (string)($data['Units'] ?? 'km'),
            engine:         (string)($data['Engine'] ?? ''),
            transmission:   (string)($data['Transmission'] ?? ''),
            color:          (string)($data['Color'] ?? ''),
            brand:          (string)($data['Brand'] ?? ''),
            customStatus:   (string)($data['CustomStatus'] ?? ''),
            currentHighPreBid: (int)($data['CurrentHighPreBid'] ?? 0),
            myPreBid:       (int)($data['MyPreBid'] ?? 0),
            isWatched:      (bool)($data['IsWatched'] ?? false),
            sequenceNumber: (int)($data['SequenceNumber'] ?? 0),
            lastCustomStatusSetAt: (string)($data['LastCustomStatusSetAt'] ?? now()->toISOString()),
            externalAuctionItemId: (string)($data['ExternalAuctionItemId'] ?? ''),
            winningBidAmount: (int)($data['WinningBidAmount'] ?? 0),
            winningBidLocation: (string)($data['WinningBidLocation'] ?? ''),
            isBiddable: (bool)($data['IsBiddable'] ?? false),
            status: (int)($data['Status'] ?? 0),
            image: (string)($data['Image'] ?? 'no-image.jpg')
        );
    }

    public function toArray(array $makeMap): array
    {
        $makeId = $makeMap[$this->make];

        return [
            'auction_item_id' => $this->auctionItemId,
            'auction_id' => $this->auctionId,
            'current_high_pre_bid' => $this->currentHighPreBid,
            'custom_status' => $this->customStatus ?: null,
            'my_pre_bid' => $this->myPreBid ?: null,
            'is_watched' => $this->isWatched,
            'sequence_number' => $this->sequenceNumber,
            'last_custom_status_set_at' => $this->lastCustomStatusSetAt ?: null,
            'year' => $this->year ?: null,
            'make_id' => $makeId,
            'model' => $this->model ?: null,
            'odometer' => $this->odometer ?: null,
            'units' => $this->units ?: null,
            'vehicle_location' => null,
            'engine' => $this->engine,
            'transmission' => $this->transmission,
            'color' => $this->color,
            'brand' => $this->brand,
            'external_auction_item_id' => $this->externalAuctionItemId ?? null,
            'winning_bid_amount' => $this->winningBidAmount,
            'winning_bid_location' => $this->winningBidLocation ?? null,
            'is_biddable' => $this->isBiddable,
            'status' => $this->status,
            'image' => $this->image,
        ];
    }
}
