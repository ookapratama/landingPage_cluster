<?php

namespace App\Providers;

use App\Http\Services\Repositories\BaseRepository;
use App\Http\Services\Repositories\ClusterRepository;
use App\Http\Services\Repositories\Contracts\BaseContract;
use App\Http\Services\Repositories\Contracts\ClusterContract;
use App\Http\Services\Repositories\Contracts\KaryawanContract;
use App\Http\Services\Repositories\Contracts\LabelClusterContract;
use App\Http\Services\Repositories\Contracts\MenuContract;
use App\Http\Services\Repositories\Contracts\RoleContract;
use App\Http\Services\Repositories\Contracts\UserClusterContract;
use App\Http\Services\Repositories\Contracts\UserMenuContract;
use App\Http\Services\Repositories\Contracts\UsersContract;
use App\Http\Services\Repositories\KaryawanRepository;
use App\Http\Services\Repositories\LabelClusterRepository;
use App\Http\Services\Repositories\MenuRepository;
use App\Http\Services\Repositories\RoleRepository;
use App\Http\Services\Repositories\UserClusterRepository;
use App\Http\Services\Repositories\UserMenuRepository;
use App\Http\Services\Repositories\UsersRepository;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(BaseContract::class, BaseRepository::class);


        $this->app->bind(MenuContract::class, MenuRepository::class);
        $this->app->bind(RoleContract::class, RoleRepository::class);
        $this->app->bind(UserMenuContract::class, UserMenuRepository::class);
        $this->app->bind(UsersContract::class, UsersRepository::class);
        $this->app->bind(ClusterContract::class, ClusterRepository::class);
        $this->app->bind(UserClusterContract::class, UserClusterRepository::class);
        $this->app->bind(LabelClusterContract::class, LabelClusterRepository::class);
        $this->app->bind(KaryawanContract::class, KaryawanRepository::class);

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
    }
}
