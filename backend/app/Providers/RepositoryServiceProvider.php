<?php

namespace ProjectManager\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\ProjectManager\Repositories\ProjectNoteRepository::class, \ProjectManager\Repositories\ProjectNoteRepositoryEloquent::class);
        $this->app->bind(\ProjectManager\Repositories\ProjectMembersRepository::class, \ProjectManager\Repositories\ProjectMembersRepositoryEloquent::class);
        //:end-bindings:
    }
}
