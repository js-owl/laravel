<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AddressParser\DadataParser;
use App\Services\AddressParser\FakeParser;
use App\Services\AddressParser\ParserInterface;
use Dadata\DadataClient;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton(ParserInterface::class, function(){
        //     return new DadataParser(new DadataClient(
        //         config('dadata.token'), config('dadata.secret')
        //     ));
        // });
        $this->app->singleton(ParserInterface::class, function(){
            return new FakeParser();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){
        // \Illuminate\Support\Facades\DB::beforeExecuting(function($query, $params){
        //     Log::info("DB: $query with params " . json_encode($params));
        // });
        
        // $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();
        // $blade->extend(function($value){
        //     dd($value);
        //     return $value;
        // });
    }
}
