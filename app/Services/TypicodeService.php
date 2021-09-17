<?php
namespace App\Services;

use App\Models\Country;
use Illuminate\Support\Facades\Http;
use App\Interfaces\UserSubmissionInterface;

class TypicodeService implements UserSubmissionInterface
{   
    protected string $url;

    public function __construct()
    {
        $this->url = config('app.typicode_url');

        if (empty($this->url)) {
            throw new \Exception('No URL provided for the submission');
        }
    }

    public function get()
    {
        $response = HTTP::get($this->url . '/users');

        return $response->json();
    }

    public function create(array $requestData)
    {
        $response = HTTP::post($this->url . '/users', $requestData);

        if ($response->status() == 201) {
            return $response->json();
        }

        throw new \Exception($response->body(), $response->status());
    }
}