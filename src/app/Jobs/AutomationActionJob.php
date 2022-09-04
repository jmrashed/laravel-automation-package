<!-- AutomationActionJob -->
<?php
// xx 

namespace Jmrashed\Automation\App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Jmrashed\Automation\Models\DemoModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

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
