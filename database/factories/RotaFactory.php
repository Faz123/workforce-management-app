<?php

namespace Database\Factories;

use App\Models\Rota;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class RotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'week_number' => 1,
            'week_ending' => $this->faker->date,
            'shift_type' => 'contracted',
            'shift_day' => 'monday',
            'duties' => 'shop floor',
            'start_time' => '06:00:00',
            'end_time' => '12:00:00',
            'user_id' => User::all()->random()->id,
            'holiday_approved'=> 0,
            'holiday_requested'=> 0,
        ];
    }
}
