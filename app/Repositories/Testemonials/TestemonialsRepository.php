<?php

namespace App\Repositories\Testemonials;

use App\Interfaces\TestemonialsInterface;
use App\Models\Testemonials;

class TestemonialsRepository implements TestemonialsInterface
{
    private Testemonials $model;

    public function __construct(Testemonials $model)
    {
        $this->model = $model;
    }

    public function getTestemonial()
    {
        return $this->model->query()->get();
    }

    public function countTestemonial()
    {
        return $this->model->query()->count();
    }

    public function getTestemonialById($id)
    {
        return $this->model->query()->findOrFail($id);
    }
}
