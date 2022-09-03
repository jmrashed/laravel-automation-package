<?php

namespace Jmrashed\Automation\Database\Factories;

use Jmrashed\Automation\Models\Demo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Jmrashed\Automation\Models\DemoModel;

class DemoFactory extends Factory
{

    protected $model = DemoModel::class;

    public function definition()
    {
        return [
            'status'     => $this->faker->rand(1, 10)
        ];
    }
}
