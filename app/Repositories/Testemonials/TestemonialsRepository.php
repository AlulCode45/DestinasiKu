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

    public function getTestemonial($limit = null)
    {
        return $this->model->query()
            ->with(['guests', 'destinations'])
            ->orderBy('id', 'DESC')
            ->paginate($limit);
    }

    public function countTestemonial()
    {
        return $this->model->query()->count();
    }

    public function getTestemonialById($id)
    {
        return $this->model->query()
            ->with(['guests', 'destinations'])
            ->findOrFail($id);
    }
    function getTestemonialByDestinationId($destination)
    {
        return $this->model->query()
            ->with(['guests', 'destinations'])
            ->where('destination_id', $destination)
            ->orderBy('id', 'DESC')
            ->get();
    }
    function storeTestimony($data)
    {
        return $this->model->query()->create($data);
    }
}