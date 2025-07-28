<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerUserSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'name' => 'Tanbeer Hasan',
                'email' => 'tanbeer@example.com',
                'password' => Hash::make('123456'),
                'is_admin' => false,
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('123456'),
                'is_admin' => false,
            ],
        ];

        foreach ($customers as $customer) {
            User::create($customer);
        }
    }
}

