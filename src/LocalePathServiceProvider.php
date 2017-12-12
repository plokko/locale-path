<?php
namespace Plokko\LocalePath;

use Illuminate\Support\ServiceProvider;

class LocalePathServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //-- Publish config file --//
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('locale-path.php'),
        ],'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /// Merge default config ///
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'locale-path'
        );
        ///
    }
}
