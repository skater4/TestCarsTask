<?php

namespace App\Services;

use App\Contracts\AuctionItemAdapterInterface;
use App\Dto\AuctionItemImportDto;
use App\Repositories\AuctionItemRepository;
use App\Repositories\MakeRepository;
use DB;

class AuctionItemImportService
{
    private const int CHUNK_SIZE = 1000;

    public function __construct(
        private readonly AuctionItemRepository $auctionItemRepository,
        private readonly MakeRepository $makeRepository
    ) {}

    public function importAll(AuctionItemAdapterInterface $adapter): void
    {
        $items = $adapter->getAll();
        $makes = [];
        $auctionItemsDtos = [];
        foreach ($items as $key => $item) {
            $makes []= $item->make;
            $auctionItemsDtos []= $item;
            if (($key + 1) % self::CHUNK_SIZE === 0) {
                $this->saveImportChunk($makes, $auctionItemsDtos, $adapter);
                $makes = [];
                $auctionItemsDtos = [];
            }
        }

        if (!empty($auctionItemsDtos)) {
            $this->saveImportChunk($makes, $auctionItemsDtos, $adapter);
        }
    }

    /**
     * @param string[] $makes
     * @param AuctionItemImportDto[] $auctionItemsDtos
     */
    private function saveImportChunk(array $makes, array $auctionItemsDtos, AuctionItemAdapterInterface $adapter): void
    {
        $auctionItems = [];
        $makes = array_unique($makes);
        if (!empty($makes)) {
            $insertData = array_map(fn($name) => ['name' => $name], $makes);
            $this->makeRepository->insertOrIgnore($insertData);
        }
        $makesMap = $this->makeRepository->getMakesMap();

        if (!empty($auctionItemsDtos)) {
            foreach ($auctionItemsDtos as $auctionItemsDto) {
                $auctionItems []= $auctionItemsDto->toArray($makesMap);
            }
            $this->auctionItemRepository->insertOrIgnore($auctionItems);
            $adapter->saveImages($auctionItemsDtos);
        }
    }
}
