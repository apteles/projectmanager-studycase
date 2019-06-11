<?php 
namespace ProjectManager\Http\Middleware;

use Closure;

class Cors {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        return $next($request)
                    ->header('Access-Control-Allow-Origin', 'http://localhost:3000')
                        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                            ->header("Access-Control-Allow-Headers", "Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");    
        
    }

}