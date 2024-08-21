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
        $ratings = $ratings / $this->model->query()->count();
        return $ratings;
    }

    public function getRatingsByDestinationId($id)
    {
        $ratings = $this->model->query()
            ->where('destination_id', $id)
            ->sum('rating');
        $ratings = $ratings / $this->model->query()
                ->where('destination_id', $id)->count();
        return $ratings;
    }

}
