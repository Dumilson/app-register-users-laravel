<?php

namespace App\Providers;

use App\Domain\Phone\PhoneRepositoryInterface;
use App\Domain\User\UserRepositoryInterface;
use App\Infrastructure\Repositories\Phone\PhoneRepository as PhonePhoneRepository;
use App\Infrastructure\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PhoneRepositoryInterface::class, PhonePhoneRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
