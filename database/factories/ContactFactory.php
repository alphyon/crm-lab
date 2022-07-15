<?php
declare(strict_types=1);
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * @return array
     */
    public function definition() :array
    {
        return [
//            'uuid',
            'title'=>$this->faker->title,
            'first_name'=>$this->faker->firstName,
            'middle_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'preferred_name'=>$this->faker->userName,
            'email'=>$this->faker->unique()->safeEmail,
            'phone'=>$this->faker->phoneNumber
        ];
    }
}
