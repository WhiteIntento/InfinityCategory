<?php
namespace PureIntento\InfinityCategory;

use Illuminate\Support\ServiceProvider;

class InfinityCategoryServiceProvider extends ServiceProvider{


    public function register(){
        
    }


    public function boot(){
        $this->loadMigrationsFrom(__DIR__ . DIRECTORY_SEPARATOR . "migrations");
        
        $this->publishes([
            __DIR__ . DIRECTORY_SEPARATOR . "migrations" => database_path('migrations'),
        ], 'migrations');
    }
    
}