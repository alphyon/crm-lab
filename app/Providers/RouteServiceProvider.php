<?php

declare(strict_types=1);

namespace App\Providers;

use http\Exception\RuntimeException;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            foreach ($this->centralDomains() as $domain) {
                Route::middleware([
                    'api',
//                    InitializeTenancyBySubdomain::class,
//                    PreventAccessFromCentralDomains::class
                ])
                    ->domain($domain)
                    ->prefix('api')
                    ->as('api:')
                    ->group(base_path('routes/api.php'));

                Route::middleware('web')
                    ->domain($domain)
                    ->group(base_path('routes/web.php'));
            }

        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting() :void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(strval($request->user()?->id ?: $request->ip()));
        });
    }


    protected function centralDomains(): array
    {
        $domains = config('tenancy.central_domains');
        if(!is_array($domains)){
            throw new RuntimeException("Tenant Central Domains should be an array");
        }
        return $domains;
    }
}
