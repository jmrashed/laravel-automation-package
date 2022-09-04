<?php
namespace Jmrashed\Automation\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Jmrashed\Automation\Models;
use Illuminate\Queue\SerializesModels;
use Jmrashed\Automation\Models\DemoModel;

class WelcomeMail extends Mailable
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