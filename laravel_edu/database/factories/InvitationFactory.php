<?php

namespace Database\Factories;

use App\Models\user_tokens;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invitation>
 */
class InvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Invite::class;
    
    public function definition()
    {
        return [
            'invite_token' => Str::random(32),
            'sender_user_id'=>User::Factory(),
        ];
    }
}
