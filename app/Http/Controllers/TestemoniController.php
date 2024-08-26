<?php

namespace App\Http\Controllers;

use App\Interfaces\TestemonialsInterface;
use Illuminate\Http\Request;

class TestemoniController extends Controller
{
    private $testemoni;
    public function __construct(TestemonialsInterface $testemoni)
    {
        $this->testemoni = $testemoni;
    }
    function index()
    {
        $data = [
            'testemonial' => $this->testemoni->getTestemonial(),
        ];
        return view('dashboard.testemonial.testemonial', $data);
    }
}