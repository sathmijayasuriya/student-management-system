<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use Illuminate\Support\ServiceProvider;
use App\Observers\StudentObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();  
        // Student::observe(StudentObserver::class);

    }
}