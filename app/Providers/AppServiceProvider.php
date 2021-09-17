<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserSubmissionInterface;
use App\Services\UserService;
Use App\Services\TypicodeService;

class AppServiceProvider extends ServiceProvider
{
    protected $submissionImplementation = [
        'remote' => TypicodeService::class,
        'local' => UserService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            UserSubmissionInterface::class, 
            $this->submissionImplementation[config('app.submission_mode')]
        );
    }
}
