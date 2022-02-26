<?php

namespace Eddytim\Auditlog;

use Illuminate\Support\ServiceProvider;

class AuditLogServiceProvider extends ServiceProvider {

//    php artisan vendor:publish --provider="Eddytim\Auditlog\AuditLogServiceProvider"
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'audit');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(__DIR__.'/config/audit.php', 'audit');
        $this->publishes([
            __DIR__.'/config/audit.php' => config_path('audit.php'),
//            __DIR__.'/views' => resource_path('views/vendor/audit')
        ]);
    }

    public function register(){}
}
