<?php
namespace App\Services;

use App\Models\Country;

class CountryService 
{   
    protected Country $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function all()
    {
        return $this->country->select('id', 'name')
            ->get();
    }
}