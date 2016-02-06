<?php

use NineCells\Dev\ToggleComposer\Console;

use Illuminate\Console\Command;

class ToggleComposerCommand extends Command
{
    protected $signature = 'composer:toggle';

    protected $description = '게시판을 만듭니다';

    public function fire()
    {
        echo File::get('composer.json');
    }
}
