<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\TaskForce;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'shortDescription' => $this->faker->word(),
            'owner_taskforce_id' => TaskForce::factory()
        ];
    }
}
