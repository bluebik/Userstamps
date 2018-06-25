<?php

namespace Wildside\Userstamps;

use Illuminate\Support\ServiceProvider;

class UserstampsServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->registerHelpers();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $this->getConfigFile() => config_path('userstamps.php'),
            ], 'config');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->mergeConfigFrom(
            $this->getConfigFile(),
            'userstamps'
        );
    }

    /**
     * @return string
     */
    protected function getConfigFile(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'userstamps.php';
    }
}
