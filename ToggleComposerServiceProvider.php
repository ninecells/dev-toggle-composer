<?php

namespace NineCells\Dev\ToggleComposer;

use Illuminate\Support\ServiceProvider;
use NineCells\Dev\ToggleComposer\Console\ToggleComposerCommand;

class SimpleBoardServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerToggleComposerCommand();
    }

    public function registerToggleComposerCommand()
    {
        $this->app->singleton('command.ninecells.dev-toggle-composer.composer:toggle', function () {
            return new ToggleComposerCommand();
        });

        $this->commands('command.ninecells.dev-toggle-composer.composer:toggle');
    }
}
