<?php

namespace App\Repositories;

use App\Models\Make;

class MakeRepository extends BaseRepository
{
    protected function getModelClass(): string
    {
        return Make::class;
    }

    public function getMakesMap():  array
    {
        return $this->model
            ->select(['id',  'name'])
            ->pluck('id', 'name')
            ->toArray();
    }
}
