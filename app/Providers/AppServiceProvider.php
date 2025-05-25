<?php

declare(strict_types=1);

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->setupLogViewer();
        $this->configModels();
        $this->configCommands();
        $this->configUrls();
        $this->configDate();
    }

    /**
     * Setup the LogViewer authorization to restrict access to admin users
     */
    private function setupLogViewer(): void
    {
        LogViewer::auth(fn($request) => $request->auth()->isAdmin());
    }

    private function configModels(): void
    {
        /** Remove the need of use $fillable. */
        Model::unguard();

        /** 
         * Make sure that all properties called exists in the model. 
         * Prevent lazy loading, avoid N+1 queries
         */
        Model::shouldBeStrict();
    }

    private function configCommands(): void
    {
        /** 
         * Prevents destructive commands in production.
         * Helping us to avoid data loss, for example, migrate fresh.
         */
        DB::prohibitDestructiveCommands(
            app()->isProduction()
        );
    }

    private function configUrls(): void
    {
        URL::forceHttps();
    }

    private function configDate(): void
    {
        Date::use(CarbonImmutable::class);
    }
}
