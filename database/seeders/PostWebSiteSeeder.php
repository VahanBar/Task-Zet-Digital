<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\WebSite;
use Illuminate\Database\Seeder;

class PostWebSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $webSites = WebSite::all();
        $posts = Post::all();

        foreach ($webSites as $webSite) {
            $webSite->posts()->attach(
                $posts->random(3)->pluck('id')->toArray()
            );
        }
    }
}
