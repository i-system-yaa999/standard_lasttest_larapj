<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'fullname'=>$this->faker->name(),
            'gender'=>rand(1,2),
            'email'=>$this->faker->unique()->safeEmail(),
            'postcode'=>$this->faker->postcode(),
            'address'=>$this->faker->address(),
            'building_name'=>'',
            'opinion'=>$this->faker->realText(50),
        ];
    }
}
