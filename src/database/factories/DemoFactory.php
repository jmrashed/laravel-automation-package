<?php

namespace Jmrashed\Automation\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Jmrashed\Automation\Models\DemoModel;

class DemoFactory extends Factory
{

    protected $model = DemoModel::class;

    public function definition()
    {
        return [
            'status_id'     => $this->faker->rand(1, 10)
        ];
    }
}
