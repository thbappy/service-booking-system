<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Plumbing',
                'description' => 'Fix leaking pipes and bathroom fittings.',
                'price' => 800,
                'status' => true,
            ],
            [
                'name' => 'Electrician',
                'description' => 'Install fans, fix wiring issues, etc.',
                'price' => 1000,
                'status' => true,
            ],
            [
                'name' => 'Home Cleaning',
                'description' => 'Deep cleaning for home and office spaces.',
                'price' => 1500,
                'status' => true,
            ],
            [
                'name' => 'AC Repair',
                'description' => 'Air conditioner maintenance and repair.',
                'price' => 1200,
                'status' => true,
            ],
            [
                'name' => 'Painting',
                'description' => 'Interior and exterior house painting.',
                'price' => 2500,
                'status' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}

