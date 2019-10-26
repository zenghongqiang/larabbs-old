<?php

namespace App\Providers;

use App\Models\Topic;
use App\Models\User;
use App\Models\Reply;
use App\Models\Link;
use App\Observers\TopicObserver;
use App\Observers\UserObserver;
use App\Observers\ReplyObserver;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(app()->isLocal()){
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
       Topic::observe(TopicObserver::class);
       User::observe(UserObserver::class);
       Reply::observe(ReplyObserver::class);
       
       \Carbon\Carbon::setlocale('zh');
    }
}
