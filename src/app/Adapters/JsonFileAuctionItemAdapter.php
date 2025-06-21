<?php

namespace App\Adapters;

use App\Contracts\AuctionItemAdapterInterface;
use App\Dto\AuctionItemImportDto;
use FilesystemIterator;
use Generator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Storage;

class JsonFileAuctionItemAdapter implements AuctionItemAdapterInterface
{
    public function __construct(protected string $directory) {}

    public function getAll(): iterable
    {
        foreach ($this->getJsonFiles($this->directory) as $path) {
            $data = json_decode(file_get_contents($path), true);
            yield AuctionItemImportDto::fromArray($data);
        }
    }

    private function getJsonFiles(string $dir): Generator
    {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'json') {
                yield $file->getPathname();
            }
        }
    }

    public function saveImages(array $auctionItemsDtos): void
    {
        foreach ($auctionItemsDtos as $dto) {
            if (!($dto instanceof AuctionItemImportDto)) {
                continue;
            }

            $filename = $dto->image;
            if (!$filename) {
                continue;
            }

            $sourcePath = rtrim($this->directory, '/') . '/' . ltrim($filename, '/');
            $targetPath = 'images/' . $filename;

            if (is_file($sourcePath)) {
                Storage::disk('public')->put($targetPath, file_get_contents($sourcePath));
            } else {
                logger()->warning("Image not found: {$sourcePath}");
            }
        }
    }
}
