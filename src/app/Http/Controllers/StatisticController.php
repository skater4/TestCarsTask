<?php

namespace App\Http\Controllers;

use App\Services\AuctionItemService;
use App\Services\StatisticService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatisticController extends Controller
{
    public function __construct(
        private readonly AuctionItemService $auctionItemService,
        private readonly StatisticService $statisticService,
    )
    {}

    public function index(Request $request)
    {
        $models = $this->auctionItemService->getModels()->pluck('model');
        $model = $request->input('model');
        $yearFrom = $request->integer('year_from');
        $yearTo = $request->integer('year_to');

        $stats = [];

        if ($model && $yearFrom && $yearTo) {
            $stats = $this->statisticService->getVoteStats($model, $yearFrom, $yearTo);
        }

        return Inertia::render('Statistic/Index', [
            'models' => $models,
            'selectedModel' => $model,
            'yearFrom' => $yearFrom,
            'yearTo' => $yearTo,
            'stats' => $stats,
        ]);
    }
}
