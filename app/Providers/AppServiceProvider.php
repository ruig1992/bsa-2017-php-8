<?php
namespace App\Providers;

use App\Repositories\{
    CarRepository,
    Contracts\CarRepositoryInterface
};
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // method body
    }

    /**
     * Register any application services.
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
