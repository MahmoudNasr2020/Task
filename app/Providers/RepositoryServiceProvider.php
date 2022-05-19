<?php

namespace App\Providers;

use App\Http\Eloquent\UserRepoistory;
use App\Http\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepoistory::class);
    }

    public function boot()
    {
        //
    }
}
