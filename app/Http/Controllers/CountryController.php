<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CountryService;

class CountryController extends Controller
{
    protected CountryService $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function get()
    {
        return $this->countryService->all();
    }
}
