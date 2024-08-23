<?php

namespace App\Repositories\Destinations;

use App\Interfaces\DestinationImagesInterface;
use App\Models\DestinationImages;
use Illuminate\Support\Facades\Storage;

class DestinationImagesRepository implements DestinationImagesInterface
{
    private DestinationImages $model;

    function __construct(DestinationImages $destinationImages)
    {
        $this->model = $destinationImages;
    }

    public function store($data)
    {
        if (count($data) > 1) {
            return $this->model->insert($data);
        } else {
            return $this->model->create($data);
        }
    }

    public function delete($destinationImages)
    {
        $image = $this->model->findOrFail($destinationImages);
        Storage::delete($image->image);
        $this->model->destroy($image->id);
    }

    function getImageById($id)
    {
        return $this->model->findOrFail($id);
    }
}