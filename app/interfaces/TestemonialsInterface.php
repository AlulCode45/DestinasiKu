<?php

namespace App\Interfaces;

interface TestemonialsInterface
{
    public function getTestemonial($limit = null);

    public function countTestemonial();

    public function getTestemonialById($id);
}