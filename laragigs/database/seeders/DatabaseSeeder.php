<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     "title" => "Software Engineer",
        //     "tags" => "tech, developer, software, IT",
        //     "location" => "San Francisco, CA",
        //     "email" => "hr@techcorp.com",
        //     "company" => "TechCorp",
        //     "website" => "https://www.techcorp.com",
        //     "description" => "We are looking for a skilled software engineer with experience in full-stack development."
        // ]);
        // Listing::create([
        //     "title" => "Marketing Specialist",
        //     "tags" => "marketing, digital, SEO, content",
        //     "location" => "New York, NY",
        //     "email" => "jobs@marketingsolutions.com",
        //     "company" => "Marketing Solutions",
        //     "website" => "https://www.marketingsolutions.com",
        //     "description" => "Seeking a creative marketing specialist to lead our digital marketing campaigns."
        // ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
