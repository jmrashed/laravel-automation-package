<?php

namespace Jmrashed\Automation\App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Jmrashed\Automation\Models\DemoModel;

class AutomationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $model;

    public function __construct(DemoModel $model)
    {
        $this->model = $model;
    }

    public function build()
    {
        return $this->view('automations::automations.emails.welcome');
    }
}
