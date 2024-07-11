<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OperatorTransaction>
 */
class OperatorTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'submitted_by' => $this->faker->name,
            'submitted_when' => $this->faker->date,
            'site_code' => 'R002',
            'activity' => $this->faker->randomElement(['Cincang 4" Tebal', 'Cuci Parit Pinggir 12FT']),
            'uom' => $this->faker->randomElement(['Pokok', 'Meter']),
            'block' => '116',
            'task' => 'A1',
            'start' => '07:00',
            'end' => '17:00',
            'mesin_id' => $this->faker->randomElement(['LYK01', 'LYK 10', 'LYK206', 'LYK 11', 'LYK 205']),
            'fuel' => 200,
            'check_by' => $this->faker->name,
            'when_check' => $this->faker->date,
            'verified_by' => $this->faker->name,
            'when_verified' => $this->faker->date,
            'duty' => 'On Duty',
            'reason' => null,
        ];
    }
}