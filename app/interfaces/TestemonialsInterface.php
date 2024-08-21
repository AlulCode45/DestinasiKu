<?php

namespace App\Interfaces;

interface TestemonialsInterface
{
    public function getTestemonial();

    public function countTestemonial();

    public function getTestemonialById($id);
}
