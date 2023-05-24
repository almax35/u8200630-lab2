<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;


class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        Article::factory(100)->create();
        Tag::factory(100)->create();
        $this->call(ArticleTagSeeder::class);
    }
}
