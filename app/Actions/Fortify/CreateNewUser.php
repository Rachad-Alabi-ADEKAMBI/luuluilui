<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'phone_number' => ['required', 'string', 'max:100'],
            'role' => ['string', 'max:20'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature()
                ? ['accepted', 'required']
                : '',
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'phone_numer' => $input['phone_number'],
            'role' => 'user',
            'password' => Hash::make($input['password']),
        ]);
    }
}