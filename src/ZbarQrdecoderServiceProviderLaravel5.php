<?php namespace RobbieP\ZbarQrdecoder;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Process\ProcessBuilder;

class ZbarQrdecoderServiceProviderLaravel5 extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config/config.php' => config_path('zbar-qrdecoder.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('zbardecoder', function ($app) {
            $config = $app['config']->get('zbar-qrdecoder');
            return new ZbarDecoder($config);
        });

        $this->app->alias('ZbarDecoder', 'RobbieP\ZbarQrdecoder\Facades\ZbarDecoder');
    }

}
