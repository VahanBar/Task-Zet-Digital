<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WebSite;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $websites = WebSite::all();

        foreach ($users as $user) {
            $user->subscriptions()->attach(
                $websites->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
