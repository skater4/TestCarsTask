<?php

namespace App\Contracts;

use App\Dto\AuctionItemImportDto;

interface AuctionItemAdapterInterface
{
    /**
     * @return iterable<AuctionItemImportDto>
     */
    public function getAll(): iterable;
    public function saveImages(array $auctionItemsDtos): void;
}
