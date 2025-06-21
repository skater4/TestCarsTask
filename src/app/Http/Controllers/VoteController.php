<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Services\AuctionItemService;
use App\Services\VoteService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Log;
use Throwable;

class VoteController extends Controller
{
    public function __construct(
        private readonly AuctionItemService $auctionItemService,
        private readonly VoteService $voteService,
    )
    {}

    public function index(Request $request)
    {
        $models = $this->auctionItemService->getModels()->pluck('model');

        $model = $request->input('model');

        if ($model) {
            $votePair = $this->auctionItemService->getPairForVote($model);
        }

        return Inertia::render('Vote/Index', [
            'models' => $models,
            'selectedModel' => $model,
            'votePair' => $votePair ?? [],
        ]);
    }

    public function vote(VoteRequest $request)
    {
        $vote = $request->validated();

        try {
            $this->voteService->vote($vote['auction_item_id']);
        } catch (Throwable $e) {
            Log::error('Ошибка при голосовании', [
                'error' => $e->getMessage(),
                'auction_item_id' => $vote['auction_item_id'],
            ]);

            return redirect()
                ->route('vote.index', ['model' => $request->input('model')])
                ->with('error', 'Произошла ошибка при голосовании. Попробуйте ещё раз.');
        }

        return Inertia::location(route('vote.index', [
            'model' => $request->input('model'),
        ]));
    }
}
