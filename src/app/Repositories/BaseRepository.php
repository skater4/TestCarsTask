<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @template T of Model
 */
abstract class BaseRepository
{
    /**
     * @var T
     */
    protected Model $model;

    public function __construct()
    {
        /** @var T $modelInstance */
        $modelInstance = app($this->getModelClass());
        $this->model = $modelInstance;
    }

    public function insertOrIgnore(array $insertData): void
    {
        $this->model->insertOrIgnore($insertData);
    }

    abstract protected function getModelClass(): string;
}
