<?php

namespace Jmrashed\Automation\App\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AutomationConsole extends Command
{
    protected $hidden = true;
    protected $signature = 'automation:install';

    protected $description = 'Install the automation';

    public function handle()
    {
        $this->info('Installing automation...');

        $this->info('Publishing configuration...');

        if (!$this->configExists('automation.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed automation');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Jmrashed\Automation\App\Providers\AutomationServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
