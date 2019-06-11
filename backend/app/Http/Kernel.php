<?php

namespace ProjectManager\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \ProjectManager\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        // \ProjectManager\Http\Middleware\VerifyCsrfToken::class,
        \LucaDegasperi\OAuth2Server\Middleware\OAuthExceptionHandlerMiddleware::class,
        \ProjectManager\Http\Middleware\Cors::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \ProjectManager\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \ProjectManager\Http\Middleware\RedirectIfAuthenticated::class,
        'oauth' => \LucaDegasperi\OAuth2Server\Middleware\OAuthMiddleware::class,
        'oauth-user' => \LucaDegasperi\OAuth2Server\Middleware\OAuthUserOwnerMiddleware::class,
        'jwt.auth' => 'Tymon\JWTAuth\Middleware\GetUserFromToken',
        'jwt.refresh' => 'Tymon\JWTAuth\Middleware\RefreshToken',
        // 'oauth-client' => \LucaDegasperi\OAuth2Server\Middleware\OAuthClientOwnerMiddleware::class,
        // 'check-authorization-params' => \LucaDegasperi\OAuth2Server\Middleware\CheckAuthCodeRequestMiddleware::class,
        // 'check-project-owner' => \ProjectManager\Http\Middleware\CheckProjectOwner::class,
    ];
}
