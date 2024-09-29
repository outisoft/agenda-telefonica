<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Contact::class;
    
    public function definition(): array
    {

        return [
            'name' => $this->faker->name,
            'job' => $this->faker->jobTitle,
            'department' => $this->faker->word,
            'destination_id' => rand(1, 23),
            'extension' => $this->faker->numerify('####'),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
