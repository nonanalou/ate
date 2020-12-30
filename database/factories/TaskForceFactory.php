<?php

namespace Database\Factories;

use App\Models\TaskForce;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskForceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskForce::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word()
        ];
    }
}
