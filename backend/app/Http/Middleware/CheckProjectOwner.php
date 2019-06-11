<?php

namespace ProjectManager\Http\Middleware;

use Closure;
use ProjectManager\Repositories\ProjectRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use Illuminate\Support\Facades\Response;

class CheckProjectOwner
{
    private $project;

    public function __construct(ProjectRepository $project)
    {
        $this->project = $project;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(!count($this->project->findWhere(['id' => $request->project, 'owner_id' => Authorizer::getResourceOwnerId()]))){
            return Response::json(['error' => 'access denied.'],401);
        }

        return $next($request);
    }
}
