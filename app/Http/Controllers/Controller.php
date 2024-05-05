<?php

namespace App\Http\Controllers;

use App\Services\SantaService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public SantaService $service;

    public function __construct(SantaService $service)
    {
        $this->service = $service;
    }
}
