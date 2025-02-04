<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Property;
use App\Models\Client;
use App\Models\Lease;
use App\Models\Payment;
use App\Models\Document;use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Users
        User::factory(5)->create(); // Create 5 users (agents/admins)

        // Seed Properties
        Property::factory(20)->create(); // Create 20 properties

        // Seed Clients
        Client::factory(15)->create(); // Create 15 clients (owners/tenants)

        // Seed Leases
        Lease::factory(10)->create(); // Create 10 leases

        // Seed Payments
        Payment::factory(20)->create(); // Create 20 payments

        // Seed Documents
        Document::factory(10)->create(); // Create 10 documents

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
