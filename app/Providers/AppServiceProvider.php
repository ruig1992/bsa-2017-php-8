<?php
namespace App\Providers;

use App\Repositories\{
    CarRepository,
    Contracts\CarRepositoryInterface
};
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstraps any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // method body
    }

    /**
     * Registers any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Registration of CarRepository
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);

        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
