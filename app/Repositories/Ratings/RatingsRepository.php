<?php

namespace App\Repositories\Ratings;

use App\Interfaces\RatingsInterface;
use App\Models\Ratings;

class RatingsRepository implements RatingsInterface
{
    private Ratings $model;

    public function __construct(Ratings $ratings)
    {
        $this->model = $ratings;
    }

    public function getRatings()
    {
        $ratings = $this->model->query()->sum('rating');
        return $ratings / $this->model->query()->count();
    }

    public function getRatingsByDestinationId($id)
    {
        $ratings = $this->model->query()
            ->where('destination_id', $id)
            ->sum('rating');
        return $ratings / $this->model->query()
                ->where('destination_id', $id)->count();
    }

}
