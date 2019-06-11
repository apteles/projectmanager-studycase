<?php

namespace ProjectManager\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectManagerRepositoryProvider extends ServiceProvider
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
        $this->app->bind('ProjectManager\Repositories\ClientRepository',
                            'ProjectManager\Repositories\ClientRepositoryEloquent');
        $this->app->bind('ProjectManager\Repositories\ProjectRepository',
                            'ProjectManager\Repositories\ProjectRepositoryEloquent');
        $this->app->bind('ProjectManager\Repositories\ProjectNoteRepository',
                            'ProjectManager\Repositories\ProjectNoteRepositoryEloquent');
    }
}
