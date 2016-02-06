<?php

namespace NineCells\Dev\ToggleComposer\Console;

use File;
use Illuminate\Console\Command;

class ToggleComposerCommand extends Command
{
    protected $signature = 'composer:toggle';

    protected $description = '게시판을 만듭니다';

    public function fire()
    {
        $composer_json = File::get('composer.json');
        $json_obj = json_decode($composer_json, true);

        $dev_mode = isset($json_obj['repositories']);

        if ($dev_mode) {
            unset($json_obj['repositories']);
            File::put('composer.json', json_encode($json_obj, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $this->info('이제 배포 모드 입니다.');
        } else {
            File::put('composer.json', File::get('composer_dev.json'));
            $this->info('이제 개발 모드 입니다.');
        }
    }
}
