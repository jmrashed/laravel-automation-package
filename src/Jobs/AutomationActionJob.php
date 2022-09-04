<!-- AutomationActionJob -->
<?php

namespace Jmrashed\Automation\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Jmrashed\Automation\Models\DemoModel; 

class AutomationActionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $model;

    public function __construct(DemoModel $model)
    {
        $this->model = $model;
    }

    public function handle()
    {
        $this->model->publish();
    }
}