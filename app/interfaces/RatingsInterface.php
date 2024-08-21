<?php

namespace App\Interfaces;

interface RatingsInterface
{
    public function getRatings();

    public function getRatingsByDestinationId($id);
}
