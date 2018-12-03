<?php

namespace App\Providers;

use App\Models\Student;
use App\Observers\StudentObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength( 191 );
        Student::observe( StudentObserver::class );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
