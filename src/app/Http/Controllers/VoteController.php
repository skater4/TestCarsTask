<?php

namespace App\Http\Controllers;

use App\Services\AuctionItemService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VoteController extends Controller
{
    public function __construct(
        private readonly AuctionItemService $auctionItemService,
    )
    {}

    public function index(Request $request)
    {
        $modelId = $request->get('model_id');

        $models = $this->auctionItemService->getModels();

        return Inertia::render('Vote/Index', [
            'models' => $models,
            'images' => $images,
            'selectedModelId' => (int) $modelId,
        ]);
    }
}
